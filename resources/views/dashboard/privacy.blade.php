
@include('dashboard.layout.header')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <h2 class="text-center display-4">Privacy & Term</h2>
            <form   method="POST" enctype="multipart/form-data" action="/admin/changePrivacy">
                @csrf
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>PDF:</label>
                                    <input type="file"  class="form-control form-control-lg"  name="file" />{{$privacy->file}}<span style="color:red;"> *</span>
                                </div>
                                <div class="col-3">
                                    <a type="button" class="btn btn-block btn-info btn-sm" href="/admin/downloadFile">Download File</a>
                                </div>
                            </div>
                            {{-- <div class="col-6">
                                <div class="form-group">
                                    <label>PDF:</label>
                                    <a type="button" class="btn btn-block btn-info btn-sm" href="/admin/downloadFile">Download </a>
                                </div>
                            </div> --}}
                        </div>
                        <div class="modal-footer ">
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
  </div>

  @include('dashboard.layout.footer')