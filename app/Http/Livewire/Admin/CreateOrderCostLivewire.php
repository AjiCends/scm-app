<?php

namespace App\Http\Livewire\Admin;

use App\Models\OrderCost;
use Livewire\Component;

class CreateOrderCostLivewire extends Component
{
    public $name;
    public $cost;
    public $material_id;

    public function mount($material_id)
    {
        $this->material_id = $material_id;
    }

    public function render()
    {        
        return view('livewire.admin.create-order-cost-livewire');
    }


    public function store()
    {        
        $this->validate([
            'material_id' => 'required',
            'name' => 'required|max:500',
            'cost' => 'required',            
        ]);

        $data = [
            "material_id" => $this->material_id,
            "name" => $this->name,
            "cost" => $this->cost,
        ];                

        try {
            $orderCost = OrderCost::create($data);            
            session()->flash('success', 'Data Biaya Pemesanan(OC) berhasil ditambah');                        
            $this->resetInput();            
            $this->emit('postOrderCost',$orderCost);            
        } catch (\Throwable $th) {            
            session()->flash('Error', 'Data Biaya Pemesanan(OC) gagal ditambah');
        }
    }

    public function resetInput()
    {
        $this->name = null;
        $this->cost = null;
    }
}
