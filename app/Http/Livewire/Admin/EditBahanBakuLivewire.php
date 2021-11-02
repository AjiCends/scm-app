<?php

namespace App\Http\Livewire\Admin;

use App\Models\Material;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditBahanBakuLivewire extends Component
{
    use WithFileUploads;
        
    public $modalName;
    public $bahanBaku;
    public $name;
    public $image;

    public function mount($bahanBaku)
    {        
        $this->modalName = 'modalBahanBaku'.$bahanBaku->id;        
        $this->bahanBaku = $bahanBaku;
        $this->name = $this->bahanBaku->name;        
    }
    public function render()
    {
        return view('livewire.admin.edit-bahan-baku-livewire');
    }

    public function store()
    {              

        if(!is_null($this->image))
        {
            $imgStore = $this->image->storePublicly('public/bahan-baku');
            $imgPath = substr($imgStore,7);        

            $data = [
                'name' => $this->name,     
                'image' => $imgPath
            ];  
        }else{
            $data = [
                'name' => $this->name                
            ];
        }          

        try {              
            $material = Material::find($this->bahanBaku->id);
            if(!is_null($material)){
                $material->update($data);
            }
            $this->emit('editBahanBaku',$material);
            $this->resetInput();            
        } catch (\Throwable $th) {
            //throw $th;
        }
    } 

    public function resetInput()
    {        
        $this->image = null;
    }
}
