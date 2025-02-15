<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Hrm\Employee\Employee;
use App\Models\Sales\Lead\Lead;
use App\Models\Sales\Opportunity\Opportunity;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        return view('dashboard.index');
    }
}
