
<?php
$arquivo = 'bd.txt';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exibição do cadastro</title>   
</head>
<body>
    <a href="formulario.php">Página de cadastro</a>
    <br><br>
    <?php
    //verficando se o arquivo existe e caso exista, ele lê o conteúdo do arquivo e exibe os dados dos alunos cadastrados.
    if(file_exists($arquivo)){
        
        //função file() lê o conteudo do arquivo e retorna um vetor
        $conteudo = file($arquivo, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        //vetor vazio para armazenar os dados de alunos
        $alunos = [];

        //percorrendo o vetor de conteúdo do arquivo e decodificando cada linha do arquivo 
        foreach($conteudo as $linha){
            $info = json_decode($linha, true);

            if($info !== NULL){
                $alunos[] = $info;
            }
        }

        //A função usort será utilizada para ordernar o array
        //de acordo com o RA do aluno
        //É necessário realizar o casting para int pois RA advindo do txt é tratado como string
        //A função "<=>" é utilizada para comparar os valores de RA dos alunos
        usort($alunos, function($a, $b){
            return (int) $a['ra'] <=> (int) $b['ra'];
        });


        //Percorrendo o vetor de alunos e exibindo as informações de cada um deles na tela
        foreach($alunos as $info){
            echo "Nome: " . $info['nome'] . "<br>" .
            "\nRA: " . $info['ra'] . "<br>" .
            "\nSexo: " . $info['sexo'] . "<br>" .
            "\nIdade: " . $info['idade'] . "<br>".
            "\nEndereco: " . $info['endereco'] . "<br>".
            "\nTelefone: " . $info['telefone'] . "<br>".
            "\nEmail: " . $info['email'] . "<br>";
            echo "<hr>";
        }

    }
    ?>
</body>
</html>