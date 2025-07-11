<?php
require_once __DIR__."/../util/Connection.php";
require_once __DIR__."/../model/Curso.php";


class CursoDAO{


    public static function listar(string $string){
        $sql = "SELECT $string FROM cursos";
        $stm = Connection::getConn()->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll();

        return CursoDAO::map($result);
    }

    private static function map($result){
        $cursos = [];
        foreach($result as $a){

            $id = isset($a['id']) ? $a['id'] : null;

            $nome = isset($a['nome']) ? $a['nome'] : null;

            $turno = isset($a['turno']) ? $a['turno'] : null;
            
            
            
            
            $curso = new Curso($id,$nome,$turno);
            $cursos[] = $curso;
        }
        return $cursos;
    }
}