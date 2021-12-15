<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class CreateUserLivewire extends Component
{
    public $name;
    public $email;
    public $password;
    public $confirm_password;

    public function render()
    {
        return view('livewire.admin.create-user-livewire');
    }

    public function store()
    {   
        $this->validate([
            'name' => 'required|max:500',
            'email' => 'required|unique:users,email',
            'password' => 'required',
            'confirm_password' => 'required',
        ]);                   

        $data = [
            'name' => $this->name,                 
            'email' => $this->email,     
            'password' => bcrypt($this->password),                     
        ];

        if($this->password != $this->confirm_password) {
            dd('ga sama nih');
            session()->flash('error', 'Password tidak terkonfirmasi sama');            
        }else{
            try {                        
                $user = User::create($data);
                $user->assignRole('employee');            
                $this->resetInput();
                $this->emit('userAdded',$user);            
            } catch (\Throwable $th) {
                //throw $th;
            }            
        }
                        
    }    

    public function resetInput()
    {        
        $this->name = null;                 
        $this->email = null;     
        $this->password = null;     
        $this->confirm_password = null;   
    }
}
