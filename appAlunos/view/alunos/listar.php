<?php


require_once __DIR__."/../../controller/AlunoController.php";
require_once __DIR__."/../../controller/CursoController.php";


$alunos = AlunoController::listar();

// print_r($alunos);
// print_r(CursoController::listar());

// Header da página
include_once __DIR__."/../include/header.php"; 
?>

    <h1>Listagens insanas</h1>
    
    <table border="1">
        <!-- Cabecalho -->
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Idade</th>
            <th>Estrangeiro</th>
            <th>Curso</th>
            <th></th>
            <th></th>
        </tr>
        <!-- Dados -->

        <?php foreach($alunos as $aluno): ?>
            <tr>
                <td><?= $aluno->getId() ?></td>
                <td><?= $aluno->getNome() ?></td>
                <td><?= $aluno->getIdade() ?></td>
                <td><?= $aluno->getEstrangeiroTexto() ?></td>
                <td><?= $aluno->getCurso()->getNomeTurno() ?></td>
                
            </tr>
        <?php endforeach; ?>
        
    </table>

<!-- Footer da Página -->
<?php include_once __DIR__."/../include/footer.php"; ?>