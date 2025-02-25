<?php

namespace App\Http\Controllers\Marchant;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\Marchant\TransferService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class TransferController extends Controller
{
    public function __construct(protected TransferService $transferService) {}

    public function index(Request $request): View|JsonResponse
    {
        if ($request->ajax()) {
            return $this->transferService->getTransferBalanceInfo($request);
        }
        $userRole = Auth::user()->role_id;
        $data['emails'] = User::query()->where('role_id', $userRole)->get();
       
        return view('marchant.transfer.index', $data);
    }

    public function create(): View
    {
        $data['paymentGateways'] = PaymentGateway::query()->where('active', 'YES')->get();

        return view('marchant.order.create', $data);
    }

    public function gatewayInfo(int $gatewayId): JsonResponse
    {
        try {
            $data = $this->orderBalanceService->gatewayInfo($gatewayId);

            return sendSuccessResponse(200, '', 'gatewayInfo', $data);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getOrderDetails(int $orderId): JsonResponse
    {
        try {
            $data = $this->orderBalanceService->getOrderDetails($orderId);
            // dd($data);
            return sendSuccessResponse(200, '', 'data', $data);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function store(OrderBalanceRequest $request): RedirectResponse
    {
        try {

            $storeUserInfo = $this->orderBalanceService->storeOrderBalance($request);

            return to_route('marchant.order.balance.index')->with(
                'success',
                'Order Balance Stored successfully.'
            );
        } catch (Exception $exception) {
            return back()->with('error', $exception->getMessage());
        }
    }
}
