<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = [
        'marca_id',
        'nome',
        'preco',
        'quantidade',
    ];

    public function marca()
    {
        return $this->belongsTo(Marca::class);
    }
}
