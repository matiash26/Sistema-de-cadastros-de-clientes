<?php
require_once "top.php";
require_once "modules/historico.php";
$historico = new HistoricoDB();
$search = addslashes($_GET["search"] ?? "");
if(isset($_GET["search"])){
    $historico->setFiltro("WHERE c.nome like '%$search%' or c.telefone like '%$search%'");
}?>
<section id="listagem">
    <table id="table_listagem">
        <tr id="border-column">
            <td>Nome</td>
            <td>Telefone</td>
            <td>Entrega</td>
            <td>Produto</td>
            <td>Qtd</td>
            <td>Total</td>
            <td>Status</td>
        </tr>
        <?php foreach ($historico->select() as $row) {
            echo "<tr><td> $row->nome";
            echo "<td> $row->telefone";
            echo "<td> $row->entrega";
            echo "<td> $row->produto";
            echo "<td> $row->qtd";
            echo "<td> $row->valor";
            echo "<td> $row->status_p";
            echo $_SESSION["cargo"] == 2?"<td><a href='userinfo.php?id=$row->id'><span id='icon_edit' class='material-symbols-outlined edit'>edit</span></a></tr>":"</tr>";
        }?>
    </table>
</section>
</main>
</div>
<script src="js/pop-up.js"></script>
</body>

</html>