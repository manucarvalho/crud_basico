<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Exports\ProdutosExport;
use Maatwebsite\Excel\Facades\Excel;
//use Knp\Snappy\Pdf;
use Barryvdh\DomPDF\Facade\Pdf;

class ProdutosController extends Controller
{
    public function create()
    {
        return view('produtos.create');
    }

    public function store(Request $request)
    {
        Produto::create([
            'name' => $request->nome,
            'custo' => $request->custo,
            'preco' => $request->preco,
            'quantidade' => $request->quantidade,
        ]);

        return "Produto criado com sucesso!";
    }

    public function show($id)
    {
        $produto = Produto::findOrFail($id);
        return view('produtos.show', ['produto' => $produto]);
    }

    public function edit($id)
    {
        $produto = Produto::findOrFail($id);
        return view('produtos.edit', ['produto' => $produto]);
    }

    public function update(Request $request, $id)
    {
        $produto = Produto::findOrFail($id);
        $produto->update([
            'name' => $request->nome,
            'custo' => $request->custo,
            'preco' => $request->preco,
            'quantidade' => $request->quantidade,
        ]);

        return "Produto atualizado com sucesso!";
    }

    public function delete($id)
    {
        $produto = Produto::findOrFail($id);
        return view('produtos.delete', ['produto' => $produto]);
    }

    public function destroy($id)
    {
        $produto = Produto::findOrFail($id);
        $produto->delete();
        return "Produto excluído com sucesso!";
    }

    public function index()
    {
        $produtos = Produto::all();
        foreach($produtos as $produto){
            $produto->load('vendedores');
        }

        return view('produtos.index', compact('produtos'));
    }

    public function export() 
    {
        return Excel::download(new ProdutosExport, 'produtos.csv', \Maatwebsite\Excel\Excel::CSV);
    }

    public function exportPDF()
    {
        /*$myProjectDirectory = 'C:\Users\Manuela\crud_basico';

        $snappy = new Pdf($myProjectDirectory . '/vendor/h4cc/wkhtmltopdf-i386/bin/wkhtmltopdf-i386');
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="teste.pdf"');
        echo $snappy->getOutput('127.0.0.1:8000/produtos');*/

        $produtos = Produto::all();

        $pdf = Pdf::loadView('produtos.index', compact('produtos'));
        return $pdf->download('produtos.pdf');
    }
}
