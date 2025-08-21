<?php
require_once __DIR__."/../dao/AlunoDAO.php";
require_once __DIR__."/../service/AlunoService.php";

class AlunoController{

    // private AlunoDAO $alunoDAO;

    // public function __construct(){
    //     $this->alunoDAO = new AlunoDAO();
    // }

    public static function listar(string $string = 'a.*'){
        return AlunoDAO::listar($string);
    }
    public static function getById($id){
        return AlunoDAO::getById($id);
    }
    public static function insert(Aluno $aluno){
        $erros = [];
        $erros = AlunoService::validarAluno($aluno);

        if($erros!==[]){
            return $erros;
        }
        // print_r($erros);
        // exit;
        $erro = AlunoDAO::insert($aluno);
        if($erro){
            $erros[] = "Erro ao salvar o Aluno";
            AMB_DEV ? $erros[]= $erro->getMessage() : null; 
        }
        return $erros;
    }
    public static function alterar(Aluno $aluno){
        $erros = [];
        $erros = AlunoService::validarAluno($aluno);

        if($erros!==[]){
            return $erros;
        }
        // print_r($erros);
        // exit;
        $erro = AlunoDAO::alterar($aluno);
        if($erro){
            $erros[] = "Erro ao Editar o Aluno";
            AMB_DEV ? $erros[]= $erro->getMessage() : null; 
        }
        return $erros;
    }
    public static function delete(Aluno $aluno,$condicao ='id'){
        $erros = [];
        $erros = AlunoService::validarAluno($aluno);

        if($erros!==[]){
            return $erros;
        }
        // print_r($erros);
        // exit;
        $erro = AlunoDAO::delete($aluno,$condicao);
        if($erro){
            $erros[] = "Erro ao deletar o Aluno";
            AMB_DEV ? $erros[]= $erro->getMessage() : null; 
        }
        return $erros;
    }
}