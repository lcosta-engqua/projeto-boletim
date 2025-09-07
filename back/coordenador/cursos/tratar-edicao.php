<?php
include_once '../../../db/conexao.php';

function retornaCursoSelecionado(){
  global $conn;
  $id = $_GET['id'] ?? $_POST['id'] ?? null;

  if ($id) {
    $stmt = $conn->prepare("SELECT * FROM cursos WHERE id = :id");
    $stmt->execute([':id' => $id]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
      return [
        'id' => $result['id'],
        'nome' => $result['nome'],
        'descricao' => $result['descricao'],
        'ativo' => $result['ativo']
      ];
    }
  }
  return null;
}

function atualizarDados(){
  $id = $_POST['id'];
  $nome = $_POST['nome'];
  $descricao = $_POST['descricao'];
  $ativo = isset($_POST['ativo']) ? 'S' : 'N';

  global $conn;
  $stmt = $conn->prepare("UPDATE cursos SET nome=:nome, descricao=:descricao, ativo=:ativo WHERE id=:id");
  $stmt->execute([
    ':nome' => $nome,
    ':descricao' => $descricao,
    ':ativo' => $ativo,
    ':id' => $id
  ]);

  header('Location: ../../../front/coordenador/cursos/listar.php?sucesso=2');
  exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  atualizarDados();
}