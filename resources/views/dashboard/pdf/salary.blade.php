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
        table.sal{
        margin-top : 30px;
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
        }

        table.sal td, th {
        text-align: left;
        padding: 8px;
        }

        table.sal tr:nth-child(even) {
        background-color: #dddddd;
        }
        .inv{
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 60%;
        }
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
                        <input style="display: block;height: 25px;padding-left: 10px;margin-bottom: 5px;color: #012e4d;" type="text" value="{{now()->format('Y-M-d')}}" disabled >
                        <input style="display: block;height: 25px;padding-left: 10px;margin-bottom: 5px;color: #012e4d;" type="text" value="total salary:{{$final['basic_salary']}}" disabled >
                        <input style="display: block;height: 25px;padding-left: 10px;margin-bottom: 5px;color: #012e4d;" type="text" value="net salary:{{$final['salary']->net}}" disabled >
                    </div>
                </td>
            </tr>
        </table>
    </header>
    <!-- form -->
    <section >
        <h3 style="color: #ff6600;font-size: 25px;margin-left: 0;margin-right: 0;margin-bottom: 1px;margin-top: 20px;">Discount Details :</h3>
        <table class="sal">
            <tr>
                <th>days</th>
                <th>Date</th>
                <th>Discount</th>
            </tr>
            @foreach($final['rebates'] as $rebates)
            <tr>
                <td>{{$rebates->num_of_day}}</td>
                <td>{{$rebates->created_at->format('Y-M-d')}}</td>
                <td>{{$rebates->discount}}</td>
            </tr>
            @endforeach
        </table>
        <h3 style="color: #ff6600;font-size: 25px;margin-left: 0;margin-right: 0;margin-bottom: 1px;margin-top: 20px;">Salary Details:</h3>
        <div class="col-6">
            <div class="table-responsive">
            <table class="inv">
                <tbody>
                <tr>
                <th style="width:50%">Basic Salary:</th>
                <td>{{$final['basic_salary']}}</td>
                </tr>
                <tr>
                <th>Total Discount: </th>
                <td>{{$final['total_discount']}}</td>
                </tr>
                <tr>
                <th>Net Salary:</th>
                <td>{{$final['salary']->net}}</td>
                </tr>
            </tbody>
            </table>
            </div>
        </div>
    </section>
    <div class="footer">
        <div style="text-align: center;font-size: 20px;color: white;background-color: #012e4d;height: 30px;">
            SPACE FOR ADDITIONAL INFORMATION
        </div>
        
    </div>
    
</body>

</html>