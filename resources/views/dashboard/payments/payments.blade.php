@include('dashboard.layout.header')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Payments</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Payments</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
      <div class="container-fluid">
        
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
                  Add Payments
                </button>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>Type</th>
                      <th>Added from</th>
                      <th>Created at</th>
                      <th>Updated at</th>
                      <th>Options</th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                  @foreach($payments as $payment)
                  <tr>
                      <td>{{$payment->type}}</td>
                      <td>{{$payment['admin']->name}}</td>
                      <td>{{$payment->created_at}}</td>
                      <td>{{$payment->updated_at}}</td>
                      <td><a href="" >
                        <a href="/admin/deletePayment/{{$payment->id}}"><i class="fa fa-trash text-danger" style="margin-right: 10px;"></i> </a>
                        <a href="#" data-toggle="modal" data-target="#payment-{{$payment->id}}" ><i class="fa fa-edit "></i> </a>
                      </td>
                    </tr>
                  @endforeach
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  {{-- add model --}}
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add Payments</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form class="forms-sample"  method="POST" enctype="multipart/form-data" action="/admin/addPayment">
            @csrf
                <div class="modal-body">
                    <div class="row mb-12">
                        <div class="col-md-12">
                            <label for="exampleInputNumber1" class="form-label">{{__('type')}}</label>
                            <input class="form-control mb-4 mb-md-0"  name="type"  required/>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
            
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    {{-- edit model  --}}

    @foreach($payments as $payment)
    <div class="modal fade" id="payment-{{$payment->id}}">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Payment</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form class="forms-sample"  method="POST" enctype="multipart/form-data" action="/admin/updatePayment">
            @csrf
                <div class="modal-body">
                    <div class="row mb-12">
                        <div class="col-md-12">
                            <label for="exampleInputNumber1" class="form-label">{{__('Type')}}</label>
                            <input class="form-control mb-4 mb-md-0"  value="{{$payment->type}}" name="type"  required/>
                            <input class="form-control mb-4 mb-md-0" type="hidden" value="{{$payment->id}}" name="id"  required/>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
            
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    @endforeach
@include('dashboard.layout.footer')
