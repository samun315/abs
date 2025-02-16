<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\Common\Master\UserRole;
use App\Models\Hrm\Employee\EmployeeDepartment;
use App\Models\User;
use App\Services\User\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Exception;

class UserController extends Controller
{
    public function __construct(protected UserService $userService) {}

    public function index(Request $request): View|JsonResponse
    {
        $data['userRoles'] = UserRole::query()->orderBy('role_id', 'DESC')->get(['role_id', 'role_name']);

        if ($request->ajax()) {
            return $this->userService->getUserList($request);
        }

        return view('user.index', $data);
    }

    public function store(UserRequest $request): JsonResponse
    {
        try {

            $storeUserInfo = $this->userService->storeUserInfo($request->fields());

            return sendSuccessResponse(
                200,
                'User Created successfully.',
                'data',
                $storeUserInfo
            );
        } catch (Exception $exception) {
            return sendErrorResponse('Internal Server Error: ', $exception->getMessage(), $exception->getCode() ?? 500);
        }
    }

    public function edit(int $userId): JsonResponse
    {
        try {
            $userInfo = $this->userService->getUserInfoById($userId);

            return sendSuccessResponse(200, '', 'userInfo', $userInfo);
        } catch (Exception $exception) {
            return sendErrorResponse('Internal Server Error: ', $exception->getMessage(), $exception->getCode() ?? 500);
        }
    }

    public function update(UserRequest $request, int $userId): JsonResponse
    {
        try {

            $updateUserInfo = $this->userService->updateUserInfo($request->fields(), $userId);

            return sendSuccessResponse(
                200,
                'User Role updated successfully.',
                'data',
                $updateUserInfo
            );
        } catch (Exception $exception) {
            return sendErrorResponse('Internal Server Error: ', $exception->getMessage(), $exception->getCode() ?? 500);
        }
    }
}
