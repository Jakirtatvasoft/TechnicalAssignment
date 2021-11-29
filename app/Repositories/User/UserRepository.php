<?php

namespace App\Repositories\User;

use App\Models\User;
use Exception;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class UserRepository
 *
 * @package App\Repositories\User
 */
class UserRepository implements UserRepositoryInterface
{
    /**
     * @var App\Models\User
     */
    public $user;

    /**
     * Create a list of users repositories instance
     *
     * @param App\Models\User  $user
     * @return void
     */
    public function __construct(User $user) {
	    $this->user = $user;
    }

    /**
     * @return Collection
     */
    public function getAllListUsers(): Collection {
        try {
            return $this->user->with('color')->get();
        } catch (\Exception $e) {
            return response()->json([
                'success' => false, 'message' => $e->getMessage()]);
        }
    }

    /**
     * Check user id is avaliable or not.
     * 
     * @param  string $uuid
     * @return App\Models\User
     */
    public function checkUserId(string $uuid): User {
        try {
            $checkUserId = $this->user->select('id')->where('uuid', $uuid)->first();
            return $checkUserId;
        } catch (\Exception $e) {
            return response()->json([
                'success' => false, 'message' => $e->getMessage()]);
        }
    }

    /**
     * Get user info with all colors.
     * 
     * @param  string $uuid
     * @param  string $colorCode
     * @return App\Models\User
     */
    public function checkUserInfo(string $uuid,string $colorCode): User {
        try {
            $checkUserInfo = $this->user
            ->with('color')
            ->whereHas('color', function($query) use ($colorCode) {
                return $query->where('color_code', $colorCode);
            })
            ->has('color')
            ->where('uuid', $uuid)
            ->first();
            return $checkUserInfo;
        } catch (\Exception $e) {
            return response()->json([
                'success' => false, 'message' => $e->getMessage()]);
        }
    }
}
