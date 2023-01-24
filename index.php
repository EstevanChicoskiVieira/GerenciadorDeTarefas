<?php
    session_start();

    if( !isset($_SESSION['tasks'])){
        $_SESSION['tasks'] = array();
    }

    if (isset($_GET['task_name'])){
        array_push($_SESSION['tasks'], $_GET['task_name']);
        unset($_GET['task_name']);
    }

    if (isset($_GET['clear'])){
        unset($_SESSION['tasks']);
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>gerenciador de tarefas</title>

        <link rel="stylesheet" href="./Assets/Css/index.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    </head>
    <body>
        <section class="container">
            <h1 style="color: #ffffff;">Gerenciador de tarefas</h1>

            <div class="main">
                <div class="form">
                    <form action="" method="get">
                        <label for="task_name">Tarefa:</label>
                        <input type="text" name="task_name" id="task_name" placeholder="nome da tarefa">
                        <button type="submit">Cadastrar tarefa</button>
                    </form>
                </div>
                <div class="separator">

                </div>
                <div class="list-tasks">
                    <?php
                        if (isset($_SESSION['tasks'])){
                            echo "<ul>";
                                foreach($_SESSION['tasks'] as $key => $task){
                                    echo "<li>$task</li>";
                                }
                            echo "</ul>";
                        }
                    ?>
                    
                    <form action="" method="get">
                        <input type="hidden" name="clear" value="clear">
                        <button style="background: tomato;" type="submit">
                            limpar todas as tarefas
                        </button>
                    </form>
                </div>
                <div class="footer">
                    <p style="color: #ffffff;">by @Jeall.bat</p>
                </div>
            </div>
        </section>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </body>
</html>