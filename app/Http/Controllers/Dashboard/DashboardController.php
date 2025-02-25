<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Hrm\Employee\Employee;
use App\Models\Sales\Lead\Lead;
use App\Models\Sales\Opportunity\Opportunity;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Marchant\OrderBalance;
use App\Models\Marchant\BalanceRequest;
use App\Models\Marchant\RequestWhitelist;


class DashboardController extends Controller
{
    public function index(): View
    {
        $data=[];
        $data['pending_order'] = OrderBalance::where('status', 'Pending')->count();
        $data['pending_request'] = BalanceRequest::where('status', 'Pending')->count();
        $data['pending_whitelist'] = RequestWhitelist::where('status', 'Pending')->count();
        $data['pending_transfer'] = OrderBalance::where('status', 'Pending')->count();

        return view('dashboard.index', $data);
    }
}
