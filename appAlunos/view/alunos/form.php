<?php
require_once __DIR__."/../../controller/CursoController.php";

require_once __DIR__."/../include/header.php";

?>

<h1><?= $humForm  ?></h1>

<div style="color: red;">
    <?=$msgErro?>
</div>

<form action="" method="post">
    <div>
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" placeholder="Informe o Nome" value="<?= $aluno ? $aluno->getNome() : null ?>">
    </div>

    <div>
        <label for="idade">Idade:</label>
        <input type="number" name="idade" id="idade" placeholder="Informe a Idade" value="<?= $aluno ? $aluno->getIdade() : null ?>">
    </div>
    <div>
        <label for="estrang">Estrangeiro:</label>
        <select name="estrang" id="estrang">
            <option value="">---Selecione---</option>
            <option value="S" <?= $aluno && $aluno->getEstrangeiro()=='S' ? 'selected' : null ?>>Sim</option>
            <option value="N" <?= $aluno && $aluno->getEstrangeiro()=='N' ? 'selected' : null ?>>Não</option>
        </select>
    </div>
    <div>
        <label for="curso">Curso:</label>
        <select name="curso" id="curso">
            <option value="">---Selecione---</option>
            <?php foreach(CursoController::listar() as $curso): ?>
                
                <option value="<?= $curso->getId(); ?>" <?= $aluno && $aluno->getCurso()->getId()==$curso->getId() ?'selected': null ?>><?= $curso->getNomeTurno(); ?></option>

            <?php endforeach;?>
        </select>
    </div>
    
    <div>
        <button type="submit">Submit</button>
    </div>
</form>



<?php

require_once __DIR__.'/../include/footer.php';
?>