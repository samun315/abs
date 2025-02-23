<?php

namespace App\Http\Controllers\Marchant;

use App\Http\Controllers\Controller;
use App\Models\Payment\PaymentGateway;
use App\Services\Marchant\OrderBalanceService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OrderBalanceController extends Controller
{
    public function __construct(protected OrderBalanceService $orderBalanceService) {}

    public function index(Request $request): View|JsonResponse
    {
        if ($request->ajax()) {
            return $this->orderBalanceService->getOrderBalanceInfo($request);
        }
        return view('marchant.order.index');
    }

    public function create():View
    {
        $data['paymentGateways'] = PaymentGateway::query()->where('active', 'YES')->get();
        
        return view('marchant.order.create', $data);
    }

    public function gatewayInfo(int $gatewayId):JsonResponse
    {
        $data = $this->orderBalanceService->gatewayInfo($gatewayId);

        return sendSuccessResponse(200, '', 'gatewayInfo', $data);
    
    }
    public function store(BalanceRequest $request): JsonResponse
    {
        try {

            $storeUserInfo = $this->balanceRequestService->storeBalanceRequest($request->fields());

            return sendSuccessResponse(
                200,
                'Balance Request Created successfully.',
                'data',
                $storeUserInfo
            );
        } catch (Exception $exception) {
            return sendErrorResponse('Internal Server Error: ', $exception->getMessage(), $exception->getCode() ?? 500);
        }
    }
}
