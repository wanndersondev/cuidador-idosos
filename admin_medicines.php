<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Administração de Pacientes</title>
  <link rel="stylesheet" href="assets/pages/admin/admin_medicines.css">
  <link rel="shortcut icon" href="files/img/favicon.png" type="image/x-icon">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>

<body>
  <header>
    <div class="container">
      <div class="logo">
        <img src="files/img/logo-branco.png" alt="Logo" height="80">
      </div>
    </div>
  </header>

  <main>
    <section class="hero" style="margin: 1rem 0;">
      <div class="container">
        <h1>Administração de Pacientes</h1>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addPatientModal" style="margin: 2rem 0;">Adicionar Paciente</button>
      </div>
    </section>

    <section class="patients">
      <div class="container">
        <h2>Lista de Pacientes</h2>
        <div class="patient-cards">
          <?php
          include_once('config.php');
          $sql = "SELECT * FROM pacientes";
          $result = $conexao->query($sql);

          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              echo "<div class='patient-card'>";
              echo "<h4>" . $row['nome_paciente'] . "</h4>";
              echo "<h4>" . $row['sobrenome_paciente'] . "</h4>";
              echo "<a href='visualizar_paciente.php?id=" . $row['id'] . "'>Ver Detalhes</a>";

              // Adicionando a seção para exibir os medicamentos do paciente
              $id_paciente = $row['id'];
              $medicamentos_sql = "SELECT * FROM medicamentos WHERE id_paciente = $id_paciente";
              $medicamentos_result = $conexao->query($medicamentos_sql);

              if ($medicamentos_result->num_rows > 0) {
                echo "<div class='medicamentos'>";
                echo "<h5>Medicamentos:</h5>";
                echo "<ul>";
                while ($med_row = $medicamentos_result->fetch_assoc()) {
                  echo "<li>" . $med_row['nome_medicamento'] . "</li>";
                }
                echo "</ul>";
                echo "</div>";
              } else {
                echo "<p>Nenhum medicamento cadastrado.</p>";
              }

              // Fim da seção de exibição de medicamentos

              echo "<button class='btn btn-primary add-medication' data-toggle='modal' data-target='#addMedicationModal' data-patient-id='" . $row['id'] . "'>Adicionar Medicamento</button>";
              echo "</div>";
            }
          } else {
            echo "<div class='no-patients'>Nenhum paciente encontrado.</div>";
          }
          ?>
        </div>
      </div>
    </section>
  </main>

  <footer>
    <div class="container">
      <p>&copy; 2023 Administração de Pacientes</p>
    </div>
  </footer>

  <!-- Modal para adicionar pacientes -->
  <div class="modal fade" id="addPatientModal" tabindex="-1" role="dialog" aria-labelledby="addPatientModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addPatientModalLabel">Adicionar Paciente</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <!-- Formulário para adicionar pacientes -->
          <!-- Precisa corrigir para deixar os campos um ao aldo do outro ou deixar campos sozinhos oculpando o tamanho total -->
          <form action="processar_paciente.php" method="POST">
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="nome_paciente">Nome do Paciente</label>
                <input type="text" class="form-control" id="nome_paciente" name="nome_paciente" required>
              </div>

              <div class="col-md-6 mb-3">
                <label for="sobrenome_paciente">Sobrenome do Paciente</label>
                <input type="text" class="form-control" id="sobrenome_paciente" name="sobrenome_paciente" required>
              </div>

            </div>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="email_paciente">Email do Paciente</label>
                <input type="email" class="form-control" id="email_paciente" name="email_paciente" required>
              </div>
              <div class="col-md-6 mb-3">
                <label for="idade">Idade</label>
                <input type="number" class="form-control" id="idade" name="idade" required>
              </div>
            </div>

            <div class="row">

              <div class="col-md-6 mb-3">
                <label for="telefone_paciente">Telefone do Paciente</label>
                <input type="tel" class="form-control" id="telefone_paciente" name="telefone_paciente" required>
              </div>

            </div>

            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="tipo_sanguineo">Tipo Sanguíneo</label>
                <input type="text" class="form-control" id="tipo_sanguineo" name="tipo_sanguineo" required>
              </div>
              <div class="col-md-6 mb-3">
                <label for="diabetes_type">Tipo de Diabetes</label>
                <input type="text" class="form-control" id="diabetes_type" name="diabetes_type" required>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="insulina_type">Tipo de Insulina</label>
                <input type="text" class="form-control" id="insulina_type" name="insulina_type" required>
              </div>
              <div class="col-md-6 mb-3">
                <label for="dosagem_atual">Dosagem Atual de Insulina</label>
                <input type="text" class="form-control" id="dosagem_atual" name="dosagem_atual" required>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="ultima_medicao_glicose">Última Medição de Glicose</label>
                <input type="text" class="form-control" id="ultima_medicao_glicose" name="ultima_medicao_glicose" required>
              </div>
              <div class="col-md-6 mb-3">
                <label for="frequencia_aplicacao">Frequência de Aplicação de Insulina</label>
                <input type="text" class="form-control" id="frequencia_aplicacao" name="frequencia_aplicacao" required>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="horario_aplicacao">Horário de Aplicação de Insulina</label>
                <input type="time" class="form-control" id="horario_aplicacao" name="horario_aplicacao" required>
              </div>
              <div class="col-md-6 mb-3">
                <label for="medico_responsavel">Médico Responsável</label>
                <input type="text" class="form-control" id="medico_responsavel" name="medico_responsavel" required>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="contato_medico">Contato do Médico</label>
                <input type="tel" class="form-control" id="contato_medico" name="contato_medico" required>
              </div>
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar Paciente</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal para adicionar medicamento -->
  <div class="modal fade" id="addMedicationModal" tabindex="-1" role="dialog" aria-labelledby="addMedicationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addMedicationModalLabel">Adicionar Medicamento</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <!-- Formulário para adicionar medicamento -->
          <form action="processar_medicamento.php" method="POST">
            <input type="hidden" name="id_paciente" id="medication-patient-id">
            <input type="text" name="nome_medicamento" placeholder="Nome do Medicamento" required>
            <button type="submit" class="btn btn-primary">Adicionar Medicamento</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script>
    // Adicionando um evento de clique para o botão de "Adicionar Medicamento"
    $('.add-medication').click(function() {
      var patientId = $(this).data('patient-id');
      $('#medication-patient-id').val(patientId);
    });

    // Exibir o alerta de sucesso após cadastrar um medicamento
    <?php if (isset($_GET['success']) && $_GET['success'] == 1) { ?>
      $('.alert-success').show();
    <?php } ?>
  </script>
</body>

</html>