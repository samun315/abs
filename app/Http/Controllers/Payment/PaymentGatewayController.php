<?php

namespace App\Http\Controllers\Payment;

use App\Constant\Payment\PaymentGatewayConstant;
use App\Http\Controllers\Controller;
use App\Services\Payment\PaymentGatewayService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PaymentGatewayController extends Controller
{
    
    public function __construct(protected PaymentGatewayService $paymentGatewayService) {}

    public function index(Request $request):View|JsonResponse
    {
        if ($request->ajax()) {
            return $this->paymentGatewayService->getPaymentGateway($request);
        }

        $data['currencyCodes'] = PaymentGatewayConstant::CURRENCY_CODE;

        return view('payment.paymentGateway.index',$data);
    }
}
