<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>CRUD ALUNOS</title>
</head>
<body>
<h1 class="titulo-principal">Listar Disciplinas</h1>
    <a class="botao-inserir" href="inserirAluno.php">+ Inserir Aluno </a>
    <?php
    $arqDisc = fopen("disciplinas.txt", "r") or die ("erro ao criar arquivo");
    $cabecalho= explode(";", fgets($arqDisc));
    ?>
    <table class="tabela-alunos" style="border: 1px solid;">
        <tr>
            <th style="border: 1px solid;"><?php echo $cabecalho[0]?></th>
            <th style="border: 1px solid;"><?php echo $cabecalho[1]?></th>
            <th style="border: 1px solid;"><?php echo $cabecalho[2]?></th>
            <th style="border: 1px solid;"><?php echo $cabecalho[3]?></th>
            <th>Ações</th>
        </tr>
       
        <?php while(!feof($arqDisc)){
            $info= explode(";", fgets($arqDisc));?>
            <tr>
                <td style="border: 1px solid;"><?php echo $info[0]?></td>
                <td style="border: 1px solid;"><?php echo $info[1]?></td>
                <td style="border: 1px solid;"><?php echo $info[2]?></td>
                <td style="border: 1px solid;"><?php echo $info[3]?></td>
                <td>
                <a href="alterarAluno.php?matricula=<?php echo $info[2]?>"><button class="botao-alterar">Alterar</button></a>
                <a href="removerAluno.php?matricula=<?php echo $info[2]?>"><button class="botao-remover">Remover</button></a> 
                </td>
            </tr>
        <?php }fclose($arqDisc);?>

</body>
</html>