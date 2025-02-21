<?php

namespace App\Services\Marchant;

use App\Models\Marchant\BalanceRequest;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Yajra\DataTables\DataTables;

class BalanceRequestApproveService
{

    public function getBalanceRequest(Request $request): JsonResponse|Model|Builder
    {
        $searchKeyword = $request->input('search');

        $query = BalanceRequest::query()->leftJoin('users', 'balance_requests.created_by', '=', 'users.id')
            ->where(function ($query) use ($searchKeyword) {
                $query->where(function ($q) use ($searchKeyword) {
                    $q->where('mobile_number', 'like', "%$searchKeyword%")
                        ->orWhere('status', 'like', "%$searchKeyword%")
                        ->orWhere('users.full_name', 'like', "%$searchKeyword%")
                        ->orWhere('users.email', 'like', "%$searchKeyword%")
                        ->orWhere('users.phone', 'like', "%$searchKeyword%");
                });
            })->select('balance_requests.*', 'users.role_id', 'users.full_name', 'users.phone', 'users.email')->latest();

        // dd( $query);

        return Datatables::of($query)
            ->addIndexColumn()
            ->addColumn('user', function ($row) {
                $name = $row->full_name ?? '';
                $phone = $row->phone ?? '';
                $email = $row->email ?? '';
                $user = $name . '<br>' . $phone . '<br>' . $email;
                return $user;
            })
            ->addColumn('action', function ($row) {
                $transferBtn = '';
                $cancelBtn = '';

                if ($row->status != 'Transferred') {
                    $transferBtn = '<button type="button" data-id="' . $row->id . '" data-status="Transferred" class="btn btn-warning btn-sm ms-lg-2 transferredBtn">Transfer</button>';
                } else {
                    $cancelBtn = '<button type="button" data-id="' . $row->id . '" data-status="Cancelled" class="btn btn-danger btn-sm ms-lg-2 cancelledBtn">Cancel</button>';
                }


                $button = '<div class="btn-group" role="group" aria-label="Basic example">
                            ' . $transferBtn . '
                            ' . $cancelBtn . '
                            </div>';
                return $button;
            })
            ->rawColumns(['action', 'user'])
            ->make(true);
    }

    public function updateBalanceRequestStatus(array $updateData, int $id): Model
    {
        // Find the whitelist by its ID or fail if not found.
        $balance = BalanceRequest::query()->where('id', $id)->first();

        // Update the whitelist with the provided data.
        $balance->update($updateData);

        return $balance;
    }
}
