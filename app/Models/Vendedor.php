<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendedor extends Model
{
    use HasFactory;

    protected $table = 'vendedores';

    protected $fillable = ['name', 'produto_id'];

    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }
}
