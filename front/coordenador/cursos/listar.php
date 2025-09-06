<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
  <title>Form lista</title>
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
                <a class="nav-link disabled" aria-current="page" href="#">Cursos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Turmas</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Disciplinas</a>
              </li>
            </ul>
            <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Pesquise aqui" aria-label="Search" />
              <button class="btn btn-outline-secondary" type="submit">
                Pesquisar
              </button>
            </form>
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
        <div class="card-header bg-secondary text-white fs-4">
          Cursos
        </div>
        <div class="card-body p-0">
          <table class="table table-striped table-bordered rounded">
            <thead>
              <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Ações</th>
              </tr>
            </thead>
            <tbody>
              <?php
              include_once '../../../back/coordenador/cursos/tratar-listagem.php';
              $cursos = listarCursos();

              foreach ($cursos as $curso): ?>
                <tr>
                  <td><?php echo htmlspecialchars($curso['id']); ?></td>
                  <td><?php echo htmlspecialchars($curso['nome']); ?></td>
                  <td><?php echo htmlspecialchars($curso['descricao']); ?></td>
                  <td>
                    <!-- Formulário de edição -->
                    <form method="get" action="editar.php" style="display:inline;">
                      <input type="hidden" name="id" value="<?php echo $curso['id']; ?>">
                      <button class="btn btn-secondary btn-sm me-1" type="submit">
                        <i class="bi bi-pencil"></i> Editar
                      </button>
                    </form>

                    <!-- Formulário de exclusão -->
                    <form method="get" action="tratar-exclusao.php" style="display:inline;">
                      <input type="hidden" name="id" value="<?php echo $curso['id']; ?>">
                      <button class="btn btn-danger btn-sm me-1" type="submit">
                        <i class="bi bi-trash"></i> Excluir
                      </button>
                    </form>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
  </main>
  <!-- Bootstrap JS (bundle includes Popper) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>