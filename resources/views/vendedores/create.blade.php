<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=devide-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastrar um novo Vendedor</title>
</head>
<body>
    <form action="{{ route('registrar_vendedor') }}" method="POST">
        @csrf
        <label for="">Nome</label> <br/>
        <input type="text" name="nome"> <br/>
        <label for="">Produdo id</label> <br/>
        <input type="text" name="produto_id"> <br/>
        <button>Salvar</button>
    </form>
</body>
</html>