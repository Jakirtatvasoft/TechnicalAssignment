<?php

namespace App\Repositories\UserColor;

use App\Models\UserColor;
use App\Models\User;
use Exception;

/**
 * Class ColorRepository
 *
 * @package App\Repositories\UserColor
 */
class UserColorRepository implements UserColorRepositoryInterface
{
    /**
     * @var App\Models\UserColor
     */
    public $color;

    /**
     * Create a list of colors repositories instance
     *
     * @param App\Models\UserColor  $color
     * @return void
     */
    public function __construct(UserColor $color) {
	    $this->color = $color;
    }
    
    /**
     * Set user color.
     *
     * @param  string $uuid
     * @param  string $colorCode
     * @return bool
     */
    public function setUserColor(string $uuid,string $colorCode): bool {
        try {
            $userId = User::select('id')->where('uuid', $uuid)->first();
            if(empty($userId)) {
                return false;
            } 
            $this->color->user_id = $userId->id;
            $this->color->color_code = $colorCode;
            $this->color->save();
            return true;
        } catch (\Exception $e) {
            return response()->json([
                'success' => false, 'message' => $e->getMessage()]);
        }
    }

    /**
     * Update user color.
     *
     * @param  string $uuid
     * @param  string $oldColorCode
     * @param  string $newColorCode
     * @return bool
     */
    public function updateUserColor(string $uuid, string $oldColorCode, string $newColorCode): bool {
        try {
            $userId = User::select('id')->where('uuid', $uuid)->first();
            if(empty($userId)) {
                return false;
            } 
            $color = $this->color->where('user_id', $userId->id)->where('color_code', $oldColorCode)->first();
            $color->user_id = $userId->id;
            $color->color_code = $newColorCode;
            $color->save();
            return true;
        } catch (\Exception $e) {
            return response()->json([
                'success' => false, 'message' => $e->getMessage()]);
        }
    }

    /**
     * Delete user color.
     *
     * @param  string $uuid
     * @param  string $colorCode
     * @return bool
     */
    public function deleteUserColor(string $uuid,string $colorCode): bool {
        try {
            $userId = User::select('id')->where('uuid', $uuid)->first();
            if(empty($userId)) {
                return false;
            }
            $this->color->where('user_id', $userId->id)->where('color_code', $colorCode)->delete();
            return true;
        } catch (\Exception $e) {
            return response()->json([
                'success' => false, 'message' => $e->getMessage()]);
        }
    }
}
