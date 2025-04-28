<?php

namespace App\Http\Controllers;

use App\Enums\ProfilesEnum;
use App\Http\Requests\InvitationStoreRequest;
use App\Mail\UserInvitation;
use App\Models\Invitation;
use Illuminate\Support\Facades\Mail;

class InvitationController extends Controller
{
    public function index()
    {
        $invitations = Invitation::latest()
            ->paginate(10);
        return view('invitations.index', compact('invitations'));
    }

    public function create()
    {
        return view('invitations.create');
    }

    public function store(InvitationStoreRequest $request)
    {
        try {
            $invitation = Invitation::create($request->all());

            Mail::to($request->email)->send(new UserInvitation($invitation));

            return redirect()->route('invitations.index')
                ->with('success', 'Convite enviado com sucesso!');
        } catch (\Exception $e) {
//            dd($e->getMessage());
            return back()->with('error', $e->getMessage());
        }
    }
}
