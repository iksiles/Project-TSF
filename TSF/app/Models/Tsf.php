<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tsf extends Model
{
    use HasFactory;

    protected $table = "tsfs";
    protected $primaryKey = "id";
    protected $fillable = ['modelo', 'nacionalidad', 'anyo', 'motores', 'img', 'type'];
    protected $hidden = ['id'];

    public function scopeAllTsfs() {
        return Tsf::all();
    }

    public function obtenerTsfPorId() {
        return Tsf::find($id);
    }

    public function obtenerTsfPorModelo($modelTSF) {
        return Tsf::find($modelo);
    }

    public function obtenerTsfPorNacion() {
        return Tsf::find($nacionalidad);
    }

    public function obtenerTsfPorAnyo() {
        return Tsf::find($anyo);
    }

    public function obtenerArmas() {
        return $this->belongsToMany(Weapons::class);
    }

    public function obtenerVariantes() {
        return $this->hasMany(Variants::class);
    }
}
