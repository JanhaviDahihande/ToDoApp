<?php include('registration/server.php')?>
<!DOCTYPE html>
<html>
<head>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/css/materialize.min.css">


    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<!-- Compiled and minified JavaScript -->
<body>
<nav>
    <div class="nav-wrapper blue">
        <a href="#" class="brand-logo white-text center">ToDo</a>
    </div>
</nav>

<div class="row">
    <div class="container">

        <form method="post" action="index.php">
            <div class="row">
                <div class="input-field col s12">
                    <input placeholder="Enter the task" id="task" name="task" type="text">
                </div>
            </div>
            <div class="row">
                <button class="btn waves-effect waves-light orange" type="submit" name="addTask">
                    <i class="material-icons left">add</i>
                    Add task
                </button>
            </div>
        </form>
        <table id="taskTable">
            <?php
            $task_array = mysqli_query($connection, "Select * from todo.tasks");
            ?>
            <thead>
            <tr>
                <th>Number</th>
                <th>Task</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>

            <?php
            $i = 1;
            while($row = mysqli_fetch_array($task_array)){?>
                <tr>
                    <td><?= $i?></td>
                    <td><?= $row['task']?></td>
                    <td>
                        <a href="registration/server.php?del_task=<?= $row['id'];?>">
                            <i class="material-icons red-text">close</i>
                        </a>
                    </td>
                </tr>
            <?php $i++;} ?>
            </tbody>

        </table>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/js/materialize.min.js"></script>

</body>
</html>

<script>
    function myFunction() {
        document.getElementById("myTable").deleteTHead();
    }
</script>