<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mensalista extends Model
{
    public $timestamps = false;
    protected $fillable = ['placa','nome','sobrenome','telefone','email','status','id_classe'];
    use HasFactory;
}
