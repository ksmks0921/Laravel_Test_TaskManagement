<!-- Extends template page -->
@extends('layout.app')
<!-- Specify content -->
@section('content')
<h3>Add Task</h3>
<div class="row">
   <div class="col-md-12 col-sm-12 col-xs-12">
     <form action="{{ route('tasks.store') }}" method="post" >
        {{csrf_field()}}
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span></label>
          <div class="col-md-6 col-sm-6 col-xs-12">
             <input id="name" class="form-control col-md-12 col-xs-12" name="name" placeholder="Enter task name" required="required" type="text">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Priority</label>
          <div class="col-md-6 col-sm-6 col-xs-12">             
             <input id="priority" class="form-control col-md-12 col-xs-12" name="priority" required="required" type="number">          
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Project</label>
          <div class="col-md-6 col-sm-6 col-xs-12">                     
                <select class="form-control" name="project_id">
                    <small class="form-text text-muted">Please select project</small>
                    @foreach($projects as $project)
                    <option value="{{$project->id}}">{{ $project->name }}</option>
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