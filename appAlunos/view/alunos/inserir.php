<?php
require_once __DIR__.'/../../controller/AlunoController.php';
require_once __DIR__.'/../../model/Aluno.php';

$msgErro = "";
print"<a href='listar.php'>Voltar</a>";
if($_POST!==[]){
    $nome    = trim($_POST['nome'])? trim($_POST['nome']): null;
    $idade   = is_numeric($_POST['idade']) ? $_POST['idade']:null;
    $estrang = trim($_POST['estrang']) ? trim($_POST['estrang']):null;
    $idCurso = is_numeric($_POST['curso']) ? $_POST['curso'] : null;

    // Cria um Objeto Curso
    $curso = new Curso($idCurso,null,null);

    // Cria um Objeto Aluno
    $aluno = new Aluno(null,$nome,$idade,$estrang,$curso);


    $erros = AlunoController::insert($aluno);

    if(!$erros){
        // Redireciona para o listar.php
        header('location:listar.php');
    }else{
        $msgErro = join("<br>",$erros);
        // print $msgErro;
    }
}







require_once "form.php";