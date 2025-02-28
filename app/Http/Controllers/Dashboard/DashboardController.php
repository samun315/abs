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
use App\Models\Payment\Account;

class DashboardController extends Controller
{
    public function index(): View
    {
        $data=[];
        $data['pending_order'] = OrderBalance::where('status', 'Pending')->count();
        $data['pending_request'] = BalanceRequest::where('status', 'Pending')->count();
        $data['pending_whitelist'] = RequestWhitelist::where('status', 'Pending')->count();
        $data['pending_transfer'] = OrderBalance::where('status', 'Pending')->count();

        $data['user_order'] = OrderBalance::query()->where('ordered_by',loggedInUserId())->count();
        $data['user_diamond'] = Account::query()->where('user_id',loggedInUserId())->first(['current_balance']);
        $data['user_request'] = BalanceRequest::query()->where('created_by',loggedInUserId())->count();

        return view('dashboard.index', $data);
    }
}
