<!DOCTYPE html>
<html>
<head>
    <title>Create Drag and Droppable Datatables</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>    
</head>
<body>
    <div class="row mt-5">      
        <div class="col-md-10 offset-md-1">
            <h3 class="text-center mb-4">Drag and Drop Datatables</h3>
            </br>
            <div class="row mt-5">
              <div class="col-md-4">
                  <button class="btn btn-success btn-sm"><a href="{{ route('tasks.create') }}">Create New Task</a></button>    
              </div>
              <div class="col-md-6">
                <form name="_token" action="{{ route('tasks.projectsDropDown') }}" id="project-dropdown" method="post" value="<?php echo csrf_token(); ?>">
                  {!! csrf_field() !!}
                  <input type="hidden" value="{{$selected_project}}" id="selected_project" name= "selected_project">
                  <select id="project" class="form-control">                        
                      @foreach ($projects as $project)
                          @if($project->id == $selected_project)
                          <option selected value="{{$project->id}}">{{ $project->name }}</option>
                          @else
                          <option value="{{$project->id}}">{{ $project->name }}</option>
                          @endif            
                      @endforeach
                  </select>
                </form>
                <script>                                  
                  $("#project").on('change', function(e){                                          
                    $variable = e.target.value;
                    $("#selected_project").val($variable);
                    $('#project-dropdown').submit();                                     
                  });                                  
                </script>
              </div>
            </div>             
            </br>
            </br>
            <table id="table" class="table table-bordered">
              <thead>
                <tr>
                  <th width="30px">#</th>
                  <th>name</th>                  
                  <th>Created At</th>
                  <th width="280px">Action</th>
                </tr>
              </thead>
              <tbody id="tablecontents">
                @foreach($tasks as $task)
    	            <tr class="row1" data-id="{{ $task->id }}">
    	              <td class="pl-3"><i class="fa fa-sort"></i></td>
    	              <td>{{ $task->name }}</td>
    	              <td>{{ date('d-m-Y h:m:s',strtotime($task->created_at)) }}</td>                    
                    <td>
                      <form action="{{ route('tasks.destroy',$task->id) }}" method="Post">
                        <a class="btn btn-primary" href="{{ route('tasks.edit',$task->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                      </form>
                    </td>
    	            </tr>
                @endforeach
              </tbody>                  
            </table>
            <hr>
            <h5>Drag and Drop the table rows and <button class="btn btn-success btn-sm" onclick="window.location.reload()">REFRESH</button> the page to check the Demo.</h5> 
    	</div>
    </div>   
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.js"></script>
    <script type="text/javascript">
      $(function () {
        $("#table").DataTable();

        $("#tablecontents").sortable({
          items: "tr",
          cursor: 'move',
          opacity: 0.6,
          update: function() {
              sendOrderToServer();
          }
        });
        function sendOrderToServer() {
          var order = [];
          var token = $('meta[name="csrf-token"]').attr('content');
          $('tr.row1').each(function(index,element) {
            order.push({
              id: $(this).attr('data-id'),
              position: index+1
            });
          });

          $.ajax({
            type: "POST", 
            dataType: "json", 
            url: "{{ url('task-sortable') }}",
                data: {
              order: order,
              _token: token
            },
            success: function(response) {
                if (response.status == "success") {
                  console.log(response);
                } else {
                  console.log(response);
                }
            }
          });
        }
      });
    </script>
</body>
</html>