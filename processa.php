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

    /*header('Location: exibicao.php');
    exit;*/
}


