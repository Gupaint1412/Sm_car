<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Smcar;
use App\Models\Machine;
use App\Models\Truck;
use App\Models\General;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function adminHome()
    {       
        // $data_car_owner = DB::table('smcar2')->select('owner')->groupBy('owner')->get();
        $data_car_count_owner = DB::table('smcar2')->select('owner',DB::raw('count(owner) as _c'))->groupBy('owner')->get();
        $data_machine_count_owner = DB::table('machine2')->select('owner',DB::raw('count(owner) as _c'))->groupBy('owner')->get();
        $data_truck_count_owner = DB::table('truck')->select('owner',DB::raw('count(owner) as _c'))->groupBy('owner')->get();
        $data_general_work_count_owner = DB::table('general_work')->select('owner',DB::raw('count(owner) as _c'))->groupBy('owner')->get();
        $smcar = Smcar::all();
        $machine = Machine::all();
        $truck = Truck::all();
        $general = General::all();
        $count_smcar = $smcar->count('id');
        $count_machine = $machine->count('id');
        $count_general = $general->count('id');
        $count_truck = $truck->count('id');
        $data = array (            
            // 'data_car_owner' => $data_car_owner,
            'data_car_count_owner' => $data_car_count_owner,
            'data_machine_count_owner' => $data_machine_count_owner,
            'data_truck_count_owner' => $data_truck_count_owner,
            'data_general_work_count_owner' => $data_general_work_count_owner,
            'smcar' => $smcar,
            'count_smcar' => $count_smcar,
            'machine' => $machine,
            'count_machine' => $count_machine,
            'truck' => $truck,
            'count_truck' => $count_truck,
            'general' => $general,
            'count_general' => $count_general,
        );        
        return view('admin.adminHome',compact('data'));
    }

    public function adminCar()
    {        
        $smcar = Smcar::all();
        $data = array(
            'smcar' => $smcar,           
        );
        // dd($data);
        // return view('admin.admin_Car',compact('data'));
        return view('admin.admin_Car')->with('smcar',$smcar);
    }

    public function add_Car()
    {
        return view('admin.create.create_car');
    }

    public function edit_Car($id)
    {
        $smcar = Smcar::find($id);
        // dd($smcar->id);
        // return view('admin.edit.edit_car')->with('smcar',$smcar);
        return view('admin.edit.edit_car',compact('smcar'));    
    }

    public function update_Car()
    {
        return redirect()->route('admin.car');
    }
    public function adminMachine()
    {           
        $machine = Machine::all();
        $data = array(
            'machine' => $machine,            
        );
        dd($data);
        return view('admin.admin_Machine',compact('data'));
    }
    public function adminTruck()
    {                
        $truck = Truck::all();
        $data = array(
            'truck' => $truck,            
        );
        dd($data);
        return view('admin.admin_Truck',compact('data'));
    }
    public function adminGeneral()
    {        
        $general = General::all();
        $data = array(
            'general' => $general,            
        );
        dd($data);
        return view('admin.admin_General',compact('data'));
    }
}