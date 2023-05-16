<?php 
    $matricula = ""; 
    $txt = "";

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
        header("location: /Trabalhos/CrudEmPHP/index.php");
        exit;
    }
?>