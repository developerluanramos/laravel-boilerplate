<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserStoreRequest;
use App\Models\Invitation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(UserCreateRequest $request)
    {
        // TODO lógica para controle de abertura da página a partir da validação do token
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
            $invitation->markAsUsed();

            DB::commit();

            return redirect()->route('dashboard');
        } catch (\Exception $e) {
            DB::rollBack();
//            dd($e->getMessage());
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
