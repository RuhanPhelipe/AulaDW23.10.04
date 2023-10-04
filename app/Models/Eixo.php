<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Eixo extends Model {
    
    use HasFactory, SoftDeletes;

    public function sala() {
        return $this->hasOne('\App\Models\Sala');
    }

    public function curso() {
        return $this->hasMany('\App\Models\Curso');
    }
 
}
