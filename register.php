<?php

    if(isset($_POST['submit']))
    {
        include_once('config.php');

        $nome = $_POST['nome'];
        $sobrenome = $_POST['sobrenome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $result = mysqli_query($conexao, "INSERT INTO usuarios(nome,sobrenome,email,senha) VALUES ('$nome','$sobrenome','$email','$senha')");
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="./assets/pages/index/index.css">
    <link rel="shortcut icon" href="./files/img/favicon.png" type="image/x-icon">
</head>
<body>
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
                                <h3>Inscrever-se</h3>
                            </div>
                            <form action="register.php" method="POST">
                                <div class="input">
                                    <img src="./files/img/user.png" alt="Nome do Usuário">
                                    <input type="text" name="nome" placeholder="Nome" required minlength="2" maxlength="20">
                                </div>
                
                                <div class="input">
                                    <img src="./files/img/user.png" alt="Sobrenome do usuário">
                                    <input type="text" name="sobrenome" placeholder="Sobrenome">
                                </div>
                    
                                <div class="input">
                                    <img src="./files/img/email.png" alt="Email do Usuário">
                                    <input type="email" name="email" placeholder="Email" required pattern="(^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$)">
                                </div>
                
                                <div class="input">
                                    <img src="./files/img/senha.png" alt="Senha">
                                    <input type="password" name="senha" placeholder="Crie uma senha" required>
                                </div>

                                <div class="input">
                                    <img src="./files/img/senha.png" alt="Confirmação de senha">
                                    <input type="password" name="confirmacaosenha" placeholder="Confirme sua senha" required>
                                </div>
    
                                <div id="btn">
                                    <input type="submit" id="btn-login-register" value="Cadastrar-se">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <footer class="footer-2">
        <div class="container footer">
            <div class="logo-footer">
                <img src="/files/img/logo-branco.png" alt="Logo-Footer">
            </div>
            <div class="descrition-footer">
                <a href="#">Ajuda</a>
                <a href="#">Termos de Uso</a>
                <a href="#">Política de Privacidade</a>
            </div>
        </div>
    </footer>
</body>
</html>

