<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detalhes do Paciente</title>
  <link rel="stylesheet" href="assets/pages/admin/admin_medicines.css">
  <link rel="shortcut icon" href="favicon.png" type="image/x-icon">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <header>
    <div class="container">
      <div class="logo">
        <img src="logo.png" alt="Logo">
      </div>
    </div>
  </header>
  <main>
    <section class="patient-details">
      <div class="container">
        <?php
        include_once('config.php');

        if (isset($_GET['id'])) {
          $id = $_GET['id'];

          $sql = "SELECT * FROM pacientes WHERE id = $id";
          $result = $conexao->query($sql);

          if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo "<h1>{$row['nome']} {$row['sobrenome']}</h1>";
            echo "<p><strong>Idade:</strong> {$row['idade']}</p>";
            echo "<p><strong>Tipo Sanguíneo:</strong> {$row['tipo_sanguineo']}</p>";
            echo "<p><strong>Tipo de Diabetes:</strong> {$row['diabetes_type']}</p>";
            echo "<p><strong>Tipo de Insulina:</strong> {$row['insulina_type']}</p>";
            echo "<p><strong>Dosagem Atual de Insulina:</strong> {$row['dosagem_atual']}</p>";
            echo "<p><strong>Última Medição de Glicose:</strong> {$row['ultima_medicao_glicose']}</p>";
            echo "<p><strong>Frequência de Aplicação de Insulina:</strong> {$row['frequencia_aplicacao']}</p>";
            echo "<p><strong>Horário de Aplicação de Insulina:</strong> {$row['horario_aplicacao']}</p>";
            echo "<p><strong>Médico Responsável:</strong> {$row['medico_responsavel']}</p>";
            echo "<p><strong>Contato do Médico:</strong> {$row['contato_medico']}</p>";
          } else {
            echo "<div class='no-patients'>Paciente não encontrado.</div>";
          }
        } else {
          echo "<div class='no-patients'>Nenhum paciente selecionado.</div>";
        }
        ?>
      </div>
    </section>
  </main>
  <footer>
    <div class="container">
      <p>&copy; 2023 Administração de Pacientes</p>
    </div>
  </footer>
</body>

</html>