@include('dashboard.layout.header')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Setting</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Setting</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
        <div class="container-fluid">
            <!-- SELECT2 EXAMPLE -->
            <div class="card card-default">
                <form   method="POST" enctype="multipart/form-data" action="/admin/change_setting">
                @csrf
                    <div class="card-body">            
                        <div class="row">
                        {{-- num_of_trainees --}}
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                            <label>Title</label><span style="color:red;margin-left:3px;" >*</span>
                            <input type="text" name="title" value="{{$setting->title}}" class="form-control" id="exampleInputEmail1"  required/>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                            <label>logo</label><span style="color:red;margin-left:3px;" >*</span>
                            <input type="file" name="logo" value="{{ asset($setting->logo) }}" class="form-control" id="exampleInputEmail1" />
                            </div>
                        </div>
                        <div class="col-sm-4">
                          <img class="img-fluid" src="{{ asset($setting->logo) }}" alt="Photo">
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
            <!-- /.card -->
        </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@include('dashboard.layout.footer')
