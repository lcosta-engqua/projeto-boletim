<?php
include_once '../../../db/conexao.php';

function retornarCursos()
{
  echo "<strong>Entrou na FUNÇÃO</strong>";
  echo "<br>";
  echo "<hr>";
  global $conn;
  $stmt = $conn->prepare("SELECT * FROM cursos");
  $stmt->execute();

  
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  echo "<strong>Resultado do SELECT:</strong>";
  echo "<br>";
  var_dump($result);
  echo "<br>";
  echo "<hr>";

  if ($result) {
    echo "<strong>Entrou no IF</strong>";
    return [
      'id' => $result['id'],
      'nome' => $result['nome'],
      'descricao' => $result['descricao'],
      'ativo' => $result['ativo']
    ];
    var_dump($result);
    var_dump($result['id']);
  }
}


function persistirDados()
{
  session_start();

  if (!empty($_POST['id']) && !empty($_POST['nome']) && !empty($_POST['descricao']) && !empty($_POST['curso_id']) && $_POST['status']) {
    $_SESSION['id'] = $_POST['id'];
    $_SESSION['nome'] = $_POST['nome'];
    $_SESSION['descricao'] = $_POST['descricao'];
    $_SESSION['curso_id'] = $_POST['curso_id'];
    $_SESSION['status'] = $_POST['status'];

    $id = $_SESSION['id'];
    $nome = $_SESSION['nome'];
    $descricao = $_SESSION['descricao'];
    $curso_id = $_SESSION['curso_id'];
    $status = $_SESSION['status'];

    global $conn;
    $stmt = $conn->prepare("INSERT INTO turmas(nome, descricao, curso_id, ativo) VALUES(?,?,?,?)");
    $stmt->execute([$nome, $descricao, $curso_id, $status]);
    header('Location: ../../../front/coordenador/cursos/listar.php?sucesso=1');
    exit;
    session_destroy();
  }
}
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//   persistirDados();
// }

retornarCursos();
