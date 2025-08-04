<?php
require_once __DIR__."/../dao/AlunoDAO.php";


class AlunoController{

    // private AlunoDAO $alunoDAO;

    // public function __construct(){
    //     $this->alunoDAO = new AlunoDAO();
    // }

    public static function listar(string $string = 'a.*'){
        return AlunoDAO::listar($string);
    }
    public static function insert(Aluno $aluno){
        $erros = [];
        $erro = AlunoDAO::insert($aluno);
        if($erro){
            $erros[] = "Erro ao salvar o Aluno";
            AMB_DEV ? $erros[]= $erro->getMessage() : null; 
        }
        return $erros;
    }
}