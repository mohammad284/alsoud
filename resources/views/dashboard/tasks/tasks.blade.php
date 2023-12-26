@include('dashboard.layout.header')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tasks</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Tasks</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
      <div class="container-fluid">
        
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <a type="button" class="btn btn-primary" href="/admin/addTask">
                  Add Task
                </a>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>Client Name.</th>
                      <th>Contact No.</th>
                      <th>Task Location.</th>
                      <th>Assigned Trainer.</th>
                      <th>Job.</th>
                      <th>Task Type \ Name.</th>
                      <th>created at.</th>
                      <th>option</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($tasks as $task)
                        <tr>
                        <td>{{$task->client_name}}</td>
                        <td>{{$task->client_number}}</td>
                        <td>{{$task->client_location}}</td>
                        <td>{{$task['eng_name']->name}}</td>
                        <td>{{$task['work_name']->type}}</td>
                        <td>{{$task['machine_name']->name}}</td>
                        <td>{{$task->created_at}}</td>
                        <td>
                            <a title="edit" href="/admin/editTask/{{$task->id}}" style="margin:7px;" ><i class="fa fa-edit "></i> </a>
                            <a title="more details" href="/admin/detailsTask/{{$task->id}}"><i class="fa fa-solid fa-eye"></i> </a>
                            <a title="certificate" href="/admin/certificateTask/{{$task->id}}"><i class=" nav-icon fas fa-certificate"></i></a>
                            <a href="#" data-toggle="modal" style="margin:7px;" data-target="#task-{{$task->id}}" ><i class="fa fa-trash text-danger"></i> </a>
                            
                        </td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
                {!! $tasks->links() !!}
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  {{--  --}}
  @foreach($tasks as $task)
  <div class="modal fade" id="task-{{$task->id}}">
    <div class="modal-dialog">
      <div class="modal-content bg-danger">
        <div class="modal-header">
          <h4 class="modal-title">Are you sure to delete?</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form class="forms-sample"  method="POST" enctype="multipart/form-data" action="/admin/deleteTask">
            @csrf
                <div class="modal-body">
                    <div class="row mb-12">
                        <div class="col-md-12">
                            <label for="exampleInputNumber1" class="form-label">Please write the reason for deletion</label>
                            <input class="form-control mb-4 mb-md-0"  name="reason"  required/>
                            <input class="form-control mb-4 mb-md-0" type="hidden" value="{{$task->id}}" name="id"  required/>

                        </div>
                    </div>
                </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-outline-light">Save changes</button>
          </div>
          </form>

      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
  @endforeach
@include('dashboard.layout.footer')
