<?php

namespace App\Http\Livewire\Admin;

use App\Models\CaryingCost;
use Livewire\Component;

class CreateCarryingCostLivewire extends Component
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
        return view('livewire.admin.create-carrying-cost-livewire');
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
            $carryingCost = CaryingCost::create($data);            
            $this->resetInput();            
            $this->emit('postCarryingCost',$carryingCost);
        } catch (\Throwable $th) {
            dd('error post oc');
        }
    }

    public function resetInput()
    {
        $this->name = null;
        $this->cost = null;
    }
}
