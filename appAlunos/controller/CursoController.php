<?php

require_once __DIR__."/../dao/CursoDAO.php";



class CursoController{

    public static function listar(string $string = '*'){
        return CursoDAO::listar($string);
    }
}