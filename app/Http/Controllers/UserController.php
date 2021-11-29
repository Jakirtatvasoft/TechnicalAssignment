<?php

namespace App\Http\Controllers;

use App\Repositories\User\UserRepositoryInterface;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * @var App\Repositories\User\UserRepositoryInterface
     */
    private $userRepository;

    /**
     * Create a list of users controller instance
     *
     * @param App\Repositories\User\UserRepositoryInterface  $userRepository
     * @return void
     */
    public function __construct(UserRepositoryInterface $userRepository) {
        $this->userRepository = $userRepository;
    }
    
    /**
     * List of all users.
     *
     * @return View
     */
    public function getAllUsers(): View {
        try {
            $getAllListUsers = $this->userRepository->getAllListUsers();
            return view("get_all_users", ['getAllListUsers' => $getAllListUsers]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false, 'message' => $e->getMessage()]);
        }
    }

    /**
     * View all colors.
     *
     * @param  string $uuid
     * @return JsonResponse|View
     */
    public function viewAllColors(string $uuid): JsonResponse|View {
        try {
            $checkUserId = $this->userRepository->checkUserId($uuid);
            if(empty($checkUserId)) {
                return response()->json([
                    'success' => false, 'message' => config('constants.messages.INVALID_DATA')]);
            }
            return view("view_all_colors", ['uuid' => $uuid]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false, 'message' => $e->getMessage()]);
        }
    }

    /**
     * Get all user colors.
     *
     * @param  string $uuid
     * @param  string $colorCode
     * @return JsonResponse|View
     */
    public function getAllUsersColors(string $uuid, string $colorCode): JsonResponse|View {
        try {
            $checkUserInfo = $this->userRepository->checkUserInfo($uuid,$colorCode);
            if(empty($checkUserInfo)) {
                return response()->json([
                    'success' => false, 'message' => config('constants.messages.INVALID_DATA')]);
            }
            return view("get_all_users_colors", ['uuid' => $uuid, 'checkUserInfo' => $checkUserInfo, 'colorCode' => $colorCode]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false, 'message' => $e->getMessage()]);
        }
    }
}

?>
