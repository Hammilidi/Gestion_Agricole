<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Intervention extends Model
{
    use HasFactory;
    protected $primaryKey = 'int_debut';
    public $incrementing = false;
    protected $keyType = 'date';

    protected $casts = ['int_debut' => 'datetime:yyyy-MM-dd'];

    protected $fillable = [
        'int_emp_nss',
        'int_par_id',
        'int_debut',
        'int_nb_jrs',
    ];
}
