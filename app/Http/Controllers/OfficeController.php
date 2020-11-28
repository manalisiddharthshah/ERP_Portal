<?php
 
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Validator,Redirect,Response;
//Use App\User;
Use App\Office;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
date_default_timezone_set("Asia/Kolkata");
 
class OfficeController extends Controller
{
	/**
     * Display a listing of the Offices.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$office=Office::where('deleted_at',NULL)->get();
        return view('Offices.office',compact('office'));
    }  
    /**
     * Show the form for editing the specified Department.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit_office=Office::findOrFail($id);
        return view('Offices.edit',compact('edit_office'));
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
        'officeName' => 'required',
        'location' => 'required',
        ]);
        $input_data=$request->all();
        $date=date('Y-m-d H:i:s');
        DB::table('offices')->where('id',$id)->update([
            'officeName'=>$input_data['officeName'],
            'location'=>$input_data['location'],
            'updated_at' => $date,
        ]);
        return redirect()->route('office.index')->with('success','Office Updated Successfully!');
        //return redirect()->route('office.index')->with('message','Updated Success!');
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
        DB::table('offices')->where('id',$id)->update([
            'deleted_at' => $date,
        ]);
        return redirect()->route('office.index')->with('success','Office Deleted Successfully!');
        //return redirect()->route('office.index')->with('message','Deleted Successfully!');
    }
}