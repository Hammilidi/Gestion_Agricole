<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parcelle extends Model
{
    use HasFactory;
    protected $primaryKey = 'par_id';
    protected $fillable = [
        'par_nom',
        'emp_lieu',
        'par_superficie',
        'par_prop',
    ];
    public function agriculteurs()
    {
        return $this->hasMany(Agriculteur::class);
    }
    public function employes()
    {
        return $this->hasMany(Employe::class, 'int_emp_nss');
    }
}
