<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- main template css -->
    <link rel="stylesheet" href="css/style.css">
    <!-- font css  -->
    <!-- <link rel="stylesheet" href="css/all.min.css"> -->
    <!-- render All Elements Normally   -->
    <link rel="stylesheet" href="css/normalize.css">
    <style>
        /* start global rolls */
        * {
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }
        @media (min-width: 768px) {
            .container {
              width: 750px;
            }
            
          }
          /* Medium */
          @media (min-width: 992px) {
            .container {
              width: 970px;
            }
          }
          /* Large */
          @media (min-width: 1200px) {
            .container {
              width: 1170px;
            }
          } 
          
        html{
            scroll-behavior: smooth;
        }
        
        body {
            font-family: "Work Sans", sans-serif;
        }
        
        .container {
            padding-left: 15px;
            padding-right: 15px;
            margin-left: auto;
            margin-right: auto; 
        }
        .header{
            padding: 20px;
        }
        .header .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            
        }
        .header .logo {
            width: 60px;
        }
        .header span {
            font-size: 20px;
            color: #3F51B5;
            font-weight: 600;
        }
        .first-section {
            background-color: #fcf3e2;
        }
        .first-section .container .text {
            text-align: center;
        }
        
        .first-section .container .text img {
            width: 250px;
        }
        .first-section .container .text p {
            font-size: 20px;
        }
        /* details Section  */
        @media (max-width: 991px) {
            .details .container .details-content {
              flex-direction: column;
              text-align: center;
              
            }
            .details .container .details-content .dis {
                width: calc(100% - 100px);
                margin-bottom: 10px;
                display: none;
            }
        }
        .details .container .details-content {
            margin-top: 100px;
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }
        .details .container .details-content .text p {
            font-size: 20px;
            color: #3F51B5;
            font-weight: bold;
        }
        .details .details-content .image img {
            max-width: 100%;
            margin-top: 80px;
        }
        .details .details-content .image {
            position: relative;
            width: 290px;
            height: 375px;
        }
        .details .details-content .text {
            flex-basis: calc(100% - 400px);
        }
        
        table {
            width: 100%;
            border: 1px solid #ff6600;
        }
        table tr td {
            text-align:start;
            padding: 10px;
        }
        table input {
            height: 40px;
            width: 100%;
            padding-left: 10px; 
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="container">
            <img class="logo" src="/{{ App\Models\Setting::first()->logo }}" alt="">
            <span>{{ App\Models\Setting::first()->title }}</span>
        </div>
    </div>
    <div class="first-section">
        <div class="container">
            <div class="text">
                <img src="/{{ App\Models\Setting::first()->logo }}" alt="">
            </div>
            <div class="text" style="padding: 10px;">
                <p>WELCOME TO GENUINITY CHECK</p>
            </div>
                
        </div>
    </div>
    <div class="details">
        <div class="container">
            <div class="details-content">
                <div class="image dis">
                    <img src="/{{ App\Models\Setting::first()->logo }}" alt="">
                </div>
                <div class="text">
                    <p>
                        <p>Below is the data for searched Certificate/ ID Card</p>
                    </p>
                    <table>
                        <tr>
                            <td >Date FROM</td>
                            <td>
                                <input type="text" name="" value="{{$details->from_date}}" id="" disabled>
                            </td>
                        </tr>
                        <tr>
                            <td >Date To</td>
                            <td>
                                <input type="text" name="" value="{{$details->to_date}}" id="" disabled>
                            </td>
                        </tr>
                        <tr>
                            <td >Trainee's Name</td>
                            <td>
                                <input type="text" name="" value="{{$details->trainee_name}}" id="" disabled>
                            </td>
                        </tr>
                        <tr>
                            <td >Trainer's Name</td>
                            <td>
                                <input type="text" name="" value="{{$details['eng']->name}}" id="" disabled>
                            </td>
                        </tr>
                        <tr>
                            <td >Jop Title</td>
                            <td>
                                <input type="text" name="" value="{{$details['work']->type}}" id="" disabled>
                            </td>
                        </tr>
                        <tr>
                            <td >Scope Of Work</td>
                            <td>
                                <input type="text" name="" value="{{$details['machine']->name}}" id="" disabled>
                            </td>
                        </tr>                        
                      </table>
                    
                </div>
            </div>
        </div>
    </div>
    <div class="footer">
        <div style="text-align: center;font-size: 20px ; margin-top: 30px;color: white;background-color: #012e4d;height: 30px;">
            <span>SPACE FOR ADDITIONAL INFORMATION</span>
            
        </div>
        
    </div>
</body>
</html>