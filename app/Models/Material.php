<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;
    protected $table = 'materials';
    protected $fillable = ['name','image','created_at','updated_at'];

    public function orderCost()
    {
        return $this->hasMany(OrderCost::class,'material_id','id');
    }

    public function caryingCost()
    {
        return $this->hasMany(CaryingCost::class,'material_id','id');
    }

    public function eoq()
    {
        return $this->hasMany(Eoq::class,'material_id','id');
    }
}
