<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Auditoria extends Model
{
    protected $table = 'sol_auditoria_solicitud';
    public $timestamps = false;
}
