<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class EditUserLivewire extends Component
{
    public $modalName;
    public $user;
    public $name;
    public $email;
    public $password = null;
    public $confirm_password = null;

    public function mount($user)
    {        
        $this->modalName = 'modalUserEdit'.$user->id;        
        $this->user = $user;
        $this->name = $this->user->name;        
        $this->email = $this->user->email;                
    }
    public function render()
    {
        return view('livewire.admin.edit-user-livewire');
    }

    public function store()
    { 
        $email_validate = 'required|unique:users,email,'.$this->user->id;
        $this->validate([
            'name' => 'required|max:500',
            'email' => $email_validate,                       
        ]);

        if($this->password == null){
            $data = [
                'name' => $this->name,
                'email' => $this->email,                 
            ];          
        }else{

            if($this->password != $this->confirm_password){
                session()->flash('error', 'Password tidak terkonfirmasi sama');              
            }else{
                $data = [
                    'name' => $this->name,
                    'email' => $this->email,                 
                    'password' => bcrypt($this->password),
                ];                
            }
        }

        try {              
            $user = User::find($this->user->id);
            if(!is_null($user)){
                $user->update($data);
            }
            $this->emit('editUser',$user);
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
