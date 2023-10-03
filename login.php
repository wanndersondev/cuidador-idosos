<?php

    if(isset($_POST['submit']))
    {
        include_once('config.php');
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $result = mysqli_query($conexao, "INSERT INTO usuarios(email,senha) VALUES ('$email','$senha')");
    }

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cuidador</title>
    <link rel="stylesheet" href="./assets/pages/index/index.css">
    <link rel="shortcut icon" href="./files/img/favicon.png" type="image/x-icon">
</head>
<body>
    </header>
    <main>
        <section id="login-register">
            <div class="container bg-login-register">
                <div class="bg-form">
                    <!-- Figura -->
                    <div class="figure">
                        <div class="img-fig">
                            <img src="./files/img/v869-wan-17.jpg" alt="Figura">
                        </div>
                    </div>
                    <!-- Formulário Login -->
                    <div class="container__login-register">
                        <div class="form">
                            <div class="title-form">
                                <h3>Login</h3>
                            </div>
                            <form action="valida_login.php" method="POST">
                                <div class="input">
                                    <img src="./files/img/email.png" alt="Email do Usuário">
                                    <input type="email" name="email" placeholder="Email" required pattern="(^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$)">
                                </div>
                
                                <div class="input">
                                    <img src="./files/img/senha.png" alt="Senha">
                                    <input type="password" name="senha" placeholder="Crie uma senha" required>
                                </div>
                                <div id="btn">
                                    <input type="submit" id="btn-login-register" value="Fazer login">
                                </div>
                                <div class="options-register">
                                    <p>Não tem uma conta?</p>
                                    <a href="http://localhost/cuidador-idosos/register.php">Inscrever-se</a>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>
</html>