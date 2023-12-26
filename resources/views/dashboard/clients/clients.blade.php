@include('dashboard.layout.header')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Clients</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Clients</li>
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
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>client_name</th>
                      <th>client_number</th>
                      <th>focal_point</th>
                      <th>task_id</th>
                      <th>Created at</th>
                      <th>Options</th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                  @foreach($clients as $client)
                  <tr>
                      <td>{{$client->client_name}}</td>
                      <td>{{$client->client_number}}</td>
                      <td>{{$client->focal_point}}</td>
                      <td>{{$client['tasks']->task_ID}}</td>
                      <td>{{$client->created_at}}</td>
                      <td>
                        <a href="/admin/deleteClient/{{$client->id}}"><i class="fa fa-trash text-danger" style="margin-right: 10px;"></i> </a>
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
@include('dashboard.layout.footer')
