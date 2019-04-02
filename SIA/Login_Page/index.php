<?php
  //-------------------------------------------------------
  //connect to MySQL
  //-------------------------------------------------------
  $link = new mysqli("localhost:3306","root","","project_one");
  //error message
  if ($link->connect_errno) {
      printf("Connect failed: %s\n", $link->connect_error);
      exit();
  }

  //-------------------------------------------------------
  //get action from sub input
  //-------------------------------------------------------
  if(isset($_REQUEST["action"]))
    $action = $_REQUEST["action"];
  else //if none set do nothing
    $action = "none";

  //-------------------------------------------------
  //LOGIN CHECK
  //-------------------------------------------------
  if($action =="log_in"){
    //get from form 
    $name = $_POST["email"];
    $pass = $_POST["password"];

    $name = htmlentities($link->real_escape_string($name));
    $pass = htmlentities($link->real_escape_string($pass));
    $pass = crypt ($pass, 'salt');
    //connect to DB annd get data
    $result = $link->query("SELECT password FROM LoginInfo WHERE username = '".$name."'");
    $row = $result->fetch_assoc();
    if(!$row){
      $log_message = "User name '$name' not found.";
      $name_error=true;
    }
    elseif($row["password"] != $pass){
      $log_message = "User name and password do not match.";
      $name_error=false;
    }
    else{
      $_SESSION['logged_in_as'] = $name;
      header('Location: php/main.php');
    }
    
  }
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Signin Template · Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com//docs/4.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/4.3/examples/sign-in/signin.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
  </head>
  <body class="text-center">
    <form class="form-signin" method="post" action="index.php">
      <img class="mb-4" src="https://getbootstrap.com/docs/4.3/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" id="email" class="form-control" placeholder="Email address" required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="password" class="form-control" placeholder="Password" required>
      <input type="hidden" name="action" value="log_in">
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2017-2019</p>
    </form>
</body>
</html>
