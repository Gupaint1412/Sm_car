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
// use RealRashid\SweetAlert\Facades\Alert;

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
    public function adminHome(Request $request)
    {   // How to get data search Eloquent or Query Builder        

        // $data_car_count_owner = DB::table('smcar2')->select('owner',DB::raw('count(owner) as _c'))->groupBy('owner')->get();             
        // $data_machine_count_owner = DB::table('machine2')->select('owner',DB::raw('count(owner) as _c'))->groupBy('owner')->get();
        // $data_truck_count_owner = DB::table('truck')->select('owner',DB::raw('count(owner) as _c'))->groupBy('owner')->get();        
        // $data_general_work_count_owner = DB::table('general_work')->select('owner',DB::raw('count(owner) as _c'))->groupBy('owner')->get();

        $data_car_count_owner = DB::table('smcar2')->select('owner','deleted')->select('owner',DB::raw('count(owner) as _c'))->where('deleted',0)->groupBy('owner')->get();  
        $data_machine_count_owner = DB::table('machine2')->select('owner','deleted')->select('owner',DB::raw('count(owner) as _c'))->where('deleted',0)->groupBy('owner')->get();        
        $data_truck_count_owner = DB::table('truck')->select('owner','deleted')->select('owner',DB::raw('count(owner) as _c'))->where('deleted',0)->groupBy('owner')->get();        
        $data_general_work_count_owner = DB::table('general_work')->select('owner','deleted')->select('owner',DB::raw('count(owner) as _c'))->where('deleted',0)->groupBy('owner')->get();

        // $smcar = Smcar::all();   //Eloquent
        $smcar = Smcar::where('deleted',0)->get();
        $machine = Machine::where('deleted',0)->get();
        $truck = Truck::where('deleted',0)->get();
        $general = General::where('deleted',0)->get();
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
        // $request->session()->flash('alert-success','show Success alert');
        return view('admin.adminHome',compact('data'));
    }
//------------------------------------------------------ END Index adminCar

//------------------------------------------------------ Data Table AdminCar
    public function adminCar()
    {                
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
        $request->session()->flash('alert-store-success','บันทึกข้อมูลสำเร็จ');
        return redirect()->route('admin.car');
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

    public function delete_Car($id)
    {   
        $user_action = 'Delete Car';        
        $smcar = Smcar::find($id)->update(['deleted'=>'1']);
        return redirect()->route('admin.car');
    }

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

        return redirect()->route('admin.machine');
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

    public function delete_Machine($id)
    {
        $user_action = 'Delete Machine';
        $machine = Machine::find($id)->update(['deleted'=>'1']);
        return redirect()->route('admin.machine');
    }

    public function adminTruck()
    {                
        // $truck = Truck::all();
        $truck = Truck::where('deleted',0)->get();
        $count_truck = $truck->count('id');
        $data = array(
            'truck' => $truck,
            'count_truck'=>$count_truck,            
        );
        // dd($data);
        return view('admin.admin_Truck',compact('data'));
    }

    public function add_Truck()
    {
        return view('admin.create.create_truck');
    }

    public function store_Truck(Request $request)
    {
        $image = array();
        if($files = $request->file('path_img')){
            foreach($files as $file){
                $name_gen = hexdec(uniqid());
                $ext = strtolower($file->getClientOriginalExtension());
                $image_full_name = $name_gen.'.'.$ext;
                $upload_path = 'image/trucks/';
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
            'hp_kw'=>$request->hp_kw." "."แรงม้า",
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
        $user_action = 'Add Truck';
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
        Truck::insert([
            'user_id'=>Auth::user()->id,
            'brand'=>$request->brand,
            'model'=>$request->model,
            'type'=>$request->type,
            'license'=>$request->license,
            'code_machine'=>$request->code_machine,
            'hp_kw'=>$request->hp_kw." "."แรงม้า",
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

        return redirect()->route('admin.truck');
    }

    public function edit_Truck($id)
    {
        $truck = Truck::find($id);
        return view('admin.edit.edit_truck',compact('truck'));
    }

    public function update_Truck(Request $request ,$id)
    {
        $truck_olddata = Truck::find($id)->toArray();
        $convert_array_old_data = implode("|",$truck_olddata);
        $user_action = 'Edit Truck';

        $image = array();
        if($files = $request->file('path_img')){
            foreach($files as $file){
                $name_gen = hexdec(uniqid());
                $ext = strtolower($file->getClientOriginalExtension());
                $image_full_name = $name_gen.'.'.$ext;
                $upload_path = 'image/trucks/';
                $image_url = $upload_path.$image_full_name;
                $file->move($upload_path,$image_full_name);
                $image[] = $image_url;
            }
        }
        $truck_newdata = array(
            'user_id'=>Auth::user()->id,
            'brand'=>$request->brand,
            'model'=>$request->model,
            'type'=>$request->type,
            'license'=>$request->license,
            'code_machine'=>$request->code_machine,
            'hp_kw'=>$request->hp_kw.' ','แรงม้า',
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
        $convert_array_new_data = implode("|",$truck_newdata);

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

        Truck::find($id)->update([
            'user_id'=>Auth::user()->id,
            'brand'=>$request->brand,
            'model'=>$request->model,
            'type'=>$request->type,
            'license'=>$request->license,
            'code_machine'=>$request->code_machine,
            'hp_kw'=>$request->hp_kw." "."แรงม้า",
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
        // Truck::find($id)->update([$truck_newdata]);
        return redirect()->route('admin.truck');
    }

    public function show_Truck($id)
    {
        $truck = Truck::find($id);
        return view('admin.show.show_truck',compact('truck'));
    }

    public function delete_Truck($id)
    {
        $user_action = 'Delete Truck';
        $truck = Truck::find($id)->update(['deleted'=>'1']);
        return redirect()->route('admin.truck');
    }

    public function adminGeneral()
    {        
        // $general = General::all();
        $general = General::where('deleted',0)->get();
        $count_general = $general->count('id');
        $data = array(
            'general' => $general,            
            'count_general'=>$count_general,
        );
        // dd($data);
        return view('admin.admin_General',compact('data'));
    }

    public function add_General()
    {
        return view('admin.create.create_general');
    }

    public function store_General(Request $request)
    {
        $image = array();
        if($files = $request->file('path_img')){
            foreach($files as $file){
                $name_gen = hexdec(uniqid());
                $ext = strtolower($file->getClientOriginalExtension());
                $image_full_name = $name_gen.'.'.$ext;
                $upload_path = 'image/generals/';
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
            'hp_kw'=>$request->hp_kw." "."แรงม้า",
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
        $user_action = 'Add General';
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
        General::insert([
            'user_id'=>Auth::user()->id,
            'brand'=>$request->brand,
            'model'=>$request->model,
            'type'=>$request->type,
            'license'=>$request->license,
            'code_machine'=>$request->code_machine,
            'hp_kw'=>$request->hp_kw." "."แรงม้า",
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

        return redirect()->route('admin.general');
    }

    public function edit_General($id)
    {
        $general = General::find($id);
        return view('admin.edit.edit_general',compact('general'));
    }

    public function update_General(Request $request ,$id)
    {
        $general_olddata = General::find($id)->toArray();
        $convert_array_old_data = implode("|",$general_olddata);
        $user_action = 'Edit General';

        $image = array();
        if($files = $request->file('path_img')){
            foreach($files as $file){
                $name_gen = hexdec(uniqid());
                $ext = strtolower($file->getClientOriginalExtension());
                $image_full_name = $name_gen.'.'.$ext;
                $upload_path = 'image/generals/';
                $image_url = $upload_path.$image_full_name;
                $file->move($upload_path,$image_full_name);
                $image[] = $image_url;
            }
        }
        $general_newdata = array(
            'user_id'=>Auth::user()->id,
            'brand'=>$request->brand,
            'model'=>$request->model,
            'type'=>$request->type,
            'license'=>$request->license,
            'code_machine'=>$request->code_machine,
            'hp_kw'=>$request->hp_kw.' ','แรงม้า',
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
        $convert_array_new_data = implode("|",$general_newdata);

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
        General::find($id)->update([
            'user_id'=>Auth::user()->id,
            'brand'=>$request->brand,
            'model'=>$request->model,
            'type'=>$request->type,
            'license'=>$request->license,
            'code_machine'=>$request->code_machine,
            'hp_kw'=>$request->hp_kw." "."แรงม้า",
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
        // Truck::find($id)->update([$truck_newdata]);
        return redirect()->route('admin.general');
    }

    public function show_General($id)
    {
        $general = General::find($id);
        return view('admin.show.show_general',compact('general'));
    }

    public function delete_General($id)
    {
        $user_action = 'Delete General';
        $general = General::find($id)->update(['deleted'=>'1']);
        return redirect()->route('admin.general');
    }
}
