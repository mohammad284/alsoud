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
                  <thead>
                  <tr>
                    <th>Eng</th>
                    <th>From Date</th>
                    <th>To Date</th>
                    <th>Num Of Day</th>
                    <th>Discount</th>
                    <th>Rebate Details</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($rebates as $rebate)
                        <tr>
                            <td>{{$rebate['eng']->name}}</td>
                            <td>{{ Carbon\Carbon::parse($rebate['vacation']->from_date)->format('Y-m-d') }}</td>
                            <td>{{ Carbon\Carbon::parse($rebate['vacation']->to_date)->format('Y-m-d') }}</td>
                            <td>{{$rebate->num_of_day}}</td>
                            <td>{{$rebate->discount}}</td>
                             <td>@if($rebate != null)num of day = {{$rebate->num_of_day}}<br>
                            discount = {{$rebate->discount}}<br>@endif
                            </td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
                {!! $rebates->links() !!}
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