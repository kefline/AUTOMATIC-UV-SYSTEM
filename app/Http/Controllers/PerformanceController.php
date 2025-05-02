<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\SystemStatus;
use App\Models\SolarPanel;

class PerformanceController extends Controller
{
    //
    public function performance()
    {
        return view('performance.performance');
    }
   
}
