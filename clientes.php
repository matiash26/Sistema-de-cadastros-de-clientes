<?php 
require_once "top.php";
require_once "modules/clientes.php";
require_once "modules/historico.php";
$clientes = new ClienteDB();
$historico = new HistoricoDB();?>

<div id="clientes">
<div id="listagem">
    <table id="table_listagem" class="table-side">
            <tr id="border-column">
                <td>Nome</td>
                <td>Telefone</td>
            </tr>
            <?php
            foreach($clientes->select() as $row){
                echo"<td> $row->nome";
                echo"<td> $row->telefone</tr>";
            }?>
        </table>
</div>
</div>
<script src="js/pop-up.js"></script>
</main>
</div>
</body>
</html>