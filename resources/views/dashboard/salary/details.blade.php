@include('dashboard.layout.header')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Details</h1> 
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">ٌRebates</li>
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
                    <th>discount</th>
                    <th>num_of_day</th>
                    <th>kind_of_leave</th>
                    <th>created_at</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($details as $det)
                        <tr>
                            <td>{{$det->discount}}</td>
                            <td>{{$det['vacation']->num_of_day}}</td>
                            <td>{{$det['vacation']['kind_of_leave']->name}}</td>
                            <td >{{($det->created_at)->format('Y-M-d')}}</td>
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
  @include('dashboard.layout.footer')