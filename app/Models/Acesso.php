<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acesso extends Model
{
    public $timestamps = false;
    protected $fillable = ['palca', 'id_classe','modelo','cor','obs','entrada','saida','permanencia','valor'];
    use HasFactory;
}
