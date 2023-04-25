<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
</head>
<body>
    <h1>Alterar Aluno</h1>
    <form action="buscarAluno.php" method="POST">
        nome: <input type="text" name="nome" value = <?php echo "'$nome'"?>><br>
        cpf: <input type="text" name="cpf"><br>
        Matricula: <input type="text" name="matricula"><br>
        dtIngresso: <input type="text" name="dtIngresso"><br><br>
        <input type="submit" value="alterar"><br>
    </form>
</body>
</html>