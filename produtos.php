<?php
require_once "top.php";
require_once "modules/produtos.php";
$produtos = new ProdutoDB();?>

<body>
    <div id="main-content">
        <div id="listagem">
            <table id="table_listagem" class="table-side">
                <tr id="border-column">
                    <td>Produto</td>
                    <td>Preço</td>
                </tr>
                <?php
                foreach ($produtos->Select() as $row) {
                    echo "<tr><td> $row->produto";
                    echo "<td>R$: $row->valor";
                    echo "</tr>";
                } ?>
            </table>
        </div>
    </div>
    <script src="js/pop-up.js"></script>
</body>

</html>