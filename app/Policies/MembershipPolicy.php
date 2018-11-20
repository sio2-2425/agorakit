<?php

namespace App\Policies;

use App\Group;
use App\Membership;
use Illuminate\Auth\Access\HandlesAuthorization;

class MembershipPolicy
{
    use HandlesAuthorization;

    /**
    * Create a new policy instance.
    *
    * @return void
    */
    public function __construct()
    {
        //
    }

    // a super admin can do everything
    public function before($user, $ability)
    {
        if ($user->isAdmin()) {
            return true;
        }
    }

    public function edit(Membership $membership)
    {
        if ($user->isAdminOf($membership->group))
        {
            return true;
        }
        if ($user->id == $membership->user->id)
        {
            return true;
        }

        return false;
    }

}