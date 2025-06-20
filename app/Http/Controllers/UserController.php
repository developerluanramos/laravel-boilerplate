<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserIndexRequest;
use App\Http\Requests\UserShowRequest;
use App\Http\Requests\UserEditRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Requests\UserDestroyRequest;
use App\Http\Requests\UserStoreRequest;
use App\Models\Invitation;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(UserIndexRequest $request)
    {
        $users = User::all();
        return view('users.index', [
            'users' => $users,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(UserCreateRequest $request)
    {
        if(is_null($request->get('token')))
        {
            abort(404);
        }

        $invitation = Invitation::where("token", $request->get('token'))->first();

        if( is_null($invitation) || $invitation->isExpired() || $invitation->isUsed() )
        {
            abort(404);
        }

        return view('users.create', [
            'token' => $invitation->token,
            'role' => $invitation->role,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserStoreRequest $request)
    {
        try {
            DB::beginTransaction();

            $request->password = Hash::make($request->get('password'));
            $request->email_verified_at = now();
            User::create($request->all());

            $invitation = Invitation::where('token', $request->get('token'))->first();
            $invitation->delete();

            DB::commit();

            return redirect()->route('dashboard');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(UserShowRequest $request)
    {
        $user = User::find($request->id);
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserEditRequest $request, User $user)
    {
        // Your logic here
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserUpdateRequest $request, User $user)
    {
        try {
            DB::beginTransaction();

            if ($request->filled('password')) {
                $request->password = Hash::make($request->get('password'));
            }

            $user->update($request->all());

            DB::commit();

            return redirect()->route('users.show', $user);
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserDestroyRequest $request, User $user)
    {
        try {
            DB::beginTransaction();

            $user->delete();

            DB::commit();

            return redirect()->route('users.index');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', $e->getMessage());
        }
    }

    public function logout()
    {
        Auth::guard('web')->logout();

        Session::invalidate();
        Session::regenerateToken();

        return redirect()->route('portal');
    }
}
