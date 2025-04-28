<?php

namespace App\Observers;

use App\Enums\ProfilesEnum;
use App\Models\Invitation;
use Carbon\Carbon;
use Illuminate\Support\Str;

class InvitationObserver
{
    /**
     * Handle the Invitation "created" event.
     */
    public function creating(Invitation $invitation): void
    {
//        dd(ProfilesEnum::getKey($invitation->role));
        $invitation->expires_at = Carbon::now()->addHours(24);
        $invitation->token = Str::uuid();
//        $invitation->role = $invitation->role->value;
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
