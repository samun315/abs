<?php

namespace App\Services\User;

use App\Models\User;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;

class UserService
{

    public function storeUserInfo(array $data): User|JsonResponse
    {
        $data['password'] =  Hash::make($data['password']);

        return User::query()->create($data);
    }

    public function getUserList(Request $request): JsonResponse
    {
        $searchKeyword = $request->input('search');

        $query = User::query()->leftJoin('user_roles', function ($join) {
            $join->on('users.role_id', '=', 'user_roles.role_id');
        })->where(function ($query) use ($searchKeyword) {
            $query->where(function ($q) use ($searchKeyword) {
                $q->where('full_name', 'like', "%$searchKeyword%")
                    ->orWhere('email', 'like', "%$searchKeyword%")
                    ->orWhere('phone', 'like', "%$searchKeyword%")
                    ->orWhere('user_roles.role_name', 'like', "%$searchKeyword%");
            });
        })
            ->select('users.*', 'user_roles.role_name');

        return Datatables::of($query)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $changePassBtn = '<button data-id="' . $row->id . '" class="btn btn-warning btn-sm me-2 changePasswordBtn" data-bs-toggle="modal" data-bs-target="#kt_modal_change_password">Reset Password</button>';

                $editBtn = '<button data-id="' . $row->id . '" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm edit-user me-2" data-bs-toggle="modal" data-bs-target="#showModal"><i class="fas fa-edit"></i></button>';
                return $editBtn . $changePassBtn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }


    public function getUserInfoById(int $userId): Model|Collection|Builder|array|null
    {
        return User::query()->find($userId);
    }

    public function updateUserInfo(array $updateData, int $userId): bool
    {
        $user = $this->getUserInfoById($userId);

        return $user->update($updateData);
    }

    public function resetPassword(Request $request, int $userId): bool
    {
        $user = $this->getUserInfoById($userId);

        $data['password'] =  Hash::make($request->password);

        return $user->update($data);
    }
}
