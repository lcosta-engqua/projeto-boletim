<?php
include_once '../../../db/conexao.php';

function capturarId(){
  if(!empty($_GET['id'])){
    $id = $_GET['id'];
  }
  return $id;
}

function retornarTurma(){
  global $conn;
  $id = capturarId();

  $stmt = $conn->prepare("SELECT t.id, t.nome as nome_turma, t.descricao, c.nome as nome_curso, t.ativo
                          FROM turmas t
                          INNER JOIN cursos c ON c.id = t.curso_id
                          WHERE t.id = :id"
                          );
  $stmt->execute([':id' => $id]);
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  
  return $result;
}