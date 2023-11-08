<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Smcar;
use App\Models\Machine;
use App\Models\Truck;
use App\Models\General;
use App\Models\log;
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
//------------------------------------------------------ Index adminCar
    public function adminHome()
    {   // How to get data search Eloquent or Query Builder
        // $data_car_owner = DB::table('smcar2')->select('owner')->groupBy('owner')->get();
        $data_car_count_owner = DB::table('smcar2')->select('owner',DB::raw('count(owner) as _c'))->groupBy('owner')->get();
        $data_machine_count_owner = DB::table('machine2')->select('owner',DB::raw('count(owner) as _c'))->groupBy('owner')->get();
        $data_truck_count_owner = DB::table('truck')->select('owner',DB::raw('count(owner) as _c'))->groupBy('owner')->get();
        $data_general_work_count_owner = DB::table('general_work')->select('owner',DB::raw('count(owner) as _c'))->groupBy('owner')->get();
        // $smcar = Smcar::all();   //Eloquent
        $smcar = Smcar::where('deleted',0)->get();
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
//------------------------------------------------------ END Index adminCar

//------------------------------------------------------ Data Table AdminCar
    public function adminCar()
    {        
        // $smcar = Smcar::all();
        $smcar = Smcar::where('deleted',0)->get();
        $count_smcar = $smcar->count('id');
        $data = array(
            'smcar' => $smcar,   
            'count_smcar' => $count_smcar,                    
        );
        // dd($data);
        return view('admin.admin_Car',compact('data'));
        // return view('admin.admin_Car')->with('smcar',$smcar);
    }
//------------------------------------------------------ END Data Table AdminCar

//------------------------------------------------------ Form AddCar
    public function add_Car()
    {
        return view('admin.create.create_car');
    }
//------------------------------------------------------ End Form AddCar

//------------------------------------------------------ Store Car
    public function store_Car(Request $request)
    {
        $image = array();
        if($files = $request->file('path_img')){
            foreach($files as $file){
                $name_gen = hexdec(uniqid());   //เจนชื่อเป็นเลขฐาน 16
                $ext = strtolower($file->getClientOriginalExtension()); //ดึงนามสกถลไฟล์
                $image_full_name = $name_gen.'.'.$ext;  //นำชื่อที่เจนกับนามสกุลที่ดึงมาต่อกัน
                $upload_path = 'image/cars/'; //กำหนด path เก็บภาพ
                $image_url = $upload_path.$image_full_name; //เตรียม path เก็บฐานข้อมูล
                $file->move($upload_path,$image_full_name); //ย้ายภาพไปเก็บที่ path ที่กำหนด
                $image[] = $image_url;
            }
        }
        $new_data = array(
            'user_id'=>Auth::user()->id,
            'brand'=>$request->brand,
            'model'=>$request->model,
            'type'=>$request->type,
            'license'=>$request->license,
            'code_machine'=>$request->code_machine,
            'year'=>$request->year,
            'budget'=>$request->budget,
            'owner'=>$request->owner,
            'responsible_person'=>$request->responsible_person,
            'phone'=>$request->phone,
            'path_img'=>implode('|',$image),
            'note'=>$request->note,
            'is_status'=>$request->is_status,
            'deleted'=>$request->deleted,
            'created_at'=>Carbon::now(),
        );
        $convert_array_adddata = implode("|",$new_data);
        $user_action = 'Add Car';
        
        log::insert([
            'user_id'=>Auth::user()->id,
            'action'=>$user_action,
            'rank_user'=>Auth::user()->is_admin,
            'name_user'=>Auth::user()->name,
            'license'=>$request->license,
            'code_machine'=>$request->code_machine,
            'old_data'=>'null',
            'new_data'=>$convert_array_adddata,
            'time_add'=>Carbon::now(),
        ]);
        // dd($image);
        Smcar::insert([
            'user_id'=>Auth::user()->id,
            'brand'=>$request->brand,
            'model'=>$request->model,
            'type'=>$request->type,
            'license'=>$request->license,
            'code_machine'=>$request->code_machine,
            'year'=>$request->year,
            'budget'=>$request->budget,
            'owner'=>$request->owner,
            'responsible_person'=>$request->responsible_person,
            'phone'=>$request->phone,
            'path_img'=>implode('|',$image),
            'note'=>$request->note,
            'is_status'=>$request->is_status,
            'deleted'=>$request->deleted,
            'created_at'=>Carbon::now(),
        ]);

        return redirect()->route('admin.home');
    }    
//------------------------------------------------------ End Store Car

//------------------------------------------------------ Form EditCar
    public function edit_Car($id)
    {
        $smcar = Smcar::find($id);
        // dd($smcar);      
        return view('admin.edit.edit_car',compact('smcar'));    
    }
//------------------------------------------------------ End Form EditCar

//------------------------------------------------------ Update CarData
    public function update_Car(Request $request, $id)
    {    
        $smcar_olddata = Smcar::find($id)->toArray();
        $convert_array_old_data = implode("|",$smcar_olddata);
        $user_action = 'Edit Car';

        $image = array();
        if($files = $request->file('path_img')){
            foreach($files as $file){
                $name_gen = hexdec(uniqid());   //เจนชื่อเป็นเลขฐาน 16
                $ext = strtolower($file->getClientOriginalExtension()); //ดึงนามสกถลไฟล์
                $image_full_name = $name_gen.'.'.$ext;  //นำชื่อที่เจนกับนามสกุลที่ดึงมาต่อกัน
                $upload_path = 'image/cars/'; //กำหนด path เก็บภาพ
                $image_url = $upload_path.$image_full_name; //เตรียม path เก็บฐานข้อมูล
                $file->move($upload_path,$image_full_name); //ย้ายภาพไปเก็บที่ path ที่กำหนด
                $image[] = $image_url;
            }
        }

        $smcar_newdata = array(
            'user_id'=>Auth::user()->id,
            'brand'=>$request->brand,
            'model'=>$request->model,
            'type'=>$request->type,
            'license'=>$request->license,
            'code_machine'=>$request->code_machine,
            'year'=>$request->year,
            'budget'=>$request->budget,
            'owner'=>$request->owner,
            'responsible_person'=>$request->responsible_person,
            'phone'=>$request->phone,
            'path_img'=>implode('|',$image),
            'note'=>$request->note,
            'is_status'=>$request->is_status,
            'deleted'=>$request->deleted,
            'created_at'=>Carbon::now(),
        );
        $convert_array_new_data = implode("|",$smcar_newdata);

        log::insert([
            'user_id'=>Auth::user()->id,
            'action'=>$user_action,
            'rank_user'=>Auth::user()->is_admin,
            'name_user'=>Auth::user()->name,
            'license'=>$request->license,
            'code_machine'=>$request->code_machine,
            'old_data'=>$convert_array_old_data,
            'new_data'=>$convert_array_new_data,
            'time_add'=>Carbon::now(),
        ]);

        Smcar::find($id)->update([
            'user_id'=>Auth::user()->id,
            'brand'=>$request->brand,
            'model'=>$request->model,
            'type'=>$request->type,
            'license'=>$request->license,
            'code_machine'=>$request->code_machine,
            'year'=>$request->year,
            'budget'=>$request->budget,
            'owner'=>$request->owner,
            'responsible_person'=>$request->responsible_person,
            'phone'=>$request->phone,
            'path_img'=>implode('|',$image),
            'note'=>$request->note,
            'is_status'=>$request->is_status,
            'deleted'=>$request->deleted,
            'created_at'=>Carbon::now(),
        ]);    
        return redirect()->route('admin.car');
    }
//------------------------------------------------------ End Update CarData

//------------------------------------------------------ Show CarData
    public function show_Car($id)
    {
        $smcar = Smcar::find($id);
        return view('admin.show.show_car',compact('smcar'));
    }
//------------------------------------------------------ End Show Cardata

    public function adminMachine()
    {           
        // $machine = Machine::all();
        $machine = Machine::where('deleted',0)->get();
        $count_machine = $machine->count('id');
        $data = array(
            'machine' => $machine,
            'count_machine' => $count_machine,            
        );
        return view('admin.admin_Machine',compact('data'));
    }

    public function add_Machine()
    {
        return view('admin.create.create_machine');
    }

    public function store_Machine(Request $request)
    {
        $image = array();
        if($files = $request->file('path_img')){
            foreach($files as $file){
                $name_gen = hexdec(uniqid());
                $ext = strtolower($file->getClientOriginalExtension());
                $image_full_name = $name_gen.'.'.$ext;
                $upload_path = 'image/machines/';
                $image_url = $upload_path.$image_full_name;
                $file->move($upload_path,$image_full_name);
                $image[] = $image_url;
            }
        }
        $new_data = array(
            'user_id'=>Auth::user()->id,
            'brand'=>$request->brand,
            'model'=>$request->model,
            'type'=>$request->type,
            'license'=>$request->license,
            'code_machine'=>$request->code_machine,
            'year'=>$request->year,
            'budget'=>$request->budget,
            'owner'=>$request->owner,
            'responsible_person'=>$request->responsible_person,
            'phone'=>$request->phone,
            'path_img'=>implode('|',$image),
            'note'=>$request->note,
            'is_status'=>$request->is_status,
            'deleted'=>$request->deleted,
            'created_at'=>Carbon::now(),
        );
        $convert_array_adddata = implode("|",$new_data);
        $user_action = 'Add Machine';
        
        log::insert([
            'user_id'=>Auth::user()->id,
            'action'=>$user_action,
            'rank_user'=>Auth::user()->is_admin,
            'name_user'=>Auth::user()->name,
            'license'=>$request->license,
            'code_machine'=>$request->code_machine,
            'old_data'=>'null',
            'new_data'=>$convert_array_adddata,
            'time_add'=>Carbon::now(),
        ]);
        Machine::insert([
            'user_id'=>Auth::user()->id,
            'brand'=>$request->brand,
            'model'=>$request->model,
            'type'=>$request->type,
            'license'=>$request->license,
            'code_machine'=>$request->code_machine,
            'year'=>$request->year,
            'budget'=>$request->budget,
            'owner'=>$request->owner,
            'responsible_person'=>$request->responsible_person,
            'phone'=>$request->phone,
            'path_img'=>implode('|',$image),
            'note'=>$request->note,
            'is_status'=>$request->is_status,
            'deleted'=>$request->deleted,
            'created_at'=>Carbon::now(),
        ]);

        return redirect()->route('admin.home');
    }

    public function show_Machine($id)
    {
        $machine = Machine::find($id);
        return view('admin.show.show_machine',compact('machine'));
    }

    public function edit_Machine($id)
    {
        $machine = Machine::find($id);
        return view('admin.edit.edit_machine',compact('machine'));
    }

    public function update_Machine(Request $request, $id)
    {
        $machine_olddata = Machine::find($id)->toArray();
        $convert_array_old_data = implode("|",$machine_olddata);
        $user_action = 'Edit Machine';

        $image = array();
        if($files = $request->file('path_img')){
            foreach($files as $file){
                $name_gen = hexdec(uniqid());
                $ext = strtolower($file->getClientOriginalExtension());
                $image_full_name = $name_gen.'.'.$ext;
                $upload_path = 'image/machines/';
                $image_url = $upload_path.$image_full_name;
                $file->move($upload_path,$image_full_name);
                $image[] = $image_url;
            }
        }
        $machine_newdata = array(
            'user_id'=>Auth::user()->id,
            'brand'=>$request->brand,
            'model'=>$request->model,
            'type'=>$request->type,
            'license'=>$request->license,
            'code_machine'=>$request->code_machine,
            'year'=>$request->year,
            'budget'=>$request->budget,
            'owner'=>$request->owner,
            'responsible_person'=>$request->responsible_person,
            'phone'=>$request->phone,
            'path_img'=>implode('|',$image),
            'note'=>$request->note,
            'is_status'=>$request->is_status,
            'deleted'=>$request->deleted,
            'created_at'=>Carbon::now(),
        );
        $convert_array_new_data = implode("|",$machine_newdata);

        log::insert([
            'user_id'=>Auth::user()->id,
            'action'=>$user_action,
            'rank_user'=>Auth::user()->is_admin,
            'name_user'=>Auth::user()->name,
            'license'=>$request->license,
            'code_machine'=>$request->code_machine,
            'old_data'=>$convert_array_old_data,
            'new_data'=>$convert_array_new_data,
            'time_add'=>Carbon::now(),
        ]);

        Machine::find($id)->update([
            'user_id'=>Auth::user()->id,
            'brand'=>$request->brand,
            'model'=>$request->model,
            'type'=>$request->type,
            'license'=>$request->license,
            'code_machine'=>$request->code_machine,
            'year'=>$request->year,
            'budget'=>$request->budget,
            'owner'=>$request->owner,
            'responsible_person'=>$request->responsible_person,
            'phone'=>$request->phone,
            'path_img'=>implode('|',$image),
            'note'=>$request->note,
            'is_status'=>$request->is_status,
            'deleted'=>$request->deleted,
            'created_at'=>Carbon::now(),
        ]);    
        return redirect()->route('admin.machine');
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
