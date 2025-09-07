<?php
include_once '../../../db/conexao.php';
session_start();

function capturarSessao(){
  $_SESSION['nome'] = $_POST['nome'];
  $_SESSION['descricao'] = $_POST['descricao'];
  $_SESSION['status'] = $_POST['status'];

  // print_r($_SESSION);
  return [
    'nome' => $_SESSION['nome'],
    'descricao' => $_SESSION['descricao'],
    'status' => $_SESSION['status']
  ];
}

function capturarDadosForm(){
  $sessao = capturarSessao();

  if(!empty($sessao)){
    $nome = $sessao['nome'];
    $descricao = $sessao['descricao'];
    $status = isset($_POST['status']) ? 'S' : 'N';
    return [
      'nome' => $nome,
      'descricao' => $descricao,
      'status' => $status
    ];
  }
  // print_r($nome);
  // print_r($descricao);
  // print_r($status);
}

function persistirDados(){
  $dados = capturarDadosForm();
  $nome = $dados['nome'];
  $descricao = $dados['descricao'];
  $status = $dados['status'];

  global $conn;
  $stmt = $conn->prepare("INSERT INTO cursos(nome, descricao, ativo) VALUES(?,?,?)");
  $stmt->execute([$nome, $descricao, $status]);

  header('Location: ../../../front/coordenador/cursos/listar.php?sucesso=1');
  exit;
}

persistirDados();
session_destroy();
?>