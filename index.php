<?php 
    include 'conexao.php';

    $buscar_tarefas = 'SELECT * FROM db_tarefas';
    $query_tarefas = mysqli_query($conect, $buscar_tarefas);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Lista de tarefas</title>
</head>
<body>
    <header>
        
    </header>
    <main>
        <h1 class="titulo">TAREFAS</h1>

        <div class="botao__modal">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal1">
            Adicionar Tarefa
            </button>
        </div> <!-- Botão de adicionar tarefa -->

        <!-- Moda de Adição de tarefas -->
        <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Adicione sua tarefa</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div> <!-- header modal -->
                    <div class="modal-body">
                        <form action="adicionar.php" method="post">
                            <textarea name="task" id="task" cols="15" rows="5"></textarea>
                            <input type="submit" value="Adicionar" id="botao-task">
                        </form>
                    </div> <!-- modal-body -->
                </div> <!-- container modal -->
            </div>
        </div>

        <?php 
        
            while($tarefaList = mysqli_fetch_array($query_tarefas)){

                $id = $tarefaList['id'];
                $tarefa = $tarefaList['tarefa'];

        ?>

        <div class="tarefa">
            <p class="item__tarefa"> <?php echo $tarefa; ?> </p>
            <form action="editar.php" method="post">
                <input type="hidden" name="id" value="<?php echo $id ?>">
            </form>
            <form action="excluir.php" method="post">
                <input type="hidden" name="id" value="<?php echo $id ?>">
                <input type="submit" value="X" id="excluirItem">
            </form>
        </div>

        <?php } ?>

    </main>
    <footer></footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>