<?php

namespace App\Policies;

use App\Model\admin\admin;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Model\user\admin  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function view(admin $user)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Model\user\admin  $user
     * @return mixed
     */
    public function create(admin $user)
    {
        return $this->getPermission($user,5);
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Model\user\admin  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function update(admin $user)
    {
        return $this->getPermission($user,6);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Model\user\admin  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function delete(admin $user)
    {
        return $this->getPermission($user,7);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Model\user\admin  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function restore(admin $user)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Model\user\admin  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function forceDelete(admin $user)
    {
        //
    }

    protected function getPermission($user, $per_id)
    {
        foreach ($user->roles as $role) {
           foreach ($role->permissions as $permission) {
               if ($permission->id == $per_id) {
                   return true;
               }
           }
        }

        return false;
    }
}
