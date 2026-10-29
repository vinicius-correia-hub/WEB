<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário</title>
</head>
<body>

    <form method="POST">
        <label>Nome</label>
        <input type="text" name="nome" required> <br><br>

        <label>RA: </label>
        <input type="number" name="ra" required> <br><br>

        <p>Sexo</p>
        <input type="radio" id="masculino" name="sexo" value="masculino" required>
        <label for="masculino">Masculino</label>
        <input type="radio" id="feminino" name="sexo" value="feminino" required>
        <label for="feminino">Feminino</label> <br><br>

        <label>Idade: </label>
        <input type="nmber" name="idade" required> <br><br>

        <label>Endereço: </label>
        <input type="text" name="endereco" required> <br><br>
        
        <label>Telefone: </label>
        <input type="tel" name="telefone" required> <br><br>

        <label>Email: </label>
        <input type="email" name="email" required> <br><br>

        <button type="submit">Cadastrar</button>

    </form>

    <?php
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        
    $nome = trim($_POST['nome'] ?? '');

    $ra = trim($_POST['ra'] ?? '');

    $sexo = trim($_POST['sexo'] ?? '');

    $idade = trim($_POST['idade'] ?? '');

    $endereco = trim($_POST['endereco'] ?? '');

    $telefone = trim($_POST['telefone'] ?? '');

    $email = trim($_POST['email'] ?? '');

    $novoAluno = [
        'nome' => $nome,
        'ra' => $ra,
        'sexo' => $sexo,
        'idade' => $idade,
        'endereco' => $endereco,
        'telefone' => $telefone,
        'email' => $email,
        'data_cadastro' => date ('Y-m-d H:i:s')
    ];

    $linha = json_encode($novoAluno) . PHP_EOL; //adicionar uma linha após a inserção no arquivo txt

    file_put_contents('bd.txt', $linha, FILE_APPEND);   
}
?>
    
</body>
</html>