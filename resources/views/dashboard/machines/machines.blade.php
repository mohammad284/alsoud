@include('dashboard.layout.header')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Scope of Work</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Scope of Work</li>
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
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
                  Add Scope
                </button>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Added from</th>
                      <th>Created at</th>
                      <th>Updated at</th>
                      <th>Options</th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                  @foreach($machines as $machine)
                  <tr>
                      <td>{{$machine->name}}</td>
                      <td>{{$machine['admin']->name}}</td>
                      <td>{{$machine->created_at}}</td>
                      <td>{{$machine->updated_at}}</td>
                      <td><a href="" >
                        <a href="/admin/deleteMachine/{{$machine->id}}"><i class="fa fa-trash text-danger"></i> </a>
                        <a href="#" data-toggle="modal" data-target="#machine-{{$machine->id}}" ><i class="fa fa-edit "></i> </a>
                      </td>
                    </tr>
                  @endforeach
                </table>
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


  {{-- add model --}}
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add Scope</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form class="forms-sample"  method="POST" enctype="multipart/form-data" action="/admin/addMachines">
            @csrf
                <div class="modal-body">
                    <div class="row mb-12">
                        <div class="col-md-12">
                            <label for="exampleInputNumber1" class="form-label">{{__('Name')}}</label>
                            <input class="form-control mb-4 mb-md-0"  name="name"  required/>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
            
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    {{-- edit model  --}}

    @foreach($machines as $machine)
    <div class="modal fade" id="machine-{{$machine->id}}">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Scope</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form class="forms-sample"  method="POST" enctype="multipart/form-data" action="/admin/updateMachine">
            @csrf
                <div class="modal-body">
                    <div class="row mb-12">
                        <div class="col-md-12">
                            <label for="exampleInputNumber1" class="form-label">{{__('Name')}}</label>
                            <input class="form-control mb-4 mb-md-0"  value="{{$machine->name}}" name="name"  required/>
                            <input class="form-control mb-4 mb-md-0" type="hidden" value="{{$machine->id}}" name="id"  required/>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
            
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    @endforeach
@include('dashboard.layout.footer')
