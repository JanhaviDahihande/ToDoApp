<?php include('server.php')?>

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
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/js/materialize.min.js"></script>

<div class="row">
    <div class="container">
        <div class="card col s6 offset-s3">
            <div class="card-content blue-text">
                <form method="post" action="login.php">
                    <h4>Login</h4>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="username" type="text" name="username" class="validate">
                            <label for="username">Username</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="password" type="password" name="password" class="validate">
                            <label for="password">Password</label>
                        </div>
                    </div>
                    <button class="btn waves-effect waves-light blue" type="submit" name="login">Log in
                        <i class="material-icons right">send</i>
                    </button>
                    <p>Not yet a member?<a href="register.php" class="waves-effect waves-blue btn-flat blue-text">Sign up</a></p>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>