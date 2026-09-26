<?php

namespace App\Observers;

use App\Mail\WelcomeMail;
use App\Models\User\User;
use Illuminate\Support\Facades\Mail;

class UserObserver
{
    /**
     * Handle the User "created" event.
     */
    public function created(User $user): void
    {
        Mail::to($user->email)->queue(new WelcomeMail($user));
    }
}
