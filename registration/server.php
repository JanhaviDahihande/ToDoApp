<?php
    session_start();

global $task_array;
    $username = "";
    $email = "";
    $task="";
    $errors = array();
    $success = array();

    global $connection;
$connection = mysqli_connect('localhost','admin','root123','registration', 3306);
    if(!$connection){
        die("Database connection failed!" . mysqli_error($connection));
    }

    //REGISTER USER
    if(isset($_POST["submit"])){

        $username = mysqli_real_escape_string($connection,$_POST['username']);
        $email = mysqli_real_escape_string($connection,$_POST['email']);
        $password = mysqli_real_escape_string($connection,$_POST['password']);
        $confirmpassword = mysqli_real_escape_string($connection,$_POST['confirmpassword']);

        if(empty($username)){
            array_push($errors, "Username is required");
        }
        if(empty($email)){
            array_push($errors, "Email is required");
        }
        if(empty($password)){
            array_push($errors, "Password is required");
        }
        if($password != $confirmpassword){
            array_push($errors, "Passwords don't match");
        }


        $existing_user_check = "SELECT * from registration.users where username='$username' and email='$email' ";
        $result = mysqli_query($connection, $existing_user_check);
        $user = mysqli_fetch_assoc($result);

        if($user){
            if($user['username'] === $username)
                array_push($errors, "Username already exists");
            if($user['email'] === $email)
                array_push($errors, "Email already exists");
        }

        if(count($errors) ==0){
            $passwordmd5 = md5($password);

            $query = "Insert into registration.users (username, email, password) VALUES('$username','$email','$passwordmd5')";
            mysqli_query($connection, $query);
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "You are now logged in";
            header('location:../index.php');
        }
    }

    //LOGIN USER
    if(isset($_POST['login'])){
        $username = mysqli_real_escape_string($connection, $_POST['username']);
        $password = mysqli_real_escape_string($connection, $_POST['password']);

        if(empty($username))
            array_push($errors, "Username is required");
        if(empty($password))
            array_push($errors, "Password is required");

        if(count($errors) == 0){
            $passwordmd5 = md5($password);
            $query = "Select * from registration.users where username = '$username' and password = '$passwordmd5'";
            $results = mysqli_query($connection, $query);

            if(mysqli_num_rows($results) == 1){
                $_SESSION['username'] = $username;
                $_SESSION['success'] = "You are now logged in";
                header('location:../index.php');
            }
            else{
                array_push($errors,"Wrong username/password combination");
            }
        }
    }

    //ADD TASK
    if(isset($_POST['addTask'])){
        print 'Here!';
        $task = mysqli_real_escape_string($connection, $_POST['task']);
        array_push($success, "Task added successfully!");

        if(empty($task))
            array_push($errors, "Please enter a task");

        if(count($errors) == 0){
            $query = "Insert into todo.tasks (task) VALUES('$task')";
            $results = mysqli_query($connection, $query);

            header('/index.php');
        }
    }

    //DELETE TASK
    if(isset($_GET['del_task'])){
        $id = $_GET['del_task'];
        mysqli_query($connection, "DELETE FROM todo.tasks where id=$id");
        header('location:../index.php');
    }