<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function viewCranes()
    {
        return view('cranes.view');
    }
    public function viewClients()
    {
        return view('clients.view');
    }
    public function viewJobs()
    {
        return view('jobs.view');
    }
    public function viewReports()
    {
        return view('reports.view');
    }
    public function viewDrivers()
    {
        return view('drivers.view');
    }

    public function viewSettings()
    {
        return view('settings.view');
    }


}
