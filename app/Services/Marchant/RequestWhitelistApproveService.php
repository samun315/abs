<?php

namespace App\Services\Marchant;

use App\Models\Marchant\RequestWhitelist;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Yajra\DataTables\DataTables;

class RequestWhitelistApproveService
{

    
    public function getWhitelistRequest(Request $request): JsonResponse|Model|Builder
    {
        $searchKeyword = $request->input('search');

        $query = RequestWhitelist::query()->leftJoin('users', 'whitelist_requests.created_by', '=', 'users.id')
        ->where(function ($query) use ($searchKeyword) {
            $query->where(function ($q) use ($searchKeyword) {
                $q->where('mobile_number', 'like', "%$searchKeyword%")
                    ->orWhere('status', 'like', "%$searchKeyword%")
                    ->orWhereHas('user', function ($q) use ($searchKeyword) {
                        $q->where('full_name', 'like', '%' . $searchKeyword . '%');
                    });
            });
        })->select('whitelist_requests.*','users.role_id','users.full_name')->latest();
        
        // dd( $query);

        return Datatables::of($query)
            ->addIndexColumn() 
            ->addColumn('action', function ($row) {
                
                if ($row->role_id == 1) {
                    $approveBtn = '<button type="button" data-id="' . $row->id . '" class="btn btn-warning btn-sm ms-lg-2 approveWhitelistBtn">Approve</button>';
                    $suspendBtn = '<button type="button" data-id="' . $row->id . '" class="btn btn-danger btn-sm ms-lg-2 suspendWhitelistBtn">Suspend</button>';
                } 
             
                $button = '<div class="btn-group" role="group" aria-label="Basic example">
                            ' . $approveBtn . '
                            ' . $suspendBtn . '
                            </div>';
                return $button;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

}
