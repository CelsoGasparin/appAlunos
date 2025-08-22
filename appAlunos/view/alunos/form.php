<?php
require_once __DIR__."/../../controller/CursoController.php";

require_once __DIR__."/../include/header.php";

?>

<h1><?= $humForm  ?></h1>


<div class="row">

    <div class="col-6">
        <a href='listar.php' class="btn btn-outline-primary">Voltar</a>
        <form action="" method="post">
            <div>
                <label for="nome" class="form-label">Nome:</label>
                <input type="text"class="form-control" id="nome" name="nome" placeholder="Informe o Nome" value="<?= $aluno ? $aluno->getNome() : null ?>">
            </div>

            <div>
                <label for="idade" class="form-label">Idade:</label>
                <input type="number"class="form-control" name="idade" id="idade" placeholder="Informe a Idade" value="<?= $aluno ? $aluno->getIdade() : null ?>">
            </div>
            <div>
                <label for="estrang" class="form-label">Estrangeiro:</label>
                <select name="estrang" class="form-select" id="estrang">
                    <option value="">---Selecione---</option>
                    <option value="S" <?= $aluno && $aluno->getEstrangeiro()=='S' ? 'selected' : null ?>>Sim</option>
                    <option value="N" <?= $aluno && $aluno->getEstrangeiro()=='N' ? 'selected' : null ?>>Não</option>
                </select>
            </div>
            <div>
                <label for="curso" class="form-label">Curso:</label>
                <select name="curso" class="form-select" id="curso">
                    <option value="">---Selecione---</option>
                    <?php foreach(CursoController::listar() as $curso): ?>
                        
                        <option value="<?= $curso->getId(); ?>" <?= $aluno && $aluno->getCurso()->getId()==$curso->getId() ?'selected': null ?>><?= $curso->getNomeTurno(); ?></option>

                    <?php endforeach;?>
                </select>
            </div>
            
            <input type="hidden" name='id' value="<?= $aluno ? $aluno->getId() : 0 ;?>">

            


            <div>
                <button type="submit" class="btn btn-success mt-3">Submit</button>
            </div>
        </form>
    </div>
    <div class="col-2">
        <div style="color: black;background-color:red;border-radius:10px;border-color:black;">
            <?=$msgErro?>
        </div>
    </div>
</div>

<?php

require_once __DIR__.'/../include/footer.php';
?>