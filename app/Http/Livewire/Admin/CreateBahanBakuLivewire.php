<?php

namespace App\Http\Livewire\Admin;

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
        //
    }
}
