<?php
$nome = "";
$cpf = "";
$matricula = "";
$dtIngresso = "";
$linha = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $nome = $_POST["nome"];
    $cpf = $_POST["cpf"];
    $matricula = $_POST["matricula"];
    $dtIngresso = $_POST["dtIngresso"];

    if(!file_exists("disciplinas.txt")){
        $arqDisc = fopen("disciplinas.txt", "w") or die("erro ao criar arquivo");
        $linha = "Nome;CPF;Matricula;Data de ingresso";
        fwrite($arqDisc, $linha);
        fclose($arqDisc);
    }
    
    $arqDisc = fopen("disciplinas.txt", "a") or die("erro ao criar arquivo");
    $linha = "\n" . $nome . ";" . $cpf . ";" . $matricula . ";" . $dtIngresso;
    fwrite($arqDisc,$linha);
    fclose($arqDisc);

    header("location: /Trabalhos/CrudEmPHP/index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>CRUD</title>
</head>
<body class="inserir-aluno">
    <form method="POST">
    <h1 class="inserir-aluno-titulo">Inserir Aluno</h1>
    <label class="inserir-aluno-informacao">Nome:</label>     
    <br>
    <input type="text" name="nome">
    <br><br>
    <label class="inserir-aluno-informacao">CPF:</label>
    <br>
    <input type="text" name="cpf">
    <br><br>
    <label class="inserir-aluno-informacao">Matricula:</label>
    <br>
    <input type="text" name="matricula">
    <br><br>
    <label class="inserir-aluno-informacao">Data de ingresso:</label>
    <br>
    <input type="text" name="dtIngresso">
    <br><br>
     <input type="submit" value="Adicionar Aluno">
    </form>
</body>
</html>