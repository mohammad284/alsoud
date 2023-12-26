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
              <li class="breadcrumb-item active">Details</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-sm-6">
              <div class="col-12">
                <img src="{{ asset($certificate->trainee_image) }}" class="product-image" alt="Product Image">
              </div>
              <div class="col-12 product-image-thumbs">
                <div class="product-image-thumb active"><img src="{{ asset($certificate->trainee_image) }}" alt="Product Image"></div>
                <div class="product-image-thumb" ><img src="{{ asset($certificate->front_ID_image) }}" alt="Product Image"></div>
                <div class="product-image-thumb" ><img src="{{ asset($certificate->back_ID_image) }}" alt="Product Image"></div>
                <div class="product-image-thumb" ><img src="{{ asset($certificate->front_driving_image) }}" alt="Product Image"></div>
                <div class="product-image-thumb" ><img src="{{ asset($certificate->back_driving_image) }}" alt="Product Image"></div>
                <div class="product-image-thumb" ><img src="{{ asset($certificate->other_certificate) }}" alt="Product Image"></div>
                <div class="product-image-thumb" ><img src="{{ asset($certificate->experience_certificate) }}" alt="Product Image"></div>
              </div>
            </div>
            <div class="col-12 col-sm-6">
              <h3 class="my-3" style="color: #012e4d;font-weight: bold;">Details of the Trainee </h3>
              <hr>
              <p> <span style="font-weight: bold;color: #ff6600;"> Eng : </span> {{$certificate['eng']->name}}</p>
              <p> <span style="font-weight: bold;color: #ff6600;"> Name : </span> {{$certificate->trainee_name}}</p>
              <p> <span style="font-weight: bold;color: #ff6600;"> Degree : </span>  {{$certificate->degree}} @if($certificate->degree == 'success') <i class="fa fa-check" style="color:green;font-size:20px;margin-left:2px;"></i> @else<i class="fa fa-arrow-right" style="color:red;font-size:20px;margin-left:2px;"></i> @endif</p>
              <p> <span style="font-weight: bold;color: #ff6600;"> Trainee Phone : </span> {{$certificate->trainee_phone}}</p>
              <p> <span style="font-weight: bold;color: #ff6600;"> Company Name : </span> {{$certificate->company_name}}</p>
              <p> <span style="font-weight: bold;color: #ff6600;"> Trainee ID : </span> {{$certificate->trainee_ID}}</p>
              <p> <span style="font-weight: bold;color: #ff6600;"> From Date : </span> {{$certificate->from_date}}</p>
              <p> <span style="font-weight: bold;color: #ff6600;"> To Date : </span> {{$certificate->to_date}}</p>
              <p> <span style="font-weight: bold;color: #ff6600;"> Number Of Days : </span> {{$certificate->number_of_days}}</p>
              <p> <span style="font-weight: bold;color: #ff6600;"> Job Title : </span> {{$certificate['work']->type}}</p>
              <p> <span style="font-weight: bold;color: #ff6600;"> Certificate Code : </span> {{$certificate->certificate_code}}</p>

              
              <img src="{{ asset($certificate->QR_code) }}"  alt="Product Image">
            </div>
            <div class="mt-4">
                <a href="/admin/exportCertificate/{{$certificate->id}}" class="btn btn-primary btn-lg btn-flat">
                  <i class="fas fa-download"></i>
                  Print Certificate
                  </a>
              </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
@include('dashboard.layout.footer')