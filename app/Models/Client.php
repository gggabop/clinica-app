<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $table = 'clients'; // Nombre de la tabla en la base de datos

    protected $fillable = [ // Campos que se pueden llenar masivamente
        'name',
        'lastName',
        'typeOfDocument',
        'historyNumber',
        'documentNumber',
        'email',
        'phone',
        'address',
        'postalCode',
        'city',
        'estate',
        'country',
    ];
}
