<?php

// TODO: sanitize queries

function header_check() {
  if(check_logged_in() == false)  {
    include 'Views/Structure/header.php';
  } else {
    include 'Views/Structure/header_logged.php';
  };
}

function login_verify () {
  if (!empty($_POST['submit']) && 'Log-in' == $_POST['submit']) { //TODO: move this to functions page
    $password = $_POST['password'];
    $username = $_POST['username'];
    $conn = get_connected();
    if (verify_me($username, $password)) {
      create_session($username, $password); // need to privatize this
      header("Location: index.php");
    }else {
      $error = "**Your Login information was incorrect, please try again.**";
      die();
    };
  }
}

// login functions
function get_hash_by_name ($username)  {
  $conn = get_connected();
  $query = "SELECT hash from users where username = '" . $username . "' limit 1";
  $results = mysqli_query($conn, $query);
  $all = mysqli_fetch_array($results, MYSQLI_ASSOC);
  mysqli_close($conn);
  return $all[hash];
}

function verify_me($username, $password)  {
  $hash = get_hash_by_name($username);
  if (password_verify($password, $hash))  {
    return true;
  } else {
    return false;
  }
}

function create_session($username, $password) {
  $_SESSION['username'] = $username;
  $_SESSION['password'] = $password;
  if (isset($_POST['remember']))  {
    setcookie("octnname", $_SESSION['username'], time()+60*60*24*100, "/");
    setcookie("octnpassword", $_SESSION['password'], time()+60*60*24*100, "/"); //TODO: may need to encode this password for storing
    return;
  }
  return;
}

function clear_session_cookies()  {
  session_start();
  unset($_SESSION['username']);
  unset($_SESSION['password']);
  session_unset();
  session_destroy();
  setcookie("octnname", "", time()-60*60*24*100, "/");
  setcookie("octnpassword", "", time()-60*60*24*100, "/");
  return;
}

function check_logged_in() {
  session_start();
  if(isset($_SESSION['username']) && isset($_SESSION['password']))  {
    return true;
  } else if(isset($_COOKIE['octnname']) && isset($_COOKIE['octnpassword'])) {
    if(verify_me($_COOKIE['octnname'], $_COOKIE['octnpassword'])) {
      create_session($_COOKIE['octnname'], $_COOKIE['octnpassword']);
      return true;
    } else {
      clear_session_cookies();
      return false;
    }
  } else {
    return false;
  }
}

function register_user($name, $password, $email)  {
  $conn = get_connected();
  $pw_hash = password_hash($password, PASSWORD_DEFAULT);
  $sql = "INSERT into users(username, hash, email)
            VALUES ('$name', '$pw_hash', '$email')";

  if($conn->query($sql) === TRUE) {
    create_session($name, $pw_hash);
    mysqli_close($conn);
    return;
  } else {
    echo "error registering: " . $conn->error;
    mysqli_close($conn);
  }
}

function protected_page() {
  if(check_logged_in() == false)  {
    header("Location: login.php");
    die();
  };
}

 ?>
