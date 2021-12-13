<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class UserLivewire extends Component
{
    public $users;
    public $deleteId;    
    public $deletedName;
    public $closeDelete;    

    protected $listeners = [
        "userAdded" => "userAdded",
        "editUser" => "editUser"
    ];

    public function mount()
    {        
        $this->getUser();
        $this->closeDelete = 0;
    }

    public function render()
    {  
        $this->getUser();        
        return view('livewire.admin.user-livewire');
    }

    public function getUser()
    {
        $data = User::orderBy('created_at','desc')->get();        
        $this->users = $data;

    }
    
    public function userAdded($data)
    {
        // dd($data);
    }

    public function editUser($data)
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
        $material = User::find($this->deleteId);
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
