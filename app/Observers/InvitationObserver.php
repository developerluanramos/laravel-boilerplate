<?php

namespace App\Observers;

use App\Enums\ProfilesEnum;
use App\Mail\UserInvitation;
use App\Models\Invitation;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class InvitationObserver
{
    /**
     * Handle the Invitation "created" event.
     */
    public function creating(Invitation $invitation): void
    {
        $invitation->expires_at = Carbon::now()->addHours(24);
        $invitation->token = Str::uuid();
    }

    public function created(Invitation $invitation): void
    {
        Mail::to($invitation->email)->send(new UserInvitation($invitation));
    }

    /**
     * Handle the Invitation "updated" event.
     */
    public function updated(Invitation $invitation): void
    {
        //
    }

    /**
     * Handle the Invitation "deleted" event.
     */
    public function deleted(Invitation $invitation): void
    {
        //
    }

    /**
     * Handle the Invitation "restored" event.
     */
    public function restored(Invitation $invitation): void
    {
        //
    }

    /**
     * Handle the Invitation "force deleted" event.
     */
    public function forceDeleted(Invitation $invitation): void
    {
        //
    }
}
