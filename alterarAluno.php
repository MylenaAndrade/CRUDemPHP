<?php 
    $nome = "";
    $cpf = "";
    $matricula = ""; 
    $dtIngresso = "";
    $arqDisc = "";

    if($_SERVER["REQUEST_METHOD"] == "GET"){
        
        $matricula=$_GET["matricula"];
        $arquivoDisc = fopen("disciplinas.txt", "r");
        $arquivoNovo = "";
        $arquivoNomeVelho = "disciplina.txt";
        $arquivoNomeNovo ="disciplinas.txt";
        while(!feof($arquivoDisc)){
            $linhas[] = fgets($arquivoDisc);
        }

        fclose($arquivoDisc);
        
        foreach($linhas as $linha){
            $colunaDados = explode(";", $linha);
            if($colunaDados[2] != $matricula){
                if(!file_exists("disciplina.txt")){
                    $arquivoNovo = fopen("disciplina.txt", "w") or die("erro ao criar arquivo");
                    $txt = "Nome;CPF;Matricula;Data de ingresso\n";
                    fwrite($arquivoNovo, $txt);
                    fclose($arquivoNovo);
                }else{
                    $arquivoNovo = fopen("disciplina.txt", "a") or die("erro ao criar arquivo");
                    fwrite($arquivoNovo,$linha);
                    fclose($arquivoNovo);
                }
                
            }
        }

        unlink("disciplinas.txt");
        rename($arquivoNomeVelho, $arquivoNomeNovo);
    }else{
        $nome = $_POST["nome"];
        $cpf = $_POST["cpf"];
        $matricula = $_POST["matricula"];
        $dtIngresso = $_POST["dtIngresso"];
        
        $arqDisc = fopen("disciplinas.txt", "a") or die("erro ao criar arquivo");
        $linha = $nome . ";" . $cpf . ";" . $matricula . ";" . $dtIngresso;
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
    <title>Alterar Aluno</title>
</head>
<body class="inserir-aluno">
<form method="POST">
    <h1 class="inserir-aluno-titulo">Alterar Aluno</h1>
    <label class="inserir-aluno-informacao">Nome:</label>     
    <br>
    <input type="text" name="nome">
    <br><br>
    <label class="inserir-aluno-informacao">CPF:</label>
    <br>
    <input type="text" name="cpf">
    <br><br>
    <label class="inserir-aluno-informacao">Matrícula:</label>
    <br>
    <input type="text" name="matricula" readonly value=<?php echo "'" . $matricula . "'"?>>
    <br><br>
    <label class="inserir-aluno-informacao">Data de ingresso:</label>
    <br>
    <input type="text" name="dtIngresso" value="<?php echo $dtIngresso?>">
    <br><br>
    <input class="botao-alterar-aluno" type="submit" value="Alterar">
    </form>
</body>
</html>