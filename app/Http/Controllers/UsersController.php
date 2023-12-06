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

class UsersController extends Controller
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
        $data_car_count_owner = DB::table('smcar2')->select('owner',DB::raw('count(owner) as _c'))->groupBy('owner')->get();
        $data_machine_count_owner = DB::table('machine2')->select('owner',DB::raw('count(owner) as _c'))->groupBy('owner')->get();
        $data_truck_count_owner = DB::table('truck')->select('owner',DB::raw('count(owner) as _c'))->groupBy('owner')->get();
        $data_general_work_count_owner = DB::table('general_work')->select('owner',DB::raw('count(owner) as _c'))->groupBy('owner')->get();
        $smcar = Smcar::all();
        $machine = Machine::all();
        $truck = Truck::all();
        $general = General::all();        

        if(auth()->user()->agency == '' && auth()->user()->agency == null){
            $count_smcar = $smcar->count('id');
            $count_machine = $machine->count('id');
            $count_general = $general->count('id');
            $count_truck = $truck->count('id');
        }
        elseif( auth()->user()->agency == 'กองพัสดุ') {
            $count_smcar = $smcar->count('id');
            $count_machine = $machine->count('id');
            $count_general = $general->count('id');
            $count_truck = $truck->count('id');
        }
        else
        {
            $data_for_count_smcar = Smcar::where('deleted',0)->where('owner',auth()->user()->agency)->get();
            $data_for_count_machine = Machine::where('deleted',0)->where('owner',auth()->user()->agency)->get();
            $data_for_count_truck = Truck::where('deleted',0)->where('owner',auth()->user()->agency)->get();
            $data_for_count_general = General::where('deleted',0)->where('owner',auth()->user()->agency)->get();
    
            $count_smcar = count($data_for_count_smcar);
            $count_machine = count($data_for_count_machine);    
            $count_general = count($data_for_count_general);        
            $count_truck = count($data_for_count_truck);
            
        }  
        

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
        return view('users.usersHome',compact('data'));
    }

    public function usersCar()
    {        
        // $smcar = Smcar::all();
        // $smcar = Smcar::where('deleted',0)->get();
        if(auth()->user()->agency == '' && auth()->user()->agency == null){
            $smcar = Smcar::where('deleted',0)->get();
            $count_smcar = $smcar->count('id');
        }
        elseif( auth()->user()->agency == 'กองพัสดุ') {
            $smcar = Smcar::where('deleted',0)->get();
            $count_smcar = $smcar->count('id');
        }
        else
        {
            $smcar = Smcar::where('deleted',0)->where('owner',auth()->user()->agency)->get();
            $count_smcar = count($smcar);            
        }       
        $data = array(
            'smcar' => $smcar,
            'count_smcar' => $count_smcar,        
        );    
        return view('users.users_Car',compact('data'));
    }

    public function add_Car()
    {
        return view('users.create.create_car');
    }

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
        return redirect()->route('users.car');
    }

    public function edit_Car($id)
    {
        $smcar = Smcar::find($id);
        return view('users.edit.edit_car',compact('smcar'));
    }

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
        return redirect()->route('users.car');
    }

    public function show_Car($id)
    {
        $smcar = Smcar::find($id);
        return view('users.show.show_car',compact('smcar'));
    }

    public function usersMachine()
    {           
        // $machine = Machine::all();
        $machine = Machine::where('deleted',0)->get();
        $count_machine = $machine->count('deleted',0);
        $data = array(
            'machine' => $machine,
            'count_machine' => $count_machine,            
        );
        // dd($data);
        return view('users.users_Machine',compact('data'));
    }

    public function add_Machine()
    {
        return view('users.create.create_machine');
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

        return redirect()->route('users.machine');
    }

    public function show_Machine($id)
    {
        $machine = Machine::find($id);
        return view('users.show.show_machine',compact('machine'));
    }

    public function edit_Machine($id)
    {
        $machine = Machine::find($id);
        return view('users.edit.edit_machine',compact('machine'));
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
        return redirect()->route('users.machine');
    }

    public function usersTruck()
    {                
        // $truck = Truck::all();
        $truck = Truck::where('deleted',0)->get();
        $count_truck = $truck->count('deleted',0);
        $data = array(
            'truck' => $truck,            
            'count_truck' => $count_truck,
        );
        // dd($data);
        return view('users.users_Truck',compact('data'));
    }

    public function add_Truck()
    {
        return view('users.create.create_truck');
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

        return redirect()->route('users.truck');
    }

    public function edit_Truck($id)
    {
        $truck = Truck::find($id);
        return view('users.edit.edit_truck',compact('truck'));
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
        return redirect()->route('users.truck');
    }

    public function show_Truck($id)
    {
        $truck = Truck::find($id);
        return view('users.show.show_truck',compact('truck'));
    }

    public function usersGeneral()
    {        
        // $general = General::all();
        $general = General::where('deleted',0)->get();
        $count_general = $general->count('deleted',0);
        $data = array(
            'general' => $general,            
            'count_general' => $count_general,
        );
        // dd($data);
        return view('users.users_General',compact('data'));
    }
    
    public function add_General()
    {
        return view('users.create.create_general');
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

        return redirect()->route('users.general');
    }

    public function edit_General($id)
    {
        $general = General::find($id);
        return view('users.edit.edit_general',compact('general'));
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
        return redirect()->route('users.general');
    }

    public function show_General($id)
    {
        $general = General::find($id);
        return view('users.show.show_general',compact('general'));
    }

}
