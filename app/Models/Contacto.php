<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    use HasFactory;
    
     protected $table = 'contacto';
    
     protected $fillable = [
        'iduser1',
        'iduser2',
        'idproducto',
        'is_vendedor',
        'textocontacto',
    ];
    
    public function user1() {
        return $this->belongsTo('App\Models\User', 'iduser1');
    }
    
    public function user2() {
        return $this->belongsTo('App\Models\User', 'iduser2');
    }
    
    public function producto() {
        return $this->belongsTo('App\Models\Producto', 'idproducto');
    }
    
    
}
