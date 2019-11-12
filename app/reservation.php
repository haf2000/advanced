<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class reservation extends Model
{
// Table name
    protected $table = 'reservations';
    //Primary key
    public $primaryKey = 'id';
}
// on a fait un systeme de notifications , php artisan make:notifications et creer la table de notifications 