<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
  <title>Coordenação</title>
</head>

<body>
  <main>
    <div class="container">
      <nav class="navbar navbar-expand-lg bg-body-tertiary rounded" aria-label="Eleventh navbar example">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Sistema Boletim</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample09"
            aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarsExample09">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link disabled" aria-disabled="true">Área do Coordenador</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Professores</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Alunos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Cursos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="listar.php">Turmas</a>
              </li>
              <li class="nav-item">
                <a class="nav-link inactive" aria-current="page" href="listar.php">Disciplinas</a>
              </li>
            </ul>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="userMenu" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Usuário
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userMenu">
                  <li><a class="dropdown-item" href="#">Perfil</a></li>
                  <li>
                    <hr class="dropdown-divider">
                  </li>
                  <li><a class="dropdown-item text-danger" href="#">Sair</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <div class="card shadow-sm" style="margin-top: 60px;">
        <div class="card-header bg-secondary text-white fs-4 d-flex justify-content-between align-items-center">
          <span>Cadastrar Disciplina</span>
          <a href="listar.php" class="btn btn-primary"><i class="bi bi-arrow-return-left"></i> Voltar</a>
        </div>
        <div class="card-body">
          <form action="../../../back/coordenador/turmas/tratar-cadastro.php" method="post">
            <div class="row mb-3">
              <div class="col-md-6">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Preencha com o nome da turma" required>
              </div>
              <div class="col-md-3">
                <label for="curso" class="form-label">Curso</label>
                <?php
                include_once '../../../back/coordenador/turmas/tratar-cadastro.php';
                $cursos = retornarCursos();
                ?>
                <select class="form-select w-auto" name="curso_id" id="curso_id">
                  <option selected>Selecione um curso</option>
                  <?php foreach ($cursos as $curso): ?>
                    <?php print_r($curso['id']); ?>
                    <option value="<?php echo htmlspecialchars($curso['id']); ?>">
                      <?php echo htmlspecialchars($curso['nome']); ?>
                    </option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="col-md-3">
                <label>Status</label>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="1" id="status" name="status" checked>
                  <label class="form-check-label" for="status">
                    Ativo
                  </label>
                </div>
              </div>
            </div>
            <div class="mb-3">
              <div class="form-group">
                <label for="descricao">Descrição</label>
                <textarea class="form-control" id="descricao" name="descricao" rows="3" placeholder="Preencha com a descrição da turma" required></textarea>
              </div>

            </div>
            <button type="submit" class="btn btn-secondary"><i class="bi bi-plus-square"></i> Cadastrar</button>
          </form>
        </div>
  </main>
  <!-- Bootstrap JS (bundle includes Popper) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>