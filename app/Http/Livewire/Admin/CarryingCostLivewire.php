<?php

namespace App\Http\Livewire\Admin;

use App\Models\CaryingCost;
use Livewire\Component;

class CarryingCostLivewire extends Component
{
    public $material;
    public $carrying_costs;
    public $deleteId;    
    public $deletedName;
    public $closeDelete; 

    protected $listeners = [
        'postCarryingCost' => 'postCarryingCost',
        'deletedCost' => 'deletedCost',
    ];

    public function mount($material)
    {
        $this->material = $material;
        $this->getCarryingCost($material);
        $this->closeDelete = 0;
    }
    public function render()
    {                      
        $this->getCarryingCost($this->material);  
        return view('livewire.admin.carrying-cost-livewire');
    }

    public function getCarryingCost($material)
    {                
        $this->carrying_costs = $material->caryingCost;             
    }

    public function postCarryingCost($data)
    {
        //
    }

    public function displayDeleteDialog($deletedName,$deletedId)
    {
        $this->closeDelete = 1;
        $this->deletedName = $deletedName;
        $this->deleteId = $deletedId;
    }

    public function closeDeleteDialog()
    {
        $this->closeDelete = 0;
        return $this->closeDelete;
    }

    public function deleteCarryingCost()
    {
        $carrying_costs = CaryingCost::find($this->deleteId);
        if (!is_null($carrying_costs)) {
            $carrying_costs->delete();
            $this->emit('deletedCost');
            $this->resetInput();
            $this->closeDeleteDialog();                      
        }        

    }

    public function deletedCost()
    {
        # code...
    }

    public function resetInput()
    {
        $this->deleteId = null;
        $this->deletedName = null;
    }
}
