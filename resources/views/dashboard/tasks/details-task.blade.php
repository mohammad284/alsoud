@include('dashboard.layout.header')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Details Task</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Details Task</li>
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
                        {{-- Focal Point --}}
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                            <label>Focal Point</label>
                            <input type="text" name="focal_point" placeholder="{{$task->focal_point}}" class="form-control"   disabled/>
                            </div>
                        </div>
                        <!-- Contact No -->
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                            <label>Contact No.</label>
                            <input type="text" name="client_number" placeholder="{{$task->client_number}}" class="form-control" id="exampleInputEmail1"  disabled/>
                            </div>
                        </div>
                        {{-- client name --}}
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                            <label>Client Name</label>
                            <input type="text" name="client_name" placeholder="{{$task->client_name}}"  class="form-control" id="exampleInputEmail1"  disabled/>
                            </div>
                        </div>
                        {{-- client_location --}}
                        @if($task['updateTask'] != null)
                        <div class="col-12 col-sm-3">
                            <div class="form-group">
                            <label>Client Location</label>
                            <input type="text" name="client_location" placeholder="{{$task['updateTask']->client_location}}" class="form-control" id="exampleInputEmail1"  disabled/>
                            </div>
                        </div>
                        <div class="col-12 col-sm-3">
                            <div class="form-group">
                            <label style="color:red;">Update Location</label>
                            <input type="text" name="client_location" placeholder="{{$task->client_location}}" class="form-control" id="exampleInputEmail1"  disabled/>
                            </div>
                        </div>
                        @else
                         <div class="col-12 col-sm-6">
                            <div class="form-group">
                            <label>Client Location</label>
                            <input type="text" name="client_location" placeholder="{{$task->client_location}}" class="form-control" id="exampleInputEmail1"  disabled/>
                            </div>
                        </div>
                        @endif
                        {{-- client_ID --}}
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                            <label>Client ID</label>
                            <input type="text" name="client_ID" placeholder="ASTI-{{$task->client_ID}}" class="form-control" id="exampleInputEmail1" disabled/>
                            </div>
                        </div>
                        {{-- eng_id --}}
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                            <label>Engineer Name</label>
                            <input type="text" name="client_ID" placeholder="{{$task['eng_name']->name}}" class="form-control" id="exampleInputEmail1"  disabled/>
                            </div>
                        </div>
                        {{-- work_id --}}
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                            <label>Work Type</label>
                            <input type="text" name="client_ID" placeholder="{{$task['work_name']->type}}" class="form-control" id="exampleInputEmail1"  disabled/>
                            </div>
                        </div>
                        {{-- machine_id --}}
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                            <label>Machine Type</label>
                            <input type="text" name="client_ID" placeholder="{{$task['machine_name']->name}}" class="form-control" id="exampleInputEmail1"  disabled/>
                            </div>
                        </div>
                        {{-- payment_id --}}
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                            <label>Machine Type</label>
                            <input type="text" name="client_ID" placeholder="{{$task['payment_method']->type}}" class="form-control" id="exampleInputEmail1"  disabled/>
                            </div>
                        </div>
                        {{-- charge base --}}
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                            <label>Charge per :</label>
                            <input type="text" name="client_ID" placeholder="{{$task['charge_per']->name}}" class="form-control" id="exampleInputEmail1"  disabled/>
                            </div>
                        </div>
                        {{-- date --}}
                        @if($task['updateTask'] != null)
                        <div class="col-12 col-sm-3">
                            <div class="form-group">
                            <label>Date</label>
                            <input name="date" placeholder="{{$task->date}}"  class="form-control" id="exampleInputEmail1"  disabled/>
                            </div>
                        </div>
                        <div class="col-12 col-sm-3">
                            <div class="form-group">
                            <label style="color:red;">Date</label>
                            <input name="date" placeholder="{{$task['updateTask']->date}}"  class="form-control" id="exampleInputEmail1"  disabled/>
                            </div>
                        </div>
                        @else
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                            <label>Date</label>
                            <input name="date" placeholder="{{$task->date}}"  class="form-control" id="exampleInputEmail1"  disabled/>
                            </div>
                        </div>
                        @endif
                        {{-- task_ID --}}
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                            <label>Task ID</label>
                            <input type="text" placeholder="{{$task->task_ID}}" name="task_ID" class="form-control" id="exampleInputEmail1"  disabled/>
                            </div>
                        </div>
                        {{-- num_of_trainees --}}
                        @if($task['updateTask'] != null)
                        <div class="col-12 col-sm-3">
                            <div class="form-group">
                            <label>Number Of Trainees</label>
                            <input type="number" placeholder="{{$task->num_of_trainees}}" name="num_of_trainees" class="form-control" id="exampleInputEmail1"  disabled/>
                            </div>
                        </div>
                        <div class="col-12 col-sm-3">
                            <div class="form-group">
                            <label style="color:red;">Update Trainees</label>
                            <input type="number" placeholder="{{$task['updateTask']->num_of_trainees}}" name="num_of_trainees" class="form-control" id="exampleInputEmail1"  disabled/>
                            </div>
                        </div>
                        @else
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                            <label>Number Of Trainees</label>
                            <input type="number" placeholder="{{$task->num_of_trainees}}" name="num_of_trainees" class="form-control" id="exampleInputEmail1"  disabled/>
                            </div>
                        </div>
                        @endif
                        {{-- price --}}
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                            <label>price</label>
                            <input type="text" name="price" placeholder="{{$task->price}}" class="form-control" id="exampleInputEmail1"  disabled/>
                            </div>
                        </div>
                        {{-- note --}}
                        <div class="col-12 col-sm-12">
                            <div class="form-group">
                                <label>Note</label>
                                <textarea class="form-control" placeholder="{{$task->note}}" name="note" rows="1" disabled></textarea>
                            </div>
                        </div>
                        @if($task['updateTask'] != null)
                        <div class="col-12 col-sm-12">
                            <div class="form-group">
                                <label style="color:red;">Eng Note</label>
                                <textarea class="form-control" placeholder="{{$task['updateTask']->note}}" name="note" rows="1" disabled></textarea>
                            </div>
                        </div>
                        @endif
                        {{-- LPO  --}}
                        <div class="col-12 col-sm-1">
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" name="LPO" value="1"  type="checkbox" @if($task->LPO == 1) checked @endif disabled>
                                    <label class="form-check-label">LPO</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-2">
                            <div class="form-group">
                            <input type="number" name="LPO_num" class="form-control" value="{{$task->LPO_num}}" id="exampleInputEmail1" disabled/>
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
                                    <input class="form-check-input" name="Quote" value="1" @if($task->Quote == 1) checked @endif type="checkbox" disabled>
                                    <label class="form-check-label">Quote</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-2">
                            <div class="form-group">
                            <input type="number" name="Quote_num" class="form-control" value="{{$task->Quote_num}}" id="exampleInputEmail1"  disabled/>
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
                                    <input class="form-check-input" name="walk_in_costomer" value="1" type="checkbox" @if($task->walk_in_costomer == 1) checked @endif disabled>
                                    <label class="form-check-label">Walk In Coustomer</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-2">
                            <div class="form-group">
                            <input type="number" name="walk_in_costomer_num" value="{{$task->walk_in_costomer_num}}" class="form-control" id="exampleInputEmail1" disabled/>
                            </div>
                        </div>
                        
                        </div>
                        <!-- /.row -->
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
