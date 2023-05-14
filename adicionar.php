<?php 

    include 'conexao.php';

    $task = $_POST['task'];

    $recebendo_tarefa = "INSERT INTO
    db_tarefas
    VALUE ('', '$task')";

    $query_tarefas = mysqli_query($conect, $recebendo_tarefa);

    header('location:index.php');
?>