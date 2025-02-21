<?php

namespace App\Http\Controllers\Marchant;

use App\Http\Controllers\Controller;
use App\Http\Requests\Marchant\BalanceRequest;
use App\Models\Marchant\RequestWhitelist;
use App\Services\Marchant\BalanceRequestService;
use Exception;
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
