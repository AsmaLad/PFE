<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Conge;
use Illuminate\Auth\Access\HandlesAuthorization;

class CongePolicy
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

    public function create(User $user, Conge $conge)
    {
        //
        if(Auth::user()->role == "user"){
            return true;
        }
        
    }


    public function validation(User $user, Conge $conge)
    {
        //
        if(Auth::user()->role == "admin"){
            return true;
        }
        
    }
}
