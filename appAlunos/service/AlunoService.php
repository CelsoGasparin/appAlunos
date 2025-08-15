<?php
require_once __DIR__."/../model/Aluno.php";
require_once __DIR__."/../controller/CursoController.php";

class AlunoService{


    public static function validarAluno(Aluno $aluno){
        $cursosID = CursoController::listar("id");
        $erros = [];
        // Valida o Nome
        if($aluno->getNome()==null){
            $erros[] = "Informe o Nome!";
        }

        // Valida a Idade
        if($aluno->getIdade()==null || !is_numeric($aluno->getIdade())){
            $erros[] = "Informe a Idade!";
        }

        // Valida Estrangeiro
        if(!in_array($aluno->getEstrangeiro(),['S','N'])){
            $erros[] = "marca o select de estrangeiro ai fazendo favor";
        }


        // Valida o Curso
        $i = 0;
        foreach($cursosID as $key => $curso){
            if($aluno->getCurso()->getId() != $curso->getId()){
                $i++;
            }
        }
        if($i == count($cursosID)){
            $erros[] = "Informe o Curso!";
        }
        

        return $erros;
    }
}

