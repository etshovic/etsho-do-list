<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Task;
class TaskController extends Controller
{
	public function show($id)
	{
		$task = Task::find($id);
		return view('task' , compact('task'));
	}
	public function index()
	{
		$tasks = Task::where( 'user_id' , auth()->user()->id )->where('is_completed' , '0')->get();
		$comp_tasks = Task::where('user_id' , auth()->user()->id )->where('is_completed' , '1')->get();
		return view('welcome' , compact('tasks' , 'comp_tasks'));
	}
	public function store(Request $request)
	{
		$input = $request->all();
		$task = new Task();
		$task->task = request('task');
		$task->user_id = auth()->user()->id;
		$task->save();
		return redirect()->back()->with('message' , 'Task has been ADDED');
	}
	public function complete($id)
	{
		$task = Task::find($id);
		$task->is_completed = 1 ;
		$task->save();
		return Redirect::back()->with('message' , 'Task has been ADDED to COMPLETE list');
	}
	public function incomplete($id)
	{
		$task = Task::find($id);
		$task->is_completed = 0 ;
		$task->save();
		return Redirect::back()->with('message' , 'Task has been ADDED to All Tasks list');
	}
	public function destroy($id)
	{
		$task = Task::find($id);
		$task->delete();
		return Redirect::back()->with('message' , 'Task has been DELETED Successfully');
	}
}
