@include('dashboard.layout.header')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Charge Per</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Charge Per</li>
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
                  Add Charge Per
                </button>
                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
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
                  @foreach($charges as $charge)
                  <tr>
                      <td>{{$charge->name}}</td>
                      <td>{{$charge['admin']->name}}</td>
                      <td>{{$charge->created_at}}</td>
                      <td>{{$charge->updated_at}}</td>
                      <td>
                        <a href="/admin/deleteCharge/{{$charge->id}}"><i class="fa fa-trash text-danger" style="margin-right: 10px;"></i> </a>
                        <a href="#" data-toggle="modal" data-target="#charge-{{$charge->id}}" ><i class="fa fa-edit "></i> </a>
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
              <h4 class="modal-title">Add Charge</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form class="forms-sample"  method="POST" enctype="multipart/form-data" action="/admin/addCharge">
            @csrf
                <div class="modal-body">
                    <div class="row mb-12">
                        <div class="col-md-12">
                            <label for="exampleInputNumber1" class="form-label">{{__('name')}}</label>
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

    @foreach($charges as $charge)
    <div class="modal fade" id="charge-{{$charge->id}}">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Charge</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form class="forms-sample"  method="POST" enctype="multipart/form-data" action="/admin/updateCharge">
            @csrf
                <div class="modal-body">
                    <div class="row mb-12">
                        <div class="col-md-12">
                            <label for="exampleInputNumber1" class="form-label">{{__('name')}}</label>
                            <input class="form-control mb-4 mb-md-0"  value="{{$charge->name}}" name="name"  required/>
                            <input class="form-control mb-4 mb-md-0" type="hidden" value="{{$charge->id}}" name="id"  required/>
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
