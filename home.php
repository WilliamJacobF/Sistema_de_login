<?php 
//Protegendo a pagina
session_start();
if (!isset($_SESSION['logado'])){
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acesso Restrito</title>
    <Style>
        h1 {
            text-align: center;
        }
        p {
            text-align: center;
        }
        .logout {
            text-align: center;
        }
    </Style>
</head>
<body>
    <h1>SUCESSO AO EFETUAR O LOGIN</h1>
<?php
require_once 'conect.php';
mysqli_close($connect);
?>
<p>BEM VINDO</p>
<div class="logout">
    <a href="logout.php">Encerrar a sessão</a>
</div>

</body>
</html>
