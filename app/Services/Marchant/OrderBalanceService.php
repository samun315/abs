<?php

namespace App\Services\Marchant;

use App\Models\Marchant\OrderBalance;
use App\Models\Payment\PaymentGateway;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Yajra\DataTables\DataTables;

class OrderBalanceService
{
    public function getOrderBalanceInfo(Request $request): JsonResponse|Model|Builder
    {
        $searchKeyword = $request->input('search');

        $query = OrderBalance::query()
            ->where(function ($query) use ($searchKeyword) {
                $query->where(function ($q) use ($searchKeyword) {
                    $q->where('status', 'like', "%$searchKeyword%");
                });
            })->latest();

        // dd( $query);

        return Datatables::of($query)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {

                $showBtn = '<button type="button" data-id="' . $row->id . '" class="btn btn-success btn-sm ms-lg-2">Show</button>';

                return $showBtn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function gatewayInfo(int $gatewayId): PaymentGateway
    {
        return PaymentGateway::query()->where('id',$gatewayId)->first();
    }
}
