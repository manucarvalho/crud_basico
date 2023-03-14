<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=devide-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listar produtos</title>
</head>
<body>
    <h1>Listagem produtos</h1>
    @forelse ($produtos as $produto)
        <p>{{$produto->name}} - R${{$produto->preco}}</p>
        @forelse ($produto->vendedores as $vendedor)
            <p>{{ $vendedor->nome }}</p>
        @empty
            <p>Nenhum vendedor encontrado</p>
        @endforelse
    @empty
        <p>Nenhum produto encontrado</p>
    @endforelse
    <a class="btn btn-danger float-end" href="{{ route('produtos_export') }}">Export CSV</a>
    <a class="btn btn-danger float-end" href="{{ route('produtos_export_pdf') }}">Export PDF</a>
</body>
</html>