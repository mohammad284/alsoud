@include('dashboard.layout.header')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Salary</h1> 
            <div class="form-group">
              <form class="forms-sample"  method="POST" enctype="multipart/form-data" action="/admin/goToDateForSalary">
                @csrf
                  <div class="input-group date" id="reservationdate" data-target-input="nearest">
                      <input type="text" name="date" class="form-control datetimepicker-input" data-target="#reservationdate" required>
                      <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                      </div>
                    <button type="submit" style="margin-left:30px;" class="btn btn-primary">Go To Date</button>
                  </div>
              </form>
            </div>
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
                    <th>Date</th>
                    <th>Salary</th>
                    <th>net</th>
                    <th>worthly</th>
                    <th>option</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($salaries as $salary)
                        <tr>
                            <td>{{$salary['eng_name']->name}}</td>
                            <td>{{($salary->created_at)->format('Y-M') }}</td>
                            <td>{{$salary['eng_name']->salary}}</td>
                            <td>{{$salary->net}}</td>
                            <td >@if(($salary->created_at)->format('m') == now()->month) <span class="badge bg-danger">notworthly</span> @else <span class="badge bg-success">Worthly</span> @endif</td>
                            <td>
                                <a href="/admin/salaryDetails/{{$salary->id}}"  ><i class="fa fa-solid fa-eye"></i> </a>
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