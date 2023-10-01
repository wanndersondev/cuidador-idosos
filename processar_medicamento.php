<?php
include_once('config.php');

if (isset($_POST['nome_medicamento']) && isset($_POST['id_paciente'])) {
  $nome_medicamento = $_POST['nome_medicamento'];
  $id_paciente = $_POST['id_paciente'];

  // Adicione a lógica para inserir o medicamento no banco de dados associado ao paciente
  $sql = "INSERT INTO medicamentos (nome_medicamento, id_paciente) VALUES ('$nome_medicamento', $id_paciente)";

  if ($conexao->query($sql) === TRUE) {
    header('Location: admin_medicines.php?success=1');
    exit();
  } else {
    echo "Erro ao adicionar medicamento: " . $conexao->error;
  }
}
