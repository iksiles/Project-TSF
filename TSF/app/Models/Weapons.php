<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Weapons extends Model
{
    use HasFactory;
    
    protected $table = 'weapons';
    protected $primaryKey = "id";
    protected $fillable = ['arma', 'nacion', 'categoria', 'municiones', 'modelo_TSF', 'imgW', 'type'];
    protected $hidden = ['id'];
    
    public function obtenerAllWeapons() {
        return Weapons::all();
    }

    public function obtenerWeaponsPorId() {
        return Weapons::find($id);
    }

    public function tsfW() {
        return $this->belongsToMany(Tsf::class);
    }   
}

