<?php

namespace App\Services\Marchant;

use App\Models\Marchant\BalanceRequest;
use App\Models\Marchant\RequestWhitelist;
use FontLib\Table\Type\name;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Yajra\DataTables\DataTables;

class BalanceRequestService
{
    public function getRequestInfo(Request $request): JsonResponse|Model|Builder
    {
        $searchKeyword = $request->input('search');

        $query = BalanceRequest::query()
        ->where(function ($query) use ($searchKeyword) {
                $query->where(function ($q) use ($searchKeyword) {
                    $q->where('mobile_number', 'like', "%$searchKeyword%")
                        ->orWhere('status', 'like', "%$searchKeyword%");
                });
                $query->where('created_by',loggedInUserId());
            })->latest();

        // dd( $query);

        return Datatables::of($query)
            ->addIndexColumn()
            ->make(true);
    }

    public function storeBalanceRequest(array $data): Model
    {
        return BalanceRequest::query()->create($data);
    }
}
