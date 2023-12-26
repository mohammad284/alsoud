@include('dashboard.layout.header')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Engineer</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Engineer</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
        <div class="container-fluid">
            <!-- SELECT2 EXAMPLE -->
            <div class="card card-default">
                <form   method="POST" enctype="multipart/form-data" action="/admin/updateEngineer/{{$eng->id}}">
                @csrf
                    <div class="card-body">            
                        <div class="row">
                            {{-- name --}}
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="{{$eng->name}}" placeholder="Enter Name" required/>
                            </div>
                            <!-- /.form-group -->
                        </div>
                        <!-- email -->
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" value="{{$eng->email}}" id="exampleInputEmail1" placeholder="Enter Email" required/>
                            </div>
                            <!-- /.form-group -->
                        </div>
                        {{-- phone --}}
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                            <label>Phone</label>
                            <input type="number" name="phone" class="form-control" value="{{$eng->phone}}" id="exampleInputEmail1" placeholder="Enter Phone" required/>
                            </div>
                            <!-- /.form-group -->
                        </div>
                        {{-- job ID --}}
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                            <label>Job ID</label>
                            <input type="text" name="job_id" class="form-control" value="{{$eng->job_id}}" id="exampleInputEmail1" placeholder="Enter Job ID" required/>
                            </div>
                            <!-- /.form-group -->
                        </div>
                        {{-- Salary --}}
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                            <label>Salary</label>
                            <input type="text" name="salary" class="form-control" value="{{$eng->salary}}" id="exampleInputEmail1" placeholder="Enter Salary" required/>
                            </div>
                            <!-- /.form-group -->
                        </div>
                        {{-- machines --}}
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                            <label>machines</label>
                            <div class="select2-purple">
                                <select class="select2" multiple="multiple" name="works[]" data-placeholder="Select a State" data-dropdown-css-class="select2-purple" style="width: 100%;" required>
                                @foreach($machines as $machine)
                                    <option value="{{$machine->id}}" @foreach($eng['works'] as $eng_machine)  @if($eng_machine->work_id == $machine->id) selected @endif @endforeach>{{$machine->name}}</option>
                                @endforeach
                                </select>
                            </div>
                            </div>
                            <!-- /.form-group -->
                        </div>
                        
                        </div>
                        <!-- /.row -->
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
            <!-- /.card -->
        </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@include('dashboard.layout.footer')
