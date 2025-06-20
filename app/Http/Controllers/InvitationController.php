<?php

namespace App\Http\Controllers;

use App\Http\Requests\InvitationCreateRequest;
use App\Http\Requests\InvitationDestroyRequest;
use App\Http\Requests\InvitationIndexRequest;
use App\Http\Requests\InvitationStoreRequest;
use App\Mail\UserInvitation;
use App\Models\Invitation;
use Illuminate\Support\Facades\Mail;

class InvitationController extends Controller
{
    public function index(InvitationIndexRequest $request)
    {
        $invitations = Invitation::latest()
            ->paginate(10);
        return view('invitations.index', compact('invitations'));
    }

    public function create(InvitationCreateRequest $request)
    {
        return view('invitations.create');
    }

    public function store(InvitationStoreRequest $request)
    {
        try {
            Invitation::create($request->all());
            return redirect()->route('invitations.index')
                ->with('success', 'Convite enviado com sucesso!');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function destroy(int $identity, InvitationDestroyRequest $request)
    {
        Invitation::destroy($identity);

        return redirect()->route('invitations.index')
            ->with('success', 'Convite deletado com sucesso!');
    }
}
