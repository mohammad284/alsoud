@include('dashboard.layout.header')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Add Task</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Task</li>
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
                <form   method="POST" enctype="multipart/form-data" action="/admin/saveTask">
                @csrf
                    <div class="card-body">            
                        <div class="row">
                        {{-- client name --}}
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                            <label>Client Name</label><span style="color:red;margin-left:3px;" >*</span>
                            <input type="text" id="search-input"  name="client_name" class="form-control" id="exampleInputEmail1" placeholder="Enter Client Name" required/>
                            <select id="search-results" class="select2" name="client_id"  data-dropdown-css-class="select2-purple" style="width: 100%;">
                            </select>
                            </div>
                        </div>
                        <!-- Contact No -->
                        <div class="col-12 col-sm-6"  >
                            <div class="form-group">
                            <label>Contact No.</label><span style="color:red;margin-left:3px;" >*</span>
                            <input type="text" id="client-number"  name="client_number" class="form-control" id="exampleInputEmail1" placeholder="Enter Contact No" required/>
                            </div>
                        </div>
                        
                        {{-- Focal Point --}}
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                            <label>Focal Point</label><span style="color:red;margin-left:3px;" >*</span>
                            <input type="text" id="focal-point" name="focal_point" class="form-control"  placeholder="Enter Focal Point" required/>
                            </div>
                        </div>
                        {{-- client_location --}}
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                            <label>Client Location</label><span style="color:red;margin-left:3px;" >*</span>
                            <input type="text" name="client_location" class="form-control" id="exampleInputEmail1" placeholder="Enter Client Location" required/>
                            </div>
                        </div>
                        {{-- eng_id --}}
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                            <label>Engineer Name</label><span style="color:red;margin-left:3px;" >*</span>
                            <div class="select2-purple">
                                <select class="select2" name="eng_id" data-placeholder="Select a State" data-dropdown-css-class="select2-purple" style="width: 100%;" required>
                                    @foreach($engs as $eng)
                                        <option value="{{$eng->id}}">{{$eng->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        </div>
                        {{-- work_id --}}
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                            <label>Work Type</label><span style="color:red;margin-left:3px;" >*</span>
                            <div class="select2-purple">
                                <select class="select2" name="work_id" data-placeholder="Select a State" data-dropdown-css-class="select2-purple" style="width: 100%;" required>
                                    @foreach($works as $work)
                                        <option value="{{$work->id}}">{{$work->type}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        </div>
                        {{-- machine_id --}}
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                            <label>Machine Type</label><span style="color:red;margin-left:3px;" >*</span>
                            <div class="select2-purple">
                                <select class="select2" name="machine_id" data-placeholder="Select a State" data-dropdown-css-class="select2-purple" style="width: 100%;" required>
                                    @foreach($machines as $machine)
                                        <option value="{{$machine->id}}">{{$machine->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        </div>
                        {{-- payment_id --}}
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                            <label>Payment Method</label><span style="color:red;margin-left:3px;" >*</span>
                            <div class="select2-purple">
                                <select class="select2" name="payment_id" data-placeholder="Select a State" data-dropdown-css-class="select2-purple" style="width: 100%;" required>
                                    @foreach($payments as $payment)
                                        <option value="{{$payment->id}}">{{$payment->type}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        </div>
                        {{-- charge base --}}
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                            <label>Charge per : </label><span style="color:red;margin-left:3px;" >*</span>
                            <div class="select2-purple">
                                <select class="select2" name="charge_base" data-placeholder="Select a State" data-dropdown-css-class="select2-purple" style="width: 100%;" required>
                                    @foreach($charges as $charge)
                                        <option value="{{$charge->id}}">{{$charge->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        </div>
                        {{-- date --}}
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                            <label>Date</label><span style="color:red;margin-left:3px;" >*</span>
                            <input type="date" name="date" class="form-control" id="exampleInputEmail1" placeholder="Enter Date" required/>
                            </div>
                        </div>
                        {{-- num_of_trainees --}}
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                            <label>Number Of Trainees</label><span style="color:red;margin-left:3px;" >*</span>
                            <input type="number" name="num_of_trainees" class="form-control" id="exampleInputEmail1" placeholder="Enter Number Of Trainees" required/>
                            </div>
                        </div>
                        {{-- price --}}
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                            <label>price</label><span style="color:red;margin-left:3px;" >*</span>
                            <input type="text" name="price" class="form-control" id="exampleInputEmail1" placeholder="Enter price" required/>
                            </div>
                        </div>
                        {{-- note --}}
                        <div class="col-12 col-sm-12">
                            <div class="form-group">
                                <label>Note</label>
                                <textarea class="form-control" name="note" rows="1" placeholder="Enter Note"></textarea>
                            </div>
                        </div>
                        {{-- LPO  --}}
                        <div class="col-12 col-sm-1">
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" name="LPO" value="1" type="checkbox">
                                    <label class="form-check-label">LPO</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-2">
                            <div class="form-group">
                            <input type="text" name="LPO_num" class="form-control" id="exampleInputEmail1"  />
                            </div>
                        </div>
                        <div class="col-12 col-sm-1">
                            <div class="form-group">
                            </div>
                        </div>
                        {{--  Quote --}}
                        <div class="col-12 col-sm-1">
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" name="Quote" value="1" type="checkbox" >
                                    <label class="form-check-label">Quote</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-2">
                            <div class="form-group">
                            <input type="text" name="Quote_num" class="form-control" id="exampleInputEmail1"  />
                            </div>
                        </div>
                        <div class="col-12 col-sm-1">
                            <div class="form-group">
                            </div>
                        </div>
                        {{--  Walk In Coustomer --}}
                        <div class="col-12 col-sm-2">
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" name="walk_in_costomer" value="1" type="checkbox" >
                                    <label class="form-check-label">Walk In Coustomer</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-2">
                            <div class="form-group">
                            <input type="text" name="walk_in_costomer_num" class="form-control" id="exampleInputEmail1" />
                            </div>
                        </div>
                        </div>
                        <!-- /.row -->
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
  {{-- search Clients --}}
<script>
        $(document).ready(function () {
            $('#search-input').on('keyup', function () {
                var query = $(this).val();

                if (query.trim().length === 0) {
                    $('#search-results').empty();
                    $('#customer-details').empty();
                    return;
                }

                $.ajax({
                    url: '/admin/searchClient',
                    type: 'GET',
                    data: { query: query },
                    success: function (response) {
                        var results = $('#search-results');
                        results.empty();

                        if (response.length > 0) {
                            results.append('<option value="">Chose from previous clients</option>');
                            $.each(response, function (index, customer) {
                                results.append('<option value="' + customer.id + '">' + customer.client_name + ' - ' + customer.client_number + '</option>');
                            });
                        } else {
                            results.append('<option value="">No results found.</option>');
                        }
                    },
                    error: function (error) {
                        console.log(error);
                    }
                });
            });

            $('#search-results').on('change', function () {
                var selectedCustomerId = $(this).val();

                 if (selectedCustomerId) {
                    $.ajax({
                        url: '/admin/client/' + selectedCustomerId,
                        type: 'GET',
                        success: function (response) {
                            $('#search-input').val(response.client_name);
                            $('#client-number').val(response.client_number);
                            $('#focal-point').val(response.focal_point);
                        },
                        error: function (error) {
                            console.log(error);
                        }
                    });
                } else {
                    $('#customer-name').val('');
                }
            });
        });
    </script>
@include('dashboard.layout.footer')
