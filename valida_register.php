<?php
include_once('config.php'); // Incluindo as configurações de conexão

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Verificando se todos os campos foram preenchidos
  if (isset($_POST['nome']) && isset($_POST['sobrenome']) && isset($_POST['email']) && isset($_POST['senha']) && isset($_POST['confirmacaosenha'])) {
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $confirmacaosenha = $_POST['confirmacaosenha'];

    // Verificando se as senhas coincidem
    if ($senha === $confirmacaosenha) {
      // Preparando a consulta SQL
      $sql = "INSERT INTO usuarios (nome, sobrenome, email, senha) VALUES ('$nome', '$sobrenome', '$email', '$senha')";

      // Executando a consulta
      if ($conexao->query($sql) === TRUE) {
        echo "Registro salvo com sucesso!";
        header('Location: admin_medicines.php');
      } else {
        echo "Erro ao salvar o registro: " . $conexao->error;
      }
    } else {
      echo "As senhas não coincidem.";
    }
  } else {
    echo "Por favor, preencha todos os campos.";
  }
} else {
  echo "Método inválido. Use o método POST.";
}

// Fechando a conexão
$conexao->close();
