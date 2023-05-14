<?php 

    include 'conexao.php';

    $id = $_POST['id'];

    $recebendo_tarefa = "DELETE FROM
    db_tarefas
    WHERE id = '$id'";

    $query_tarefas = mysqli_query($conect, $recebendo_tarefa);

    header('location:index.php');
?>