<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use ReturnTypeWillChange;

class Schedule extends Model
{
    use HasFactory;

    protected $table = 'schedules';
    protected $fillable = [
        'eoq_id',
        'order_date'
    ];    

    public function eoq()
    {
        return $this->belongsTo(Eoq::class,'eoq_id');
    }
}
