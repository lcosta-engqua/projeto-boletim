<?php
include_once '../../../db/conexao.php';

function excluirTurma(){
  global $conn;

  if(!empty($_POST['turma_id'])){
    $id = $_POST['turma_id'];
    var_dump($id);

    $stmt = $conn->prepare("DELETE FROM turmas WHERE id = :id");
    $stmt->execute([':id' => $id]);
  }
  header('Location: ../../../front/coordenador/turmas/listar.php?sucesso=3');
  exit;
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  excluirTurma();
}