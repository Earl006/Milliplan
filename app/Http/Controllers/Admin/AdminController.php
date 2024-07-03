<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\unit;
use App\Models\Mission;
use Illuminate\Support\Facades\DB;
class AdminController extends Controller
{
    public function index()
    {
        $data = new User(); 
    
        $data->totalUsers = $data->count();
        $data->activeUsers = $data->where('status', 'active')->count();
        $data->totalUnits = $data->where('unit')->count();
        $data->deployedUnits = $data->where('deployments', 'deployed')->count();
        $data->reserveUnits = $data->where('deployments', 'reserve')->count();
        
        $unit = new Unit();
        $data->totalUnits = $unit->count();
        $data->deployedUnits = $unit->where('deployment_status', 'deployed')->count();
        $data->reserveUnits = $data->totalUnits - $data->deployedUnits;
        return view('admin.dashboard', compact('data'));
    }
    public function showOfficers()
    {
        $officers = User::all();
        return view('admin.officers', compact('officers'));
    }
    public function showEval()
    {
        $evals = User::all();
        return view('admin.eval', compact('evals'));
    }
    public function addUnits()
    {
        $units = Unit::all();
        $officers = User::all();
        return view('admin.add_units', compact('units', 'officers'));
    }
    public function addUnit(Request $request)
    {
        return view('admin.add_unit');
    }
    public function storeUnit(Request $request)
    {
        $unit = new Unit();
        $unit->unit = $request->unit;
        // $unit->officers = $request->officers;
        $unit->save();
        $units = Unit::all();
        $officers = User::all();
        return view('admin.add_units', compact('units', 'officers'));
        
    }
    public function deployUnits()
    {
        $units = Unit::all();
        $officers = User::all();
        return view('admin.deploy_units', compact('units', 'officers'));
    }

    public function updateEval(Request $request, $id)
    {
        $user = User::find($id);
        $user->psych_eval = $request->psych_eval;
        if ($request->approval == 'passed') {
            $user->psych_eval = 'passed';
            $user->status = 'active';
        } elseif ($request->approval == 'failed') {
            $user->psych_eval = 'failed';
            $user->status = 'inactive';
        }
        $user->save();
        return redirect()->back();
    }
    public function addOfficers()
    {
        $officers = User::whereNull('unit')->get();
        $units = Unit::all();
        return view('admin.add_officers', compact('officers', 'units'));
    }
    public function assignUnit(Request $request, $id)
    {
        $officer = User::find($id);
        $officer->unit = $request->input('unit_id');
        $officer->save();
        return redirect()->back();
    }
    public function deployUnit(Request $request)
{
    $mission = new Mission();
    $mission->operation_name = $request->operation_name;
    $mission->mission_details = $request->mission_details;
    $mission->deployment_area = $request->deployment_area;
    $mission->unit_name = $request->unit_id;
    $mission->save();

    $unitName = $mission->unit_name;
    
    $unit = Unit::where('unit', $unitName)->first();

    if ($unit) {
        // Check if deployment status is NULL and update it to 'deployed'
        $unit->deployment_status = 'deployed';
        $unit->deployments = DB::raw('deployments + 1');
        $unit->save();

        // Update deployment status and deployments for active users in the unit
        User::where('unit', $request->unit_id)
            ->where('status', 'active') // Add condition to check for active status
            ->update([
                'deployment_status' => 'deployed',
                'deployments' => DB::raw('deployments + 1')
            ]);
    }
    
    return redirect()->back();
}

    
       
    }
