<?php
require_once __DIR__."/../../controller/AlunoController.php";

isset($_GET['id']) ? $id = $_GET['id'] : header('location:listar.php');
    
$aluno = AlunoController::getById($id);
    
isset($aluno) ? null: header('location:listar.php');





$erro = AlunoController::delete($aluno);

if(!$erro){
    header('location:listar.php');
}else{
    $msgErro = implode('<br>',$erro);
    print "<div style='color: red;'><$msgErro</div>";
    print "<a href='listar.php'>Voltar</a>";
}
