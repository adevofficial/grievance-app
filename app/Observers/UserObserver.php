<?php

namespace App\Observers;

use App\User;
use Spatie\Permission\Models\Role;

class UserObserver
{
    /**
     * Listen to the User created event.
     *
     * @param  User  $user
     * @return void
     */
    public function created(User $user)
    {
        // if (!($user->hasAnyRoles(Role::all()))) {
        $user->assignRole('user');
        // }
    }

    /**
     * Listen to the User deleting event.
     *
     * @param  User  $user
     * @return void
     */
    public function deleting(User $user)
    {
        //
    }
}
