<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaryingCost extends Model
{
    use HasFactory;    
    protected $table = 'carying_costs';
    protected $fillable = ['material_id','name','cost'];

    public function material()
    {
        return $this->belongsTo(Material::class,'material_id');
    }
}
