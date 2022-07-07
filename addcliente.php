<?php
require_once "modules/produtos.php";
$produto = new ProdutoDB();
?>
<div id="popaUp_add">
    <div id="formulario">
        <form action="modules/function/funcao.php" method="POST" id="formpopup" class="popup">
            <span id="pop_up_exit">&times;</span>
            <h2>Adicionar Cliente</h2>
            <div>
                <label class="labels">Nome</label>
                <input type="text" name="nome" id="nome" class="fields" placeholder="Nome">
            </div>
            <div>
                <label class="labels">Telefone</label>
                <input type="tel" name="telefone" id="telefone" class="fields">
            </div>
            <div>
                <label class="labels">Produto</label>
                <select name="produtos" id="select" class="fields">
                    <?php foreach ($produto->Select() as $row) {
                        echo "<option value='$row->id'>$row->produto</option>";
                    } ?>
                </select>
            </div>
            <div id="qtd-data">
                <div id="qtd">
                    <label class="labels">Quantidade</label>
                    <input type="number" name="quantidade" id="qtd" min="1" placeholder="QTD">
                </div>
                <div id="data">
                    <label class="labels">Data</label>
                    <input type="date" name="data" id="data">
                </div>
            </div>
            <div>
                <input type="submit" value="Adicionar Cliente" id="adicionar" name="botao">
            </div>
        </form>
    </div>
</div>