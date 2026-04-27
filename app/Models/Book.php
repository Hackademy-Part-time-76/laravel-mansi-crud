<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'libri'; //solo se abbiamo sbagliato nopme alla tabella o stiamo usando dei dati sporchi
    protected $fillable = ['name', 'pages', 'year', 'image', 'author_id'];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }
}
