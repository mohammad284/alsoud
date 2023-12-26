@include('dashboard.layout.header')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Rebates</h1> 
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
                  <table class="table table-hover text-nowrap">
                  <thead>
                  <tr>
                    <th>From Date</th>
                    <th>To Date</th>
                    <th>Num Of Day</th>
                    <th>rest</th>
                    <th>Rebate Details</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($vacations as $vacation)
                        <tr>
                            <td>{{ Carbon\Carbon::parse($vacation->from_date)->format('Y-m-d') }}</td>
                            <td>{{ Carbon\Carbon::parse($vacation->to_date)->format('Y-m-d') }}</td>
                            <td>{{$vacation->num_of_day}}</td>
                            <td>{{$vacation->rest}}</td>
                            <td>@if($vacation['rebate'] != null)num of day = {{$vacation['rebate']->num_of_day}}<br>
                            discount = {{$vacation['rebate']->discount}}<br>@endif
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
  @include('dashboard.layout.footer')