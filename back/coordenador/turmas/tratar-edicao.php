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

  $stmt = $conn->prepare("SELECT t.id, 
                                 t.nome as nome_turma, 
                                 t.descricao, 
                                 c.id as id_curso,
                                 c.nome as nome_curso, 
                                 t.ativo
                          FROM turmas t
                          INNER JOIN cursos c ON c.id = t.curso_id
                          WHERE t.id = :id"
                          );
  $stmt->execute([':id' => $id]);
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  
  return $result;
}

function atualizarTurma(){
  global $conn;
  
  $id_turma = $_POST['id'];
  $nome_turma = $_POST['nome_turma'];
  $id_curso = $_POST['id_curso'];
  $status = isset($_POST['status']) ? 'S' : 'N';
  $descricao = $_POST['descricao'];
  
  $stmt = $conn->prepare("UPDATE turmas 
                          SET nome = :nome, 
                              descricao = :descricao,
                              curso_id = :curso_id,
                              ativo = :ativo
                          WHERE id = :id"
                          );
  $stmt->execute([':nome' => $nome_turma,
                  ':descricao' => $descricao,
                  ':curso_id' => $id_curso,
                  ':ativo' => $status,
                  ':id' => $id_turma
                ]);
header('Location: ../../../front/coordenador/turmas/listar.php?sucesso=2');
  exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  atualizarTurma();
}