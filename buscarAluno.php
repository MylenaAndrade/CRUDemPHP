<?php 

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $matricula = $_POST["matricula"];
    
    $arquivoAlunoIn = fopen("alunosNovos.txt", "r") or die("erro ao criar arquivo");
    
    while(!feof($arquivoAlunoIn)){
        $linhas[] = fgets($arquivoAlunoIn);
    }

    fclose($arquivoAlunoIn);
    
    foreach($linhas as $linha){
        $colunaDados = explode(";", $linha);
        if($colunaDados == $matricula){
            $txt = "$nome;$matricula;$dtNasc;$email;$cpf;$fone;$endereço;$cidade";
        }else{
            $txt = $linha;
        }
    }
}



?>

?>