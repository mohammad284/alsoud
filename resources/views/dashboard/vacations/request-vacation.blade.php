@include('dashboard.layout.header')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Pending vacations</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Pending vacations</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-hover text-nowrap">
                  <thead>
                  <tr>
                    <th>Eng</th>
                    <th>From Date</th>
                    <th>To Date</th>
                    <th>Type</th>
                    <th>alternative</th>
                    <th>note</th>
                    <th>image</th>
                    <th>option</th>
                    
                    {{-- <th>Options</th> --}}
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($requests as $request)
                        <tr>
                            <td>{{$request['eng_name']->name}}</td>
                            <td>{{ Carbon\Carbon::parse($request->from_date)->format('Y-m-d') }}</td>
                            <td>{{ Carbon\Carbon::parse($request->to_date)->format('Y-m-d') }}</td>
                            <td>{{$request['kind_of_leave']->name}} </td>
                            <td>{{$request['alternative']->name}}</td>
                            <td>{{$request->note}}</td>
                            <td><img style="height:50px;width:50px;" src="{{ asset($request->image) }}"  alt="Product Image"></td>
                            <td>
                                <a href="/admin/acceptVacation/{{$request->id}}" class="btn btn-block btn-info btn-sm" style="display: inline;width:40%;"  >accept</a>
                                <a href="#" data-toggle="modal" class="btn btn-block btn-danger btn-sm" style="display: inline;width:40%;"  data-target="#request-{{$request->id}}" >denied</a>
                            </td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
    @foreach($requests as $request)
    <div class="modal fade" id="request-{{$request->id}}">
        <div class="modal-dialog">
        <div class="modal-content bg-danger">
            <div class="modal-header">
            <h4 class="modal-title">Are you sure to rejecte?</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form class="forms-sample"  method="POST" enctype="multipart/form-data" action="/admin/rejecteVacation">
                @csrf
                    <div class="modal-body">
                        <div class="row mb-12">
                            <div class="col-md-12">
                                <label for="exampleInputNumber1" class="form-label">Please write the reason for rejected</label>
                                <input class="form-control mb-4 mb-md-0"  name="reason"  required/>
                                <input class="form-control mb-4 mb-md-0" type="hidden" value="{{$request->id}}" name="id"  required/>

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