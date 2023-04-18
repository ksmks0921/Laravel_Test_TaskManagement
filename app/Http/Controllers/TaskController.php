<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Projects;

class TaskController extends Controller
{
    public function index()
    {
        // $tasks = Task::orderBy('priority','ASC')->get();
        $projects = Projects::orderBy('id','ASC')->get();
        $selected_project = 1;
        $tasks = Task::orderBy('priority','ASC')->where('project_id',  '=',  $selected_project)->get();    
        return view('task.index',compact('tasks', 'projects', 'selected_project'));
    }
    public function create()
    {
        $projects = Projects::orderBy('id','ASC')->get();
        return view('task.create',compact('projects'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'priority' => 'required',
            'project_id' => 'required'             
        ]);
        Task::Create($request->all());
        return redirect()->route('tasks.index')->with('success','Task has been created successfully.');        
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success','Task has been deleted successfully');       

    }
    /**
     * Show edit task.
     */
    public function edit(Task $task)
    {               
        $projects = Projects::orderBy('id','ASC')->get();
        return view('task.edit', compact('task'),compact('projects'));    
    }
    /**
     * Save edit task.
     */    
     public function update(Request $request, Task $task)
    {
        $request->validate([
            'name' => 'required',
            'priority' => 'required',        
            'project_id' => 'required',       
        ]);
        
        $task->fill($request->post())->save();
        return redirect()->route('tasks.index')->with('success','Task Has Been updated successfully');
    }
     /**
     * Update after sort the tasks.
     */
    public function orderUpdate(Request $request)
    {
        $tasks = Task::all();
        foreach ($tasks as $task) {
            foreach ($request->order as $order) {
                if ($order['id'] == $task->id) {
                    $task->update(['priority' => $order['position']]);
                }
            }
        }        
        return response('Update Successfully.', 200);
    }
     /**
     * Update after sort the tasks.
     */
    public function projectDropDownData(Request $request)
    {
        $selected_project =  $request->selected_project;
        $tasks = Task::orderBy('priority','ASC')->where('project_id',  '=',  $selected_project)->get();       
        $projects = Projects::orderBy('id','ASC')->get();
        return view('task.index',compact('tasks', 'projects', 'selected_project'));    
    }    
}
