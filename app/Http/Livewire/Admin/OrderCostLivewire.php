<?php

namespace App\Http\Livewire\Admin;

use App\Models\OrderCost;
use Livewire\Component;

class OrderCostLivewire extends Component
{
    public $material;
    public $order_costs;
    public $deleteId;    
    public $deletedName;
    public $closeDelete; 

    protected $listeners = [
        'postOrderCost' => 'postOrderCost',
        'deletedOderCost' => 'deletedOderCost',
    ];

    public function mount($material)
    {
        $this->material = $material;
        $this->getOrderCost($material);
        $this->closeDelete = 0;
    }
    public function render()
    {                      
        $this->getOrderCost($this->material);  
        return view('livewire.admin.order-cost-livewire');
    }

    public function getOrderCost($material)
    {
        $this->order_costs = $material->orderCost;        
    }

    public function postOrderCost($data)
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

    public function deleteOderCost()
    {
        $order_costs = OrderCost::find($this->deleteId);
        if (!is_null($order_costs)) {
            $order_costs->delete();
            $this->resetInput();
            $this->closeDeleteDialog();                      
        }        

    }

    public function deletedOderCost()
    {
        # code...
    }

    public function resetInput()
    {
        $this->deleteId = null;
        $this->deletedName = null;
    }
}
