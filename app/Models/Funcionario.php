<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    
    protected $table = 'Funcionarios';
    protected $fillable = ['id','nome'];
    public $timestamps = false;
}
