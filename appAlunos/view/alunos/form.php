<?php
require_once __DIR__."/../../controller/CursoController.php";

require_once __DIR__."/../include/header.php";

?>

<h1>Inserir Alunos</h1>

<div>
    <?=$msgErro?>
</div>

<form action="" method="post">
    <div>
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" placeholder="Informe o Nome">
    </div>

    <div>
        <label for="idade">Idade:</label>
        <input type="number" name="idade" id="idade" placeholder="Informe a Idade">
    </div>
    <div>
        <label for="estrang">Estrangeiro:</label>
        <select name="estrang" id="estrang">
            <option value="">---Selecione---</option>
            <option value="S">Sim</option>
            <option value="N">Não</option>
        </select>
    </div>
    <div>
        <label for="curso">Curso:</label>
        <select name="curso" id="curso">
            <option value="">---Selecione---</option>
            <?php foreach(CursoController::listar() as $curso): ?>

                <option value="<?= $curso->getId(); ?>"><?= $curso->getNomeTurno(); ?></option>

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