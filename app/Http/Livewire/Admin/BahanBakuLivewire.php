<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Material;

class BahanBakuLivewire extends Component
{
    public $materials;
    public $deleteId;    
    public $deletedName;
    public $closeDelete;    

    protected $listeners = [
        "materialAdded" => "materialAdded",
        "editBahanBaku" => "editBahanBaku"
    ];

    public function mount()
    {        
        $this->getMaterial();
        $this->closeDelete = 0;
    }

    public function render()
    {  
        $this->getMaterial();        
        return view('livewire.admin.bahan-baku-livewire');
    }

    public function getMaterial()
    {
        $data = Material::orderBy('created_at','desc')->get();        
        $this->materials = $data;

    }
    
    public function materialAdded($data)
    {
        // dd($data);
    }

    public function editBahanBaku($data)
    {
        // dd($data);
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
    }

    public function deleteBahanBaku()
    {
        $material = Material::find($this->deleteId);
        if (!is_null($material)) {
            $material->delete();
            $this->resetInput();
            $this->closeDeleteDialog();
        }        

    }

    public function resetInput()
    {
        $this->deleteId = null;
        $this->deletedName = null;
    }

}

