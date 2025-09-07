<?php
error_reporting(E_ALL);
include_once '../../../db/conexao.php';

function retornarCursos(){
  global $conn;
  $stmt = $conn->prepare("SELECT * FROM cursos");
  $stmt->execute();

  $result = $stmt->fetchAll(PDO::FETCH_DEFAULT);
  return $result;
}

function capturarSessao(){
  session_start();
  if (!empty($_POST['nome']) && !empty($_POST['descricao']) && !empty($_POST['curso_id'])) {
    $_SESSION['nome'] = $_POST['nome'];
    $_SESSION['descricao'] = $_POST['descricao'];
    $_SESSION['curso_id'] = $_POST['curso_id'];
    $_SESSION['status'] = isset($_POST['status']) ? 'S' : 'N';
  }
  return $_SESSION;
  session_destroy();
}

function persistirDados(){
  $sessao = capturarSessao();
  $nome = $sessao['nome'];
  $descricao = $sessao['descricao'];
  $curso_id = $sessao['curso_id'];
  $status = $sessao['status'];

  global $conn;
  $stmt = $conn->prepare("INSERT INTO turmas(nome, descricao, curso_id, ativo) VALUES(?,?,?,?)");
  $stmt->execute([$nome, $descricao, $curso_id, $status]);

  header('Location: ../../../front/coordenador/turmas/listar.php?sucesso=1');
  exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  persistirDados();
}