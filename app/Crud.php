<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Crud extends Model
{
    protected $fillable = [
        'titre', 'contenu', 'id_categorie'
    ];
}