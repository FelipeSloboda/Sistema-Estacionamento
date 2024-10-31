<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    public $timestamps = false;
    protected $fillable = ['classe'];
    use HasFactory;
}
