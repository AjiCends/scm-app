<?php

namespace App\Http\Livewire\Admin;

use App\Models\Schedule;
use DateTime;
use Livewire\Component;

class ScheduleLivewire extends Component
{
    public $schedules;
    public $deleteId;    
    public $deletedName;
    public $closeDelete;    

    protected $listeners = [
        "scheduleAdded" => "scheduleAdded",
        "editSchedule" => "editSchedule"
    ];

    public function mount()
    {        
        $this->getSchedule();
        $this->closeDelete = 0;
    }

    public function render()
    {  
        $this->getSchedule();        
        return view('livewire.admin.schedule-livewire');
    }

    public function getSchedule()
    {
        $now = new DateTime();
        $data = Schedule::where('order_date','>=',$now->format('d-m-Y H:i:s'))->orderBy('order_date','asc')->get();        
        $this->schedules = $data;

    }
    
    public function scheduleAdded($data)
    {
        // dd($data);
    }

    public function editSchedule($data)
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
        $schedule = Schedule::find($this->deleteId);
        if (!is_null($schedule)) {
            $schedule->delete();
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
