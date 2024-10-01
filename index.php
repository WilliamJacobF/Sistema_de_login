<?php 
// Conexão com DB
require_once 'conect.php';
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de login</title>
    <style>
        h1 {
            text-align: center;
        }
        h2 {
            position: absolute;
            top: 35%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        .formulario {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        input {
            padding: 9px;
        }
    </style>
</head>
<body>
    <?php 
    // verificação 
    if (isset($_POST['entrar'])){
        $Login = mysqli_escape_string($connect, $_POST['login']);
        $Senha = mysqli_escape_string($connect, $_POST['senha']);

        if (empty($Login) or empty($Senha)){
            echo "<br>usuario e/ou senha não preenchidos";
        } else {
            $sql = "SELECT login FROM usuario WHERE login = '$Login'";
            $resultado = mysqli_query($connect, $sql);

            if (mysqli_num_rows($resultado) > 0){
                $sql = "SELECT * FROM usuario WHERE login = '$Login' AND senha = '$Senha'";
                $resultado = mysqli_query($connect, $sql);

                if (mysqli_num_rows($resultado) == 1){
                    $dados = mysqli_fetch_array($resultado);
                    $_SESSION['logado'] = true;
                    $_SESSION['id_usuario'] = $dados['id'];
                    header('location: home.php');
                } else {
                    echo "<br>a senha não confere com o usuario";
                }
            } else {
                echo "<br>usuario não existe";
            }
        }
    }
    ?>

    <!-- Formulario -->
    <h1>Login</h1>
    <hr>
    <h2>Insira o usuario e senha</h2>
     <div class="formulario">
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
        <input type="text" name ="login" placeholder="Usuario"><br>
        <input type="password" name ="senha" placeholder="Senha"><br>
        <input type="submit" name="entrar">
        </form>
     </div>
        <p>USUARIO: login@gmail.com<br>SENHA: senha123</p>
</body>
</html>