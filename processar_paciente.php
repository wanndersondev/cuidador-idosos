<?php
include_once('config.php');

if (isset($_POST['nome_paciente']) && isset($_POST['sobrenome_paciente']) && isset($_POST['email_paciente']) && isset($_POST['idade']) && isset($_POST['tipo_sanguineo']) && 
isset($_POST['diabetes_type']) && isset($_POST['insulina_type']) && isset($_POST['dosagem_atual']) &&
isset($_POST['ultima_medicao_glicose']) && isset($_POST['frequencia_aplicacao']) && isset($_POST['horario_aplicacao']) 
&& isset($_POST['medico_responsavel']) && isset($_POST['contato_medico'])) {

  $nome_paciente = $_POST['nome_paciente'];
  $sobrenome_paciente = $_POST['sobrenome_paciente'];
  $email_paciente = $_POST['email_paciente'];
  $idade = $_POST['idade'];
  $tipo_sanguineo = $_POST['tipo_sanguineo'];
  $diabetes_type = $_POST['diabetes_type'];
  $insulina_type = $_POST['insulina_type'];
  $dosagem_atual = $_POST['dosagem_atual'];
  $ultima_medicao_glicose = $_POST['ultima_medicao_glicose'];
  $frequencia_aplicacao = $_POST['frequencia_aplicacao'];
  $horario_aplicacao = $_POST['horario_aplicacao'];
  $medico_responsavel = $_POST['medico_responsavel'];
  $contato_medico = $_POST['contato_medico'];

  // Adicione a lógica para inserir o paciente no banco de dados
  $sql = "INSERT INTO pacientes (nome_paciente, sobrenome_paciente, email_paciente, idade, tipo_sanguineo, diabetes_type, insulina_type, dosagem_atual, ultima_medicao_glicose, frequencia_aplicacao, horario_aplicacao, medico_responsavel, contato_medico) 
            VALUES ('$nome_paciente', '$sobrenome_paciente', '$email_paciente', '$idade', '$tipo_sanguineo', '$diabetes_type', '$insulina_type', '$dosagem_atual', '$ultima_medicao_glicose', '$frequencia_aplicacao', '$horario_aplicacao', '$medico_responsavel', '$contato_medico')";

  if ($conexao->query($sql) === TRUE) {
    header('Location: admin_medicines.php'); // Redireciona após o cadastro
    exit();
  } else {
    echo "Erro ao adicionar paciente: " . $conexao->error;
  }
}
