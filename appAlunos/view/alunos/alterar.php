<?php
require_once __DIR__."/../../model/Aluno.php";
require_once __DIR__."/../../controller/AlunoController.php";
$humForm = "Alterar Aluno";
$msgErro = "";
$aluno = null;



if($_POST!==[]){

    $id = $_POST['id'];
    $nome    = trim($_POST['nome'])? trim($_POST['nome']): null;
    $idade   = is_numeric($_POST['idade']) ? $_POST['idade']:null;
    $estrang = trim($_POST['estrang']) ? trim($_POST['estrang']):null;
    $idCurso = is_numeric($_POST['curso']) ? $_POST['curso'] : null;
    // Cria um Objeto Curso
    $curso = new Curso($idCurso,null,null);
    
    // Cria um Objeto Aluno
    $aluno = new Aluno($id,$nome,$idade,$estrang,$curso);
    
    
    $erros = AlunoController::alterar($aluno);
    if(!$erros){
        // Redireciona para o listar.php
        header('location:listar.php');
    }else{
        
        $msgErro = join("<br>",$erros);
    //    print $msgErro;
    }
}else{
    isset($_GET['id']) ? $id = $_GET['id'] : header('location:listar.php');
    
    $aluno = AlunoController::getById($id);
    
    isset($aluno) ? null: header('location:listar.php');

}
require_once __DIR__."/form.php";