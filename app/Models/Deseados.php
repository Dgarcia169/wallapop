<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deseados extends Model
{
    use HasFactory;
    
     protected $table = 'deseados';
    
     protected $fillable = [
        'iduser',
        'idproducto',
    ];
    
    public function user() {
        return $this->belongsTo('App\Models\User', 'iduser');
    }
    
    public function producto() {
        return $this->belongsTo('App\Models\Producto', 'idproducto');
    }
    
}
