@include('dashboard.layout.header')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Vacations</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Vacations</li>
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
                    <th>Num Of Day</th>
                    <th>Rest</th>
                    {{-- <th>Options</th> --}}
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($vacations as $vacation)
                        <tr>
                            <td>{{$vacation['eng_name']->name}}</td>
                            <td>{{ Carbon\Carbon::parse($vacation->from_date)->format('Y-m-d') }}</td>
                            <td>{{ Carbon\Carbon::parse($vacation->to_date)->format('Y-m-d') }}</td>
                            <td>@if($vacation->type == 'worthy')<span class="badge bg-success">{{$vacation->type}}</span>
                            @elseif($vacation->type == 'beginning')<span class="badge bg-warning">{{$vacation->type}}</span>
                            @elseif($vacation->type == 'take')<span class="badge bg-danger">{{$vacation->type}}</span>
                            @endif
                            </td>
                            <td>{{$vacation->num_of_day}}</td>
                            <td>{{$vacation->rest}}</td>
                            {{-- <td>
                                <a href="/admin/detailsVacation/{{$vacation->id}}"><i class="fa fa-solid fa-eye" style="margin-right: 10px;"></i> </a>
                            </td> --}}
                        </tr>
                    @endforeach
                  </tbody>
                </table>
                {!! $vacations->links() !!}
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