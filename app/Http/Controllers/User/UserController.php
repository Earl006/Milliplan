<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Auth;
use App\Models\User;
use App\Models\Deployment;
use App\Models\Mission;
class UserController extends Controller
{
    public function index()
    {
        if(Auth::user()->role == 'admin'){
            return redirect()->route('admin.dashboard');
        }

        return view('user.dashboard');}
    public function showDeployments($id)
    {
        // dd($id);
        $officer= User::find($id);
        $unit = $officer->unit;
        $deployments = Mission::where('unit_name',$unit)->get();

        return view('user.show_deployments',compact('deployments'));
    }
    public function showEval()
    {
        return view('user.show_eval');
    }
    
}
