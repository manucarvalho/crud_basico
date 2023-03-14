<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\Produto;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProdutosExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        $produto = Produto::select('id','name', 'custo', 'preco', 'quantidade')->get();
        $produto->load('vendedores');
        return $produto;
        //return Produto::get('id','name', 'custo', 'preco', 'quantidade');
        //return Produto::get('id','name', 'custo', 'preco', 'quantidade')->with('vendedores');
    }

    public function headings(): array
    {
        return ['ID', 'Nome', 'Custo', 'Preco', 'Quantidade', 'Vendedores'];
    }
}