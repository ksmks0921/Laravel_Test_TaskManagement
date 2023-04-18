<!-- Extends template page -->
@extends('layout.app')
<!-- Specify content -->
@section('content')
<h3>Edit Task</h3>
<div class="row">
   <div class="col-md-12 col-sm-12 col-xs-12">

     <form action="{{ route('tasks.update',$task->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span></label>
          <div class="col-md-6 col-sm-6 col-xs-12">            
                <input id="name" class="form-control col-md-12 col-xs-12" name="name" placeholder="Enter task name" required="required" type="text" value="{{$task->name}}">           
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Priority</label>
          <div class="col-md-6 col-sm-6 col-xs-12">             
             <input id="priority" class="form-control col-md-12 col-xs-12" name="priority" required="required" type="number" value="{{$task->priority}}" readonly>          
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Project</label>
          <div class="col-md-6 col-sm-6 col-xs-12">                   
                <select class="form-control" name="project_id" disabled>
                    <option selected>Select project</option>
                    @foreach($projects as $project)
                        @if($project->id === $task->project_id)
                        <option selected value="{{$project->id}}">{{ $project->name }}</option>
                        @else
                        <option value="{{$project->id}}">{{ $project->name }}</option>
                        @endif                        
                    @endforeach                    
                </select>                          
          </div>
        </div>
        <div class="form-group">
           <div class="col-md-6">
              <input type="submit" name="submit" value='Submit' class='btn btn-success'>
           </div>
        </div>
     </form>
   </div>
</div>
@stop