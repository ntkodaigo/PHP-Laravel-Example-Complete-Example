<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    protected $table ='pais';
    protected $primaryKey = 'idpais';
    protected $fillable = ['nombrepais'];
    public $timestamps =false;
}
