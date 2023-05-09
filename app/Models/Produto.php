<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Produto extends Model
{
    use HasFactory;

    protected $table = "produtos";

    public function TabelaUserRelacionamento(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function TabelaCategoriaRelacionamento(): BelongsTo
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }
}
