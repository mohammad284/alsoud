<?php
 
namespace App\Helper;
use App\Models\Vacation;
use App\Models\User;
use App\Models\Rebate;
use App\Models\Salary;
use Carbon\Carbon;
class Helpers {
 
    public static function calc_salary()
    {
        $engs = User::where('type','eng')->pluck('id');
        foreach($engs as $eng){
            $vacation = Vacation::where('eng_id',$eng)->orderBy('id', 'desc')->first();
            
            $now = Carbon::createFromFormat('Y-m-d H:s:i', Carbon::now());
            if($vacation != null){
                if($now > $vacation['to_date']){ // add vacation + sallary 
                
                    // return $now;
                    $new_vacation = new Vacation;
                    $new_vacation->eng_id = $vacation->eng_id;
                    $new_vacation->from_date = $vacation->to_date;
                    $to_date = Carbon::createFromFormat('Y-m-d H:s:i', $vacation['to_date'])->addMonth(1);
                    $new_vacation->to_date = $to_date;
                    $new_vacation->type = 'worthy';
                    $new_vacation->accept = 0;
                    $new_vacation->num_of_day = 2.5;
                    $new_vacation->rest = $vacation['rest'] + 2.5;
                    $new_vacation->save();
                }
            }
            
        }
        //calc salary
        foreach($engs as $eng)
        {
            $basic_salary = User::find($eng)->salary;
            $rebates = Rebate::whereMonth('created_at', '=', now()->month)
            ->where('eng_id',$eng)->sum('discount');
            $salary = Salary::whereMonth('created_at', '=', now()->month)
            ->where('eng_id',$eng)
            ->first();
            if($salary == null)
            {
                $data = Salary::create([
                    'eng_id' => $eng,
                    'total' => $basic_salary,
                    'net' => $basic_salary - $rebates,
                ]);
                
            }else{
                $salary->net = $basic_salary - $rebates;
                $salary->save();
            }

        }
        // send pdf to engineers 
        
    }
    public function send_salary()
    {
        
        $engs = User::where('type','eng')->get();
        foreach($engs as $eng)
        {
            $basic_salary = User::find($eng->id)->salary;
            $rebates = Rebate::whereMonth('created_at', '=', now()->month)
            ->where('eng_id',$eng->id)->get();
            $total_discount = Rebate::whereMonth('created_at', '=', now()->month)
            ->where('eng_id',$eng->id)->sum('discount');
            // return $total_discount;
            $salary = Salary::whereMonth('created_at', '=', now()->month)
            ->where('eng_id',$eng->id)
            ->first();
            $final = array('basic_salary'=>$basic_salary,'rebates'=>$rebates,'salary'=>$salary,'total_discount'=>$total_discount);
            $data_pdf = [
                'final' => $final,
            ];
            // 
            $password = $eng->pdf_password;
            $pdf = Pdf::loadView('dashboard.pdf.salary',$data_pdf);  
            $password = $password;
            $pdf->get_canvas()->get_cpdf()->setEncryption("$password", "$password");
            $pdf->render();
            Mail::send('dashboard.emails.salary', $final, function($message)use($final,$pdf,$eng ) {
                $message->to($eng['email'], 'alsaud')
                ->subject('SALARy')
                ->attachData($pdf->output(), "alsaud.pdf");
            });
        }
    }
}