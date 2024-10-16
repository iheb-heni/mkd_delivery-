<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colis extends Model
{
    use HasFactory;

    // Define the table if it's different from the plural form of the model name
    // protected $table = 'colis';

    // Define the fillable fields
    protected $fillable = [
        'contenus',
        'prix',
        'quantité',
        'nom_client',
        'tel_client',
        'email_client',
        'status',
    ];

    // If you have timestamps in your table, keep this default setting
    public $timestamps = true;
}
