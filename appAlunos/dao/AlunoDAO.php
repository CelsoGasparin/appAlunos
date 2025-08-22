<?php



require_once __DIR__."/../util/Connection.php";
require_once __DIR__."/../model/Aluno.php";
require_once __DIR__."/../model/Curso.php";


class AlunoDAO{

    // private PDO $conn;


    // public function __construct(){
    //     $this->conn = Connection::getConn();
    // }

    
    public static function insert(Aluno $aluno){
        try{
            $sql = "insert into alunos(nome,idade,estrangeiro,id_curso) values(?,?,?,?)";
            $stm = Connection::getConn()->prepare($sql);
            $stm->execute([$aluno->getNome(),$aluno->getIdade(),$aluno->getEstrangeiro(),$aluno->getCurso()->getId()]);
            return null;
        }catch(PDOException $e){
            return $e;
        }
    }

    public static function alterar(Aluno $aluno){
        try{
            $sql = "UPDATE alunos SET nome = ? ,idade = ? ,estrangeiro = ? ,id_curso = ?  WHERE id = ?";
            $stm = Connection::getConn()->prepare($sql);
            $stm->execute([$aluno->getNome(),$aluno->getIdade(),$aluno->getEstrangeiro(),$aluno->getCurso()->getId(),$aluno->getId()]);
            return null;
        }catch(PDOException $e){
            return $e;
        }
    }

    public static function delete(Aluno $aluno ,$condicao){
        try{
            $sql = "DELETE FROM alunos WHERE $condicao = ?";
            $stm = Connection::getConn()->prepare($sql);
            switch(strtolower($condicao)){
                case'id_curso':
                    $stm->execute([$aluno->getCurso()->getId()]);
                break;
                
                default:
                    $metodo = 'get'.ucfirst($condicao);
                    $stm->execute([$aluno->$metodo()]);
                break;
            }
            return null;
        }catch(PDOException $e){
            return $e;
        }
    }


    public static function listar(string $string){
        // $sql = "SELECT $string FROM alunos";
        $sql = "SELECT $string,c.nome nome_curso, c.turno turno_curso FROM alunos a JOIN cursos c ON (c.id = a.id_curso) ORDER BY c.nome,a.nome";
        $stm = Connection::getConn()->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll();

        return AlunoDAO::map($result);
    }

    public static function getById($id){
        $sql = "SELECT a.*,c.nome nome_curso, c.turno turno_curso FROM alunos a JOIN cursos c on (c.id = a.id_curso) WHERE a.id = ?";
        $stm = Connection::getConn()->prepare($sql);
        $stm->execute([$id]);
        $result = $stm->fetchAll();
        $aluno = AlunoDAO::map($result);
        
        return count($aluno) > 0 ? $aluno[0] : null;
    }

    private static function map($result){
        $alunos = [];
        foreach($result as $a){

            $id = isset($a['id']) ? $a['id'] : null;

            $nome = isset($a['nome']) ? $a['nome'] : null;

            $idade = isset($a['idade']) ? $a['idade'] : null;
            
            $estrangeiro = isset($a['estrangeiro']) ? $a['estrangeiro'] : null;
            
            if(isset($a['id_curso'])){
                $curso = new Curso($a['id_curso'],$a['nome_curso'],$a['turno_curso']);
                
            }else{
                $curso = null;
            }

            $aluno = new Aluno($id,$nome,$idade,$estrangeiro,$curso);
            $alunos[] = $aluno;
        }
        return $alunos;
    }
}