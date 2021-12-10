<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    use HasFactory;

    protected $table = 'fornecedores';
    protected $fillable = [
        'documento',
        'nome',
    ];

    public function produtos()
    {
        return $this->belongsToMany(Produto::class,'fornecedores_produtos');
    }
}
