<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- main template css -->
    <link rel="stylesheet" href="css/style.css">
    <title>PDF</title>
    <style>
        body { font-family: DejaVuSans, sans-serif; }
    </style>
</head>
<body >
    <header >
        <table style="background-color: #eee;width:100%;">
            <tr>
                <td>
                    <div style="width: 300px; height: 170px; ">
                        <img style="width: 280px; height: 160px; " src="{{ asset('images/logo.jpg') }}" alt="Image">
                    </div>
                </td> 
                <td>
                    <div style=" margin-left: 6rem;" class="text">
                        <input style="display: block;height: 25px;padding-left: 10px;margin-bottom: 5px;color: #012e4d;" type="text" value="{{$task->date}}" disabled >
                        <input style="display: block;height: 25px;padding-left: 10px;margin-bottom: 5px;color: #012e4d;" type="text" value="{{$task->work_name['number']}}" disabled >
                        <input style="display: block;height: 25px;padding-left: 10px;margin-bottom: 5px;color: #012e4d;" type="text" value="{{$task->work_name['type']}}" disabled >
                    </div>
                </td>
            </tr>
        </table>
    </header>
    <!-- form -->
    <section >
        <h3 style="color: #ff6600;font-size: 25px;margin-left: 0;margin-right: 0;margin-bottom: 1px;margin-top: 20px;">Client Details :</h3>
        <table style="width:100%;margin:0;padding:0"> 
            
            <tr style="margin-bottom: 5px;">
                <td colspan="1">
                    <!-- container 1 -->          
                    <div class="text" >
                        <label style="display: block;font-size: 20px;color: #012e4d;font-weight: bold;">Client Ref.</label>
                        <p style="width: calc(100% - 15px);margin-top: 3px;background-color: #eee;border: 1px solid;height: 25px;padding-top: 5px;padding-left: 5px;">ASTI-{{$task->client_ID}}</p>
                    </div>
                </td>
                <td colspan="3">
                    <div class="text" >
                        <label style="display: block;font-size: 20px;color: #012e4d;font-weight: bold;">Client Name</label>
                        <p style="width: 100%;background-color: #eee;margin-top: 3px;border: 1px solid;height: 25px;padding-top: 5px;padding-left: 5px;">{{$task->client_name}}</p>
                    </div>
                </td>
            </tr>

            <tr style="margin-bottom: 5px; ">
                <td colspan="2">
                    <!-- container 1 -->          
                    <div class="text" colspan="3">
                        <label style="display: block;font-size: 20px;color: #012e4d;font-weight: bold;">Focal Point</label>
                        <p style="width: calc(100% - 15px);margin-top: 3px;background-color: #eee;border: 1px solid;height: 25px;padding-top: 5px;padding-left: 5px;">{{$task->focal_point}}</p>
                    </div>
                </td>
                <td colspan="2">
                    <div class="text" >
                        <label style="display: block;font-size: 20px;color: #012e4d;font-weight: bold;">Contact No.</label>
                        <p style="width: calc(100% - 15px);margin-top: 3px;background-color: #eee;border: 1px solid;height: 25px;padding-top: 5px;padding-left: 5px;">{{$task->client_number}}</p>
                    </div>
                </td>
            </tr>

             <tr style="padding-bottom: 1px;">
                <td >
                    <div class="text" >
                        <label style="display: block;font-size: 20px;color: #012e4d;font-weight: bold;">Payment Method.</label>
                        <p style="width: calc(100% - 15px);margin-top: 3px;background-color: #eee;border: 1px solid;height: 25px;padding-top: 5px;padding-left: 5px;">{{$task->payment_method['type']}}</p>
                    </div>
                </td>
                <td colspan="2">
                    <div class="text" >
                        <label style="display: block;font-size: 20px;color: #012e4d;font-weight: bold;">Task Location.</label>
                        <p style="width: calc(100% - 15px);margin-top: 3px;background-color: #eee;border: 1px solid;height: 25px;padding-top: 5px;padding-left: 5px;">{{$task->client_location}}</p>
                    </div>
                </td>
                <td >
                    <div class="text" >
                        <label style="display: block;font-size: 20px;color: #012e4d;font-weight: bold;">Charge Base.</label>
                        <p style="width: calc(100% - 15px);margin-top: 3px;background-color: #eee;border: 1px solid;height: 25px;padding-top: 5px;padding-left: 5px;">{{$task['charge_per']->name}}</p>
                    </div>
                </td>
            </tr>

            
            {{-- <h3 style="color: #ff6600;font-size: 25px;margin-left: 0;margin-right: 0;margin-bottom: 1px;margin-top: 20px;">Task Division:</h3> --}}
            <tr style="margin-bottom: 5px;">
                <td colspan="2">
                    <!-- container 1 -->          
                    <div class="text" >
                        <label style="display: block;font-size: 20px;color: #012e4d;font-weight: bold;">Job.</label>
                        <p style="width: calc(100% - 15px);margin-top: 3px;background-color: #eee;border: 1px solid;height: 25px;padding-top: 5px;padding-left: 5px;">{{$task->work_name['type']}}</p>
                    </div>
                </td>
                <td colspan="2">
                    <div class="text" >
                        <label style="display: block;font-size: 20px;color: #012e4d;font-weight: bold;">Task No.</label>
                        <p style="width: calc(100% - 15px);background-color: #eee;margin-top: 3px;border: 1px solid;height: 25px;padding-top: 5px;padding-left: 5px;">{{$task->task_ID}}</p>
                    </div>
                </td>
            </tr>
            <tr style="margin-bottom: 5px;">
                <td colspan="2">
                    <div class="text" >
                        <label style="display: block;font-size: 20px;color: #012e4d;font-weight: bold;">Assigned Trainer</label>
                        <p style="width: calc(100% - 15px);background-color: #eee;margin-top: 3px;border: 1px solid;height: 25px;padding-top: 5px;padding-left: 5px;">{{$task->eng_name['name']}}</p>
                    </div>
                </td>
                <td >
                    <!-- container 1 -->          
                    <div class="text" >
                        <label style="display: block;font-size: 20px;color: #012e4d;font-weight: bold;">Task Type \ Name.</label>
                        <p style="width: calc(100% - 15px);margin-top: 3px;background-color: #eee;border: 1px solid;height: 25px;padding-top: 5px;padding-left: 5px;">{{$task->machine_name['name']}}</p>
                    </div>
                </td>
                <td >
                    <div class="text" >
                        <label style="display: block;font-size: 20px;color: #012e4d;font-weight: bold;">Total Trainees</label>
                        <p style="width: 100%;background-color: #eee;margin-top: 3px;border: 1px solid;height: 25px;padding-top: 5px;padding-left: 5px;">{{$task->num_of_trainees}}</p>
                    </div>
                </td>
            </tr>     
            <tr style="padding-bottom: 1px;">
                <td colspan="1">
                    <div class="text" >
                        <input  style="font-size:20px" name="LPO" value="1" type="checkbox" @if($task->LPO == 1) checked @endif>
                        <label style="display: inline;font-size: 20px;color: #012e4d;font-weight: bold;margin-left:10px;">LPO.</label>
                    </div>
                    <div class="col-12 col-sm-2">
                        <div class="form-group">
                        <p style="width: calc(100% - 15px);background-color: #eee;margin-top: 3px;border: 1px solid;height: 25px;padding-top: 5px;padding-left: 5px;">{{$task->LPO_num}}</p>
                        </div>
                    </div>
                </td>
                <td colspan="1">
                    <div class="text" >
                        <input  name="Quote" value="1" type="checkbox" @if($task->Quote == 1) checked @endif>
                        <label style="display: inline;font-size: 20px;color: #012e4d;font-weight: bold;margin-left:10px;">Quote.</label>
                    </div>
                    <div class="col-12 col-sm-2">
                        <div class="form-group">
                        <p style="width: calc(100% - 15px);background-color: #eee;margin-top: 3px;border: 1px solid;height: 25px;padding-top: 5px;padding-left: 5px;">{{$task->Quote_num}}</p>
                        </div>
                    </div>
                </td>
                <td colspan="2">
                    <div class="text" >
                        <input  name="walk_in_costomer" value="1" type="checkbox" @if($task->walk_in_costomer == 1) checked @endif>
                        <label style="display: inline;font-size: 20px;color: #012e4d;font-weight: bold;margin-left:10px;">Walk In Coustomer.</label>
                    </div>
                    <div class="col-12 col-sm-2">
                        <div class="form-group">
                        <p style="width: calc(100% - 15px);background-color: #eee;margin-top: 3px;border: 1px solid;height: 25px;padding-top: 5px;padding-left: 5px;">{{$task->walk_in_costomer_num}}</p>
                        </div>
                    </div>
                </td>
            </tr>       
            <tr style="margin-bottom: 5px;">
                <td colspan="4">
                    <div class="text" >
                        <label style="display: block;font-size: 20px;color: #012e4d;font-weight: bold;">Task Description / Note.</label>
                        <p style="width: 100%;background-color: #eee;margin-top: 3px;border: 1px solid;height: 80px;padding-top: 5px;padding-left: 5px;">{{$task->note}}</p>
                    </div>
                </td>
            </tr>
        </table>
    </section>
    <div class="footer">
        <div style="text-align: center;font-size: 20px;color: white;background-color: #012e4d;height: 30px;">
            SPACE FOR ADDITIONAL INFORMATION
        </div>
        
    </div>
    
</body>

</html>