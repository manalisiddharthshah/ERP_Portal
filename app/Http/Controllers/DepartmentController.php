<?php
 
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Validator,Redirect,Response;
//Use App\User;
Use App\Department;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
date_default_timezone_set("Asia/Kolkata");
 
class DepartmentController extends Controller
{
	/**
     * Display a listing of the department.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$department=Department::where('deleted_at',NULL)->get();
        return view('Departments.department',compact('department'));
    } 
    /**
     * Show the form for editing the specified Department.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit_department=Department::findOrFail($id);
        $user=DB::table('users')->get();
        return view('Departments.edit',compact('edit_department','user'));
    }
    /**
     * Update the specified Department in the  department.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
        'deptName' => 'required',
        'mgrNo' => 'required',
        'location' => 'required',
        ]);
        $input_data=$request->all();
        $date=date('Y-m-d H:i:s');
        DB::table('departments')->where('id',$id)->update([
            'deptName'=>$input_data['deptName'],
            'mgrNo'=>$input_data['mgrNo'],
            'location'=>$input_data['location'],
            'updated_at' => $date,
        ]);
        return redirect()->route('department.index')->with('success','Department Updated Successfully!');
        //return redirect()->route('department.index')->with('message','Updated Success!');
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
        DB::table('departments')->where('id',$id)->update([
            'deleted_at' => $date,
        ]);
        return redirect()->route('department.index')->with('success','Department Deleted Successfully!');
        //return redirect()->route('department.index')->with('message','Deleted Successfully!');

    }
}