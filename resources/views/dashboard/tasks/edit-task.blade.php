@include('dashboard.layout.header')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Task</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Task</li>
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
                <form   method="POST" enctype="multipart/form-data" action="/admin/updateTask/{{$task->id}}">
                @csrf
                    <div class="card-body">            
                        <div class="row">
                        {{-- client_name --}}
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                            <label>Client Name</label><span style="color:red;margin-left:3px;" >*</span>
                            <input type="text" name="client_name" class="form-control" value="{{$task->client_name}}" id="exampleInputEmail1" placeholder="Enter Phone" required/>
                            </div>
                        </div>
                        <!-- client_number -->
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                            <label>Contact No..</label><span style="color:red;margin-left:3px;" >*</span>
                            <input type="text" name="client_number" class="form-control" value="{{$task->client_number}}" id="exampleInputEmail1" placeholder="Enter Email" required/>
                            </div>
                        </div>
                        
                        {{-- client_name --}}
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                            <label>Focal Point</label><span style="color:red;margin-left:3px;" >*</span>
                            <input type="text" name="focal_point" class="form-control" value="{{$task->focal_point}}" placeholder="Enter Name" required/>
                            </div>
                        </div>
                        {{-- client_location --}}
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                            <label>Client Location</label><span style="color:red;margin-left:3px;" >*</span>
                            <input type="text" name="client_location" class="form-control" value="{{$task->client_location}}" id="exampleInputEmail1" placeholder="Enter Job ID" required/>
                            </div>
                        </div>
                        {{-- client_ID --}}
                        {{-- <div class="col-12 col-sm-6">
                            <div class="form-group">
                            <label>Client ID</label><span style="color:red;margin-left:3px;" >*</span>
                            <input type="text" name="client_ID" class="form-control" value="{{$task->client_ID}}" id="exampleInputEmail1" placeholder="Enter Job ID" required/>
                            </div>
                        </div> --}}
                        {{-- eng_id --}}
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                            <label>Engineer Name</label><span style="color:red;margin-left:3px;" >*</span>
                            <div class="select2-purple">
                                <select class="select2" name="eng_id" data-placeholder="Select a State" data-dropdown-css-class="select2-purple" style="width: 100%;" required>
                                    <option value="{{$task['eng_name']->id}}" disabled>{{$task['eng_name']->name}}</option>
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
                                    <option value="{{$task['work_name']->id}}" disabled>{{$task['work_name']->type}}</option>
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
                                    <option value="{{$task['machine_name']->id}}" disabled>{{$task['machine_name']->name}}</option>
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
                                    <option value="{{$task['payment_method']->id}}" disabled>{{$task['payment_method']->type}}</option>
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
                                    <option value="{{$task->charge_base}}" disabled>{{$task->charge_base}}</option>
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
                            <input type="date" name="date" value="{{$task->date}}" class="form-control" id="exampleInputEmail1" placeholder="Enter Phone" required/>
                            </div>
                        </div>
                        {{-- task_ID --}}
                        {{-- <div class="col-12 col-sm-6">
                            <div class="form-group">
                            <label>Task ID</label><span style="color:red;margin-left:3px;" >*</span>
                            <input type="text" name="task_ID" value="{{$task->task_ID}}" class="form-control" id="exampleInputEmail1" placeholder="Enter Phone" required/>
                            </div>
                        </div> --}}
                        {{-- num_of_trainees --}}
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                            <label>Number Of Trainees</label><span style="color:red;margin-left:3px;" >*</span>
                            <input type="number" name="num_of_trainees" value="{{$task->num_of_trainees}}" class="form-control" id="exampleInputEmail1" placeholder="Enter Phone" required/>
                            </div>
                        </div>
                        {{-- price --}}
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                            <label>price</label><span style="color:red;margin-left:3px;" >*</span>
                            <input type="text" name="price" class="form-control" value="{{$task->price}}" id="exampleInputEmail1" placeholder="Enter Phone" required/>
                            </div>
                        </div>
                        {{-- note --}}
                        <div class="col-12 col-sm-12">
                            <div class="form-group">
                                <label>Note</label>
                                <textarea class="form-control" name="note" rows="1" placeholder="">{{$task->note}}</textarea>
                            </div>
                        </div>
                        {{-- LPO  --}}
                        <div class="col-12 col-sm-1">
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" name="LPO" value="1" type="checkbox" @if($task->LPO == 1) checked @endif>
                                    <label class="form-check-label">LPO</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-2">
                            <div class="form-group">
                            <input type="text" name="LPO_num" class="form-control" value="{{$task->LPO_num}}" id="exampleInputEmail1" />
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
                                    <input class="form-check-input" name="Quote" value="1" @if($task->Quote == 1) checked @endif type="checkbox" >
                                    <label class="form-check-label">Quote</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-2">
                            <div class="form-group">
                            <input type="text" name="Quote_num" class="form-control" value="{{$task->Quote_num}}" id="exampleInputEmail1" />
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
                                    <input class="form-check-input" name="walk_in_costomer" value="1" type="checkbox" @if($task->walk_in_costomer == 1) checked @endif>
                                    <label class="form-check-label">Walk In Coustomer</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-2">
                            <div class="form-group">
                            <input type="text" name="walk_in_costomer_num" value="{{$task->walk_in_costomer_num}}" class="form-control" id="exampleInputEmail1" />
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

@include('dashboard.layout.footer')
