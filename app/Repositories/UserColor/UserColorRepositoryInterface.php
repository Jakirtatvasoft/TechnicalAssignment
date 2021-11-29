<?php

namespace App\Repositories\UserColor;

use Illuminate\Database\Eloquent\Collection;

/**
 * Interface ColorRepositoryInterface
 */
interface UserColorRepositoryInterface
{
    /**
     * Set user color.
     *
     * @param  string $uuid
     * @param  string $colorCode
     * @return bool
     */
    public function setUserColor(string $uuid,string $colorCode): bool;

    /**
     * Update user color.
     *
     * @param  string $uuid
     * @param  string $oldColorCode
     * @param  string $newColorCode
     * @return bool
     */
    public function updateUserColor(string $uuid, string $oldColorCode, string $newColorCode): bool;

    /**
     * Delete user color.
     *
     * @param  string $uuid
     * @param  string $colorCode
     * @return bool
     */
    public function deleteUserColor(string $uuid,string $colorCode): bool;
}
