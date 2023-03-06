<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function dashboard(){
        $page = 'dashboard';
        return view('admin.src.dashboard.dashboard', compact('page'));
    }
}
