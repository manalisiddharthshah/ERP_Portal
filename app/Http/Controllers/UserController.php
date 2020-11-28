<?php
 
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Validator,Redirect,Response;
use App\User;
use App\Task;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
date_default_timezone_set("Asia/Kolkata");
class UserController extends Controller
{
    /**
     * Show the form for validating a new User.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('login');
    }  
    /**
     * Show the form for creating a new User.
     *
     * @return \Illuminate\Http\Response
     */
    public function registration()
    {
        $userType=DB::table('user_types')->get();
        $department=DB::table('departments')->get();
        $offices=DB::table('offices')->get();
        return view('registration',compact('userType','department','offices'));
    }
    //custom registration
    /*public function postRegistration(Request $request)
    {  
        request()->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'phone' => 'required|min:10|max:10',
        'address' => 'min:10',
        'password' => 'required|min:6',
        ]);
         
        $data = $request->all();
 
        Users::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'phone' => $data['phone'],
        'address' => $data['address'],
        'password' => sha1($data['password'])
      ]);
       
        return Redirect::to("login");
    }*/
    /**
     * Store a newly created User in users.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(array $data)
    {
        $manager = 0;
        $tech_lead = 0;
        $software_engineer = 0;
        if($data['userTypeId'] == '1')
        {
            $manager=1;
        }
        else if($data['userTypeId'] == '2')
        {
            $tech_lead = 1;
        }
        else 
        {
            $software_engineer = 1;
        }
        return User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'address' => $data['address'],
                'userTypeId' => $data['userTypeId'],
                'deptId' => $data['deptId'],
                'officeId' => $data['officeId'],
                'admin' => '0',
                'manager' => $manager,
                'tech_lead' => $tech_lead,
                'software_engineer' => $software_engineer,
                'password' => Hash::make($data['password'])
              ]);
        
    }
    /**
     * Store a newly created User in susers via create().
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postRegistration(Request $request)
    {  
        request()->validate([
        'name' => 'required|string|max:100',
        'email' => 'required|string|email|unique:users,email',
        'phone' => 'required|min:10|max:10',
        'address' => 'min:10',
        'userTypeId' => 'required',
        'deptId' => 'required',
        'officeId' => 'required',
        'password' => 'required|min:6|confirmed',
        ]);
         
        $data = $request->all();
 
        $check = $this->create($data);
        return redirect()->intended('registration')->with('success','You Have Successfully Registered');
        //return back()->with('message','You Have Successfully Registered');
    }
    //custom login
    /*public function postLogin(Request $request)
    {
        request()->validate([
        'email' => 'required',
        'password' => 'required',
        ]);
        $data = $request->all();
        Users::select('*')->where(
        [
        	['email','=',$data['email']],
        	['password','=',sha1($data['password'])],
        ])->get();
        $request->session()->put('logData',[$request->input('email')]);
        return redirect("dashboard");

    }*/
    /**
     * Authenticate user
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function postLogin(Request $request)
    {
        request()->validate([
        'email' => 'required|string|email',
        'password' => 'required|min:6',
        ]);
 
        $input_data=$request->all();
        if(Auth::attempt(['email'=>$input_data['email'],'password'=>$input_data['password']])){
            Session::put('frontSession',$input_data['email']); 
            return redirect('dashboard');   
        }
        else
        {
            return redirect()->intended('login')->with('error','Oppes! Your Account is not Valid!');
            //return back()->with('message','Oppes! Your Account is not Valid!');
        }
    }
    /**
     * Show the Dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        $user_login=User::where('id',Auth::id())->first();
        $task=Task::where('deleted_at',NULL)->get();
        $assign = Task::where('assignBy',Auth::id())->where('deleted_at',NULL)->count();
        $recived = Task::where('assignTo',Auth::id())->where('deleted_at',NULL)->count();
        $totalAssign = Task::where('deleted_at',NULL)->count();
        return view('dashboard',compact('user_login','task','assign','recived','totalAssign'));
    }
    //custom logout
    /*public function logout() {
        //Sentinel::logout();
        Session::flush();
        Auth::logout();
        return Redirect::back();
    }*/
    /**
     * Logout the user.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function logout() {
        Session::flush();
        Auth::logout();
        return Redirect('login');
    }
    /**
     * Show the form for Update a Authenticated user profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function profileUpdate()
    {
        $user_login=User::where('id',Auth::id())->first();
        $userType=DB::table('user_types')->get();
        $department=DB::table('departments')->get();
        $offices=DB::table('offices')->get();
        return view('profileUpdate',compact('userType','department','offices','user_login'));
    }
    /**
     * Update the specified Authenticated user profile in user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateprofile(Request $request,$id){
        request()->validate([
        'name' => 'required|string|max:100',
        'email' => 'required|string|email',
        'phone' => 'required|min:10|max:10',
        'address' => 'min:10',
        'userTypeId' => 'required',
        'deptId' => 'required',
        'officeId' => 'required',
        ]);
        $input_data=$request->all();
        $manager = 0;
        $tech_lead = 0;
        $software_engineer = 0;
        $date=date('Y-m-d H:i:s');
        if($input_data['userTypeId'] == '1')
        {
            $manager=1;
        }
        else if($input_data['userTypeId'] == '2')
        {
            $tech_lead = 1;
        }
        else 
        {
            $software_engineer = 1;
        }
        DB::table('users')->where('id',$id)->update([
            'name'=>$input_data['name'],
            'email'=>$input_data['email'],
            'phone'=>$input_data['phone'],
            'address'=>$input_data['address'],
            'userTypeId' => $input_data['userTypeId'],
            'deptId' => $input_data['deptId'],
            'officeId' => $input_data['officeId'],
            'admin' => '0',
            'manager' => $manager,
            'tech_lead' => $tech_lead,
            'software_engineer' => $software_engineer,
            'updated_at' => $date,
        ]);
        return redirect()->intended('profileUpdate')->with('success','Profile Updated Successfully');
    }
    /**
     * Show the form for Reset New Password in user for authenticated user.
     *
     * @return \Illuminate\Http\Response
     */
    public function newPassword()
    {
        $user_login=User::where('id',Auth::id())->first();
        return view('newPassword',compact('user_login'));
    }
    /**
     * Update the specified Authenticated user password in user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatepassword(Request $request,$id){
        $oldPassword=User::where('id',$id)->first();
        $input_data=$request->all();
        if(Hash::check($input_data['password'],$oldPassword->password)){
            $this->validate($request,[
               'newPassword'=>'required|min:6|max:12|confirmed'
            ]);
            $new_pass=Hash::make($input_data['newPassword']);
            $date=date('Y-m-d H:i:s');
            User::where('id',$id)->update(['password'=>$new_pass,'updated_at' => $date,]);
            return redirect()->intended('newPassword')->with('success','New Password Updated Successfully!');
           // return back()->with('message','New Password Updated Successfully!');
        }else{
            return back()->with('oldpassword','Old Password is Inconrrect!');
        }
    }
    /**
     * Display a listing of the Users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::where('deleted_at',NULL)->get();

       // $user=User::all();
        return view('Users.index',compact('user'));
    }
    /**
     * Show the form for editing the specified User.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit_user=User::findOrFail($id);
        $userType=DB::table('user_types')->get();
        $department=DB::table('departments')->get();
        $offices=DB::table('offices')->get();
        return view('Users.edit',compact('edit_user','userType','department','offices'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
        'name' => 'required|string|max:100',
        'email' => 'required|string|email',
        'phone' => 'required|min:10|max:10',
        'address' => 'min:10',
        'userTypeId' => 'required',
        'deptId' => 'required',
        'officeId' => 'required',
        ]);
        $input_data=$request->all();
        $manager = 0;
        $tech_lead = 0;
        $software_engineer = 0;
        if($input_data['userTypeId'] == '1')
        {
            $manager=1;
        }
        else if($input_data['userTypeId'] == '2')
        {
            $tech_lead = 1;
        }
        else 
        {
            $software_engineer = 1;
        }
        $date=date('Y-m-d H:i:s');
        DB::table('users')->where('id',$id)->update([
            'name'=>$input_data['name'],
            'email'=>$input_data['email'],
            'phone'=>$input_data['phone'],
            'address'=>$input_data['address'],
            'userTypeId' => $input_data['userTypeId'],
            'deptId' => $input_data['deptId'],
            'officeId' => $input_data['officeId'],
            'admin' => '0',
            'manager' => $manager,
            'tech_lead' => $tech_lead,
            'software_engineer' => $software_engineer,
            'updated_at' => $date,
        ]);
        return redirect()->route('user.index')->with('success','User Updated Successfully!');
        //return redirect()->route('user.index')->with('message','Updated Success!');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $date=date('Y-m-d H:i:s');
        DB::table('users')->where('id',$id)->update([
            'deleted_at' => $date,
        ]);
        return redirect()->route('user.index')->with('message','User Deleted Successfully!');
       // return redirect()->route('user.index')->with('message','Deleted Successfully!');
    }
}