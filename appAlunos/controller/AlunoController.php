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
}