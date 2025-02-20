<?php

namespace App\Http\Controllers\Marchant;

use App\Http\Controllers\Controller;
use App\Http\Requests\Marchant\RequestWhitelistRequest;
use App\Services\Marchant\RequestWhitelistApproveService;
use App\Services\Marchant\RequestWhitelistService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;

class RequestWhitelistApproveController extends Controller
{
    public function __construct(protected RequestWhitelistApproveService $requestWhitelistApproveService) {}

    public function index(Request $request):View|JsonResponse
    {
        if ($request->ajax()) {
            return $this->requestWhitelistApproveService->getWhitelistRequest($request);
        }

        return view('marchant.approveWhitelist.index');
    }
}
