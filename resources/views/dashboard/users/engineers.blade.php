@include('dashboard.layout.header')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Engineers</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Engineers</li>
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
                <a type="button" class="btn btn-primary" href="/admin/addEngineer">
                  Add Engineer
                </a>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>Salary</th>
                      <th>Job ID</th>
                      <th>His Works</th>
                      <th>option</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($engs as $eng)
                        <tr>
                        <td>{{$eng->name}}</td>
                        <td>{{$eng->email}}</td>
                        <td>{{$eng->phone}}</td>
                        <td>{{$eng->salary}}</td>
                        <td>{{$eng->job_id}}</td>
                        <td>
                        @foreach($eng['works'] as $work)
                          {{$work['work_name']->name}}<br>
                        @endforeach
                        </td>
                        <td><a href="" >
                            <a href="/admin/deleteUser/{{$eng->id}}"><i class="fa fa-trash text-danger"></i> </a>
                            <a href="/admin/EditEngineer/{{$eng->id}}"  ><i class="fa fa-edit "></i> </a>
                            <a type="button" class="btn btn-block btn-info btn-sm" style="display: inline;width:40%;" href="/admin/tasksEngineer/{{$eng->id}}">Tasks </a>
                            <a type="button" class="btn btn-block btn-info btn-sm" style="display: inline;width:40%;margin: 0;" href="/admin/vacRabEngineer/{{$eng->id}}">Vac/Reb </a>
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
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@include('dashboard.layout.footer')
