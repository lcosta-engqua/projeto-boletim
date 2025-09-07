<?php
include_once '../../../db/conexao.php';

function excluirCurso(){
  $id = $_POST['id'];

  global $conn;
  $stmt = $conn->prepare("DELETE FROM cursos WHERE id = :id");
  $stmt->execute([':id' => $id]);

  header('Location: ../../../front/coordenador/cursos/listar.php?sucesso=3');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  excluirCurso();
}
?>