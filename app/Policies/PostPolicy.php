<?php

namespace App\Policies;

use App\Model\admin\admin;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the post.
     *
     * @param  \App\Model\user\admin  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function view(admin $user)
    {
        //
    }

    /**
     * Determine whether the user can create posts.
     *
     * @param  \App\Model\user\admin  $user
     * @return mixed
     */
    public function create(admin $user)
    {
        return $this->getPermission($user,2);
    }

    /**
     * Determine whether the user can update the post.
     *
     * @param  \App\Model\user\admin  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function update(admin $user)
    {
        return $this->getPermission($user,3);
    }

    /**
     * Determine whether the user can delete the post.
     *
     * @param  \App\Model\user\admin  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function delete(admin $user)
    {
       return $this->getPermission($user,4);
    }

    /**
     * Determine whether the user can restore the post.
     *
     * @param  \App\Model\user\admin  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function restore(admin $user)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the post.
     *
     * @param  \App\Model\user\admin  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function forceDelete(admin $user)
    {
        
    }

    public function tag(admin $user)
    {
        return $this->getPermission($user,8);
    }

    public function category(admin $user)
    {
        return $this->getPermission($user,10);
    } 
    public function role(admin $user)
    {
        return $this->getPermission($user,9);
    } 
    public function permission(admin $user)
    {
        return $this->getPermission($user,11);
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
