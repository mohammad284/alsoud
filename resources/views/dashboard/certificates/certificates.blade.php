@include('dashboard.layout.header')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Certificates</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Certificates</li>
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
              <div class="card-header">
                <h3 class="card-title">Certificates</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Eng</th>
                    <th>Name</th>
                    <th>Company Name</th>
                    <th>Certificate Code</th>
                    <th>QR Code</th>
                    <th>From</th>
                    <th>To</th>
                    <th>Options</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($certificates as $certificate)
                        <tr>
                            <td>{{$certificate['eng']->name}}</td>
                            <td>{{$certificate->trainee_name}}</td>
                            <td>{{$certificate->company_name}}</td>
                            <td>{{$certificate->certificate_code}}</td>
                            <td><img style="height:50px;width:50px;" src="{{ asset($certificate->QR_code) }}"  alt="Product Image"></td>
                            <td>{{$certificate->from_date}}</td>
                            <td>{{$certificate->to_date}}</td>
                            <td>
                                <a href="/admin/deleteCertificate/{{$certificate->id}}"><i class="fa fa-trash text-danger" style="margin-right: 10px;"></i> </a>
                                <a href="/admin/detailsCertificate/{{$certificate->id}}"><i class="fa fa-solid fa-eye" style="margin-right: 10px;"></i> </a>
                                <a href="/admin/editCertificate/{{$certificate}}"><i class="fa fa-edit "></i> </a>
                            </td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
                {!! $certificates->links() !!}
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