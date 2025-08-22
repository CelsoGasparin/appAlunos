<?php
require_once __DIR__."/../../controller/AlunoController.php";
require_once __DIR__."/../../model/Curso.php";

isset($_GET['id']) ? $id = $_GET['id'] : header('location:listar.php');
    
$aluno = AlunoController::getById($id);
    
$aluno ? null : print('Aluno não Encontrado!<br><a href="listar.php">Voltar</a>') AND exit;


$erro = AlunoController::delete($aluno);

if(!$erro){
    header('location:listar.php');
}else{
    $msgErro = implode('<br>',$erro);
    print "<div style='color: red;'><$msgErro</div>";
    print "<a href='listar.php'>Voltar</a>";
}
