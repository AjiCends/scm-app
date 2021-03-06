<?php

namespace App\Http\Livewire\Admin;

use App\Models\Eoq;
use Livewire\Component;

class EoqLivewire extends Component
{

    public $material;
    public $order_costs;
    public $carrying_costs;
    public $amount;
    public $eoq;
    public $frekwensi;
    public $eoqList;

    public $schedule_eoq = 0;        
    
    protected $listeners = [
        'postOrderCost' => 'postOrderCost',
        'postCarryingCost' => 'postCarryingCost',
        'deletedCost' => 'deletedCost',
    ];
    
    public function mount($material)
    {  
        $this->material = $material;
    }

    public function render()
    {
        $this->getOrderCost($this->material);
        $this->getCarryingCost($this->material);
        $this->countEoq($this->amount,$this->order_costs,$this->carrying_costs);
        $this->getEoq($this->material);        
        return view('livewire.admin.eoq-livewire');
    }

    public function countEoq($amount,$order_costs,$carrying_costs)
    {           
        if (is_numeric($amount) && $amount != 0 && $order_costs != 0 && $carrying_costs != 0) {

            $eoq = sqrt(2 * $amount * $order_costs / $carrying_costs);

            $frekwensi = $amount / $eoq;

            $this->eoq = $eoq;
            $this->frekwensi = round($frekwensi);
        }else{
            $this->eoq = null;
            $this->frekwensi = null;
            
        }
    }

    public function getEoq($material)
    {
        $data = Eoq::where('material_id',$material->id)->get();
        $this->eoqList = $data;
    }

    public function saveEoq()
    {   
        if($this->order_costs != 0 && $this->carrying_costs){
            $data = [
                'eoq' => $this->eoq,
                'material_need' => floatval($this->amount),
                'frekwensi' => $this->frekwensi,
                'material_id' => $this->material->id,
            ];        
    
            $postEoq = Eoq::create($data);        
        }else{
            $this->addError('error','EOQ tidak boleh kosong silakan isi Data Biaya Pemesanan dan Biaya Perawatan terlebih dahulu');
        }        
    }

    public function deleteEoq($id)
    {
        $eoq = Eoq::find($id);
        if ($eoq) {
            $eoq->delete();
        }
    }

    public function getOrderCost($material)
    {
        $data = $material->orderCost;
        $answer = 0;
        foreach ($data as $item) {
            $answer = $answer + $item->cost;
        }
        $this->order_costs = $answer;        
    }

    public function getCarryingCost($material)
    {                
        $data = $material->caryingCost;
        $answer = 0;
        foreach ($data as $item) {
            $answer = $answer + $item->cost;
        }
        $this->carrying_costs = $answer;             
    }

    public function setScheduleEoq($eoq_id)
    {
        $this->schedule_eoq = $eoq_id;
    }


    //Emit

    public function postCarryingCost($param)
    {
        # code...
    }

    public function postOrderCost($param)
    {
        # code...
    }

    public function deletedCost()
    {
        # code...
    }
    
    
}
