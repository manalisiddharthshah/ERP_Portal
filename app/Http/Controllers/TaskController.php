<?php
 
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Validator,Redirect,Response;
Use App\User;
Use App\Task;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
date_default_timezone_set("Asia/Kolkata");
class TaskController extends Controller
{
	/**
     * Display a listing of the Users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	if(Auth::user()->isManager())
    	{
    		$user = User::where('deleted_at',NULL)->where('userTypeId',2)->get();
    	}
    	else if(Auth::user()->isTechLead())
    	{
    		$user = User::where('deleted_at',NULL)->where('userTypeId',3)->get();
    	}
    	else
    	{
    		$user = User::where('deleted_at',NULL)->get();
    	}
        return view('Tasks.task',compact('user'));
    }
    public function addTask($id){
        $assign_to=User::select('name','id')->where('id',$id)->first();
        $assign_by=User::select('name','id')->where('id',Auth::id())->first();
        return view('Tasks.create',compact('assign_to','assign_by'));
    }
    /**
     * Store a newly created User in susers via create().
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {  
        request()->validate([
        'taskName' => 'required|string|max:100',
        'taskDescription' => 'required|min:10',
        'startDate' => 'required',
        'endDate' => 'required'
        ]);
         
        $data = $request->all();
        Task::create([
                'taskName' => $data['taskName'],
                'taskDescription' => $data['taskDescription'],
                'assignTo' => $data['assignTo'],
                'assignBy' => $data['assignBy'],
                'startDate' => $data['startDate'],
                'endDate' => $data['endDate']
              ]);
        return redirect()->route('task.index')->with('success','Task Added Successfully');
        //return back()->with('message','You Have Successfully Registered');
    }
    public function recivedTask()
    {
        $task=Task::where('deleted_at',NULL)->get();
        return view('Tasks.recivedTask',compact('task'));
    }
    public function assignedTask()
    {
        $task=Task::where('deleted_at',NULL)->get();
        return view('Tasks.assignedTask',compact('task'));
    }
    public function totalAssignTask()
    {
        $task=Task::where('deleted_at',NULL)->get();
        return view('Tasks.totalAssign',compact('task'));
    }
    /**
     * Show the form for editing the specified User.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit_task=Task::findOrFail($id);
        return view('Tasks.edit',compact('edit_task'));
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
        'taskName' => 'required|string|max:100',
        'taskDescription' => 'required|min:10',
        'startDate' => 'required',
        'endDate' => 'required'
        ]);
         
        $data = $request->all();
        $date=date('Y-m-d H:i:s');
        DB::table('tasks')->where('id',$id)->update([
                'taskName' => $data['taskName'],
                'taskDescription' => $data['taskDescription'],
                'startDate' => $data['startDate'],
                'endDate' => $data['endDate'],
                'updated_at' => $date,
              ]);
        return redirect()->intended('assignedTask')->with('success','Task Updated Successfully!');
        //return redirect()->route('task.index')->with('message','Updated Success!');
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
        DB::table('tasks')->where('id',$id)->update([
            'deleted_at' => $date,
        ]);
        return redirect()->intended('assignedTask')->with('success','Task Deleted Successfully');
       // return redirect()->route('task.index')->with('message','Deleted Successfully!');
    }
}