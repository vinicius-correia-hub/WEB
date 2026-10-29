
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
    if(file_exists($arquivo)){
        
        $conteudo = file($arquivo, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        foreach($conteudo as $linha){

            $info = json_decode($linha, true);

            if($info !== NULL){
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

    }
    ?>
</body>
</html>