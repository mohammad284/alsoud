<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Vacation;
use App\Models\User;
use App\Models\Rebate;
use App\Models\Salary;
use Carbon\Carbon;
class CalcSalary extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'calcSalary';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
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
        return Command::SUCCESS;
    }
}
