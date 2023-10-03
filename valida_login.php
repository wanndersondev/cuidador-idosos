<?php
// Conexão com o banco de dados (substitua com suas próprias credenciais)
$dbhost = 'Localhost';
$dbusername = 'root';
$dbpassword = '';
$dbName = 'cuidador-idosos';

$conexao = new mysqli($dbhost, $dbusername, $dbpassword, $dbName);

if (!$conexao) {
    die("Erro na conexão com o banco de dados: " . mysqli_connect_error());
}

// Receba os dados do formulário
$email = $_POST['email'];
$senha = $_POST['senha'];

// Consulta SQL para verificar se o email e senha correspondem a um registro no banco de dados
$query = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
$result = mysqli_query($conexao, $query);

if (!$result) {
    die("Erro na consulta ao banco de dados: " . mysqli_error($conexao));
}

// Verifique se o registro foi encontrado
if (mysqli_num_rows($result) == 1) {
    // Login bem-sucedido
    session_start();
    $_SESSION['email'] = $email; // Armazene o email do usuário na sessão
    header("Location: admin_medicines.php"); // Redirecione para a página de painel após o login
} else {
    // Login falhou
    echo "Email ou senha incorretos. Tente novamente.";
}

// Feche a conexão com o banco de dados
mysqli_close($conexao);
?>


