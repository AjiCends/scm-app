<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Material;
use Livewire\WithFileUploads;

class BahanBakuLivewire extends Component
{
    use WithFileUploads;

    public $materials;
    public $name;
    public $image;

    public function mount()
    {
        $this->getMaterial();
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

    public function store()
    {        
        $this->validate([
            'name' => 'required|max:500',
            'image' => 'required'            
        ]);

        $imgStore = $this->image->storePublicly('public/bahan-baku');
        $imgPath = substr($imgStore,7);        
        

        $data = [
            'name' => $this->name,     
            'image' => $imgPath
        ];        

        try {                        
            Material::create($data);            
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

