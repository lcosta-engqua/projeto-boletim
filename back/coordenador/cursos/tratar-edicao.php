<?php
include_once '../../../db/conexao.php';

function retornaCursoSelecionado(){
  global $conn;

  if(!empty($_GET['id'])){
    $id = $_GET['id'];

    $stmt = $conn->prepare("SELECT * FROM cursos WHERE id = $id");
    $stmt->execute();

    $result = $stmt->fetchAll();
    // print_r($result);

    if($result && count($result) > 0){
    $id = $result['id'];
  }

    return $result;
  }
}

retornaCursoSelecionado();

?>