<?php

namespace App\Http\Controllers;

use App\Models\Vendedor;
use Illuminate\Http\Request;

class VendedorController extends Controller
{
    public function create()
    {
        return view('vendedores.create');
    }

    public function store(Request $request)
    {
        Vendedor::create([
            'name' => $request->nome,
            'produto_id' => $request->produto_id,
        ]);

        return "Vendedor cadastrado com sucesso!";
    }
}
