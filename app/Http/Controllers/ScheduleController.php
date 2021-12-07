<?php

namespace App\Http\Controllers;

use App\Models\Eoq;
use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function store(Request $request, $eoq_id)
    {        
        $data = $request->validate([
            'first_date' => 'required|date',
        ]);        
        
        $eoq = Eoq::find($eoq_id);
        $frekwensi = $eoq->frekwensi;
        
        try {
            for ($i = 1; $i <= $frekwensi; $i++) { 
                $day = " +".$i . " day";            
                $order_date = date('y-m-d H:i:s',strtotime($data['first_date'].$day));
                $db =[
                    'eoq_id' => $eoq_id,
                    'order_date' => $order_date,
                ];                     
                Schedule::create($db);                                  
            }

            return redirect()->route('admin.dashboard');
        } catch (\Throwable $th) {
            //throw $th;
        }

        return redirect()->back();

        
    }
}
