<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sala extends Model {

    use HasFactory, SoftDeletes;
    
    public function eixo() {
        return $this->belongsTo('\App\Models\Eixo');
    }
}
