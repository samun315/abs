<?php

namespace App\Http\Controllers\Marchant;

use App\Http\Controllers\Controller;
use App\Models\Marchant\RequestWhitelist;
use App\Services\Marchant\BalanceRequestService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BalanceRequestController extends Controller
{
    public function __construct(protected BalanceRequestService $balanceRequestService) {}

    public function index(Request $request): View|JsonResponse
    {
        if ($request->ajax()) {
            return $this->balanceRequestService->getRequestInfo($request);
        }

        $data['phones'] = RequestWhitelist::query()->where('status', 'Active')->get(['mobile_number']);
        
        return view('marchant.balanceRequest.index', $data);
    }
}
