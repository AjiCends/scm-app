<?php

namespace App\Http\Livewire\Admin;

use App\Models\Material;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateBahanBakuLivewire extends Component
{
    use WithFileUploads;

    public $name;
    public $image;

    public function render()
    {
        return view('livewire.admin.create-bahan-baku-livewire');
    }

    public function store()
    {   
        // dd('a');
        // dd($this->image);
        $this->validate([
            'name' => 'required|max:500',
            // 'image' => 'required'            
        ]);
        
        // $imgStore = $this->image->storePublicly('public/bahan-baku');
        // $imgPath = substr($imgStore,7);        
        

        $data = [
            'name' => $this->name,     
            // 'image' => $imgPath
        ];
                

        try {                        
            $material = Material::create($data);            
            $this->resetInput();
            $this->emit('materialAdded',$material);            
        } catch (\Throwable $th) {
            //throw $th;
        }
    }    

    public function resetInput()
    {
        $this->name = null;
        $this->image = null;
    }
}
