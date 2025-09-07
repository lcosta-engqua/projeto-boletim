<?php
include_once '../../../db/conexao.php';

function retornarTurmas(){
  global $conn;
  $stmt = $conn->prepare("SELECT t.id, t.nome as nome_turma, t.descricao, c.nome as nome_curso, t.ativo
                          FROM turmas t
                          INNER JOIN cursos c ON c.id = t.curso_id"
                          );
  $stmt->execute();
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  
  return $result;
}