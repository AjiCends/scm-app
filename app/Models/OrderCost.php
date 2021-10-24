<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderCost extends Model
{
    use HasFactory;
    protected $table = 'order_costs';
    protected $fillable = ['material_id','name','cost'];

    public function material()
    {
        return $this->belongsTo(Material::class,'material_id');
    }
}
