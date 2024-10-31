<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tabela extends Model
{
    public $timestamps = false;
    protected $fillable = ['tempo','preco','id_classe'];
    use HasFactory;
}
