<?php
session_start();
if (!isset($_SESSION["usuario"])) : ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/login.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <title>Login</title>
    </head>

    <body>
        <div id="main-content">
            <main>
                <form action="modules/function/login.php" method="POST">
                    <?php
                    if (isset($_SESSION["msg-alert"])) {
                        echo "<div class='msg-alert'>{$_SESSION['msg-alert']}</div>";
                    } ?>
                    <h1>LOGIN</h1>
                    <div class="div_input">
                        <label>Usuário</label>
                        <div id="input_div">
                            <span class="material-symbols-outlined">person</span>
                            <input id="field_input" type="text" name="user" id="user" placeholder="Usuário">
                        </div>
                    </div>
                    <div class="div_input">
                        <label>Senha</label>
                        <div id="input_div">
                            <span class="material-symbols-outlined">lock</span>
                            <input id="field_input" type="password" name="password" id="password" placeholder="Senha">
                        </div>
                    </div>
                    <div id="login">
                        <input type="submit" id="button_login" value="Entrar">
                    </div>
                </form>
            </main>
        </div>
    </body>

    </html>
<?php
else :
    header("location: historico.php");
endif; ?>