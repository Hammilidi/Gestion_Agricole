<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarif extends Model
{
    use HasFactory;


    protected $primaryKey = 'tar_description';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $casts = ['tar_description' => 'string'];


    protected $fillable = [
        'tar_description',
        'tar_ero',
    ];

    public function employe()
    {
        return $this->belongsTo(Employe::class);
    }
}
