<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variants extends Model
{
    use HasFactory;

    protected $table = "variants";
    protected $primaryKey = "id";
    protected $fillable = ['modelo', 'nacionalidad', 'anyo', 'motores', 'img', 'type', 'modelo_ORG'];
    protected $hidden = ['id'];

    public function scopeAllVar() {
        return Variants::all();
    }

    public function tsfs() {
        return $this->belongsTo(Tsf::class, 'modelo_ORG', 'modelo');
    }
}
