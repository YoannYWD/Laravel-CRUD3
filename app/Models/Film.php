<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'image',
        'categorie_id'
    ];



    //Cardinalit√©
    public function categorie() {
        return $this->hasOne(Categorie::class);
    }
}
