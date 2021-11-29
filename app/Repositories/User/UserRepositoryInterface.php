<?php

namespace App\Repositories\User;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

/**
 * Interface UserRepositoryInterface
 */
interface UserRepositoryInterface
{
    /**
     * @return Collection
     */
    public function getAllListUsers(): Collection;

    /**
     * Check user id is avaliable or not.
     * 
     * @param  string $uuid
     * @return App\Models\User
     */
    public function checkUserId(string $uuid): User;

    /**
     * Get user info with all colors.
     * 
     * @param  string $uuid
     * @param  string $colorCode
     * @return App\Models\User
     */
    public function checkUserInfo(string $uuid,string $colorCode): User;
}
