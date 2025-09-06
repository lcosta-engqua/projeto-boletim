<?php
include_once '../../../db/conexao.php';

function listarCursos()
{
  global $conn;

  try {
    $stmt = $conn->prepare("SELECT * FROM cursos");
    $stmt->execute();

    $result = $stmt->fetchAll();
    return $result ?? [];
    print_r($result);

  } catch (Exception $e) {
    echo "Error: " . $e->getMessage();
  }
}

listarCursos();
