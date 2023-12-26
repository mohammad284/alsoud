@include('dashboard.layout.header')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Denied vacations</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Denied vacations</li>
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
                    <th>Alternative</th>
                    <th>Reason</th>
                    
                    {{-- <th>Options</th> --}}
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($rejects as $reject)
                        <tr>
                            <td>{{$reject['eng_name']->name}}</td>
                            <td>{{ Carbon\Carbon::parse($reject->from_date)->format('Y-m-d') }}</td>
                            <td>{{ Carbon\Carbon::parse($reject->to_date)->format('Y-m-d') }}</td>
                            <td>{{$reject['kind_of_leave']->name}} </td>
                            <td>{{$reject['alternative']->name}}</td>
                            <td>{{$reject->reason}}</td>
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