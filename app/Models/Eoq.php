<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eoq extends Model
{
    use HasFactory;
    protected $table = 'eoqs';
    protected $fillable = ['eoq','material_need','frekwensi','material_id'];

    public function material()
    {
        return $this->belongsTo(Material::class,'material_id');
    }

    public function schedule()
    {
        return $this->hasMany(Schedule::class,'eoq_id','id');
    }
}
