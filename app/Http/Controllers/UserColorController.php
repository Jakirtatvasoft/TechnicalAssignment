<?php

namespace App\Http\Controllers;

use App\Repositories\UserColor\UserColorRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class UserColorController extends Controller
{
    /**
     * @var App\Repositories\UserColor\UserColorRepository
     */
    private $userColorRepository;

    /**
     * Create a list of users controller instance
     *
     * @param App\Repositories\UserColor\UserColorRepository  $userColorRepository
     * @return void
     */
    public function __construct(UserColorRepository $userColorRepository) {
        $this->userColorRepository = $userColorRepository;
    }

    /**
     * Set user color.
     *
     * @param  string $uuid
     * @param  string $colorCode
     * @return JsonResponse|RedirectResponse
     */
    public function setUserColor(string $uuid, string $colorCode): JsonResponse|RedirectResponse {
        try {
            $setUserColor = $this->userColorRepository->setUserColor($uuid,$colorCode);
            if($setUserColor == false) {
                return response()->json([
                    'success' => false, 'message' => config('constants.messages.INVALID_DATA')]);
            }
            return redirect()->route('user.get_all_users');
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
     * @return JsonResponse|RedirectResponse
     */
    public function updateUserColor(string $uuid, string $oldColorCode, string $newColorCode): JsonResponse|RedirectResponse {
        try {
            $setUserColor = $this->userColorRepository->updateUserColor($uuid,$oldColorCode,$newColorCode);
            if($setUserColor == false) {
                return response()->json([
                    'success' => false, 'message' => config('constants.messages.INVALID_DATA')]);
            }
            return redirect()->route('user.get_all_users');
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
     * @return JsonResponse|RedirectResponse
     */
    public function deleteUserColor(string $uuid, string $colorCode): JsonResponse|RedirectResponse {
        try {
            $deleteUserColor = $this->userColorRepository->deleteUserColor($uuid, $colorCode);
            if(empty($deleteUserColor)) {
                return response()->json([
                    'success' => false, 'message' => config('constants.messages.INVALID_DATA')]);
            }
            return redirect()->route('user.get_all_users');
        } catch (\Exception $e) {
            return response()->json([
                'success' => false, 'message' => $e->getMessage()]);
        }
    }
}

?>
