<?php

namespace App\Services\User;

use App\Models\User;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class UserService
{
    public function getUserList(Request $request): JsonResponse
    {
        $searchKeyword = $request->input('search');

        $query = User::query()->leftJoin('user_roles', function ($join) {
            $join->on('users.role_id', '=', 'user_roles.role_id');
        })->leftJoin('employee_departments', function ($join) {
            $join->on('users.department_id', '=', 'employee_departments.department_id');
        })->where(function ($query) use ($searchKeyword) {
            $query->where(function ($q) use ($searchKeyword) {
                $q->where('pin_number', 'ilike', "%$searchKeyword%")
                    ->orWhere('name', 'ilike', "%$searchKeyword%")
                    ->orWhere('email', 'ilike', "%$searchKeyword%")
                    ->orWhere('phone', 'ilike', "%$searchKeyword%")
                    ->orWhere('user_roles.role_name', 'ilike', "%$searchKeyword%")
                    ->orWhere('employee_departments.department_name', 'ilike', "%$searchKeyword%");
            });
        })
            ->select('users.*', 'user_roles.role_name', 'employee_departments.department_name');

        return Datatables::of($query)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                // $viewBtn = '<button data-id="' . $row->id . '" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-2 view-user" data-bs-toggle="modal" data-bs-target="#kt_modal_users_view"><i class="fas fa-eye"></i></button>';

                $editBtn = '<button data-id="' . $row->id . '" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm edit-user" data-bs-toggle="modal" data-bs-target="#showModal"><i class="fas fa-edit"></i></button>';
                return $editBtn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }


    public function getUserInfoById(int $userId): Model|Collection|Builder|array|null
    {
        return User::query()->findOrFail($userId);
    }

    public function updateUserInfo(array $updateData, int $userId): bool
    {
        $userRole = $this->getUserInfoById($userId);

        return $userRole->update($updateData);
    }
}
