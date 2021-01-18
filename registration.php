<?php
    include "includes/db.php";

    $data = $_POST;

    if (isset($data["sign_up"])) {

        $login = $data["login"];
        $email = $data["email"];
        $password = $data["password"];
        $re_password = $data["re_password"];
        $errors = array();

        if (trim($login) == "")
            $errors[] = "Введите логин";
        if (!filter_var($email, FILTER_VALIDATE_EMAIL))
            $errors[] = "Неправильно введен Email";
        if (empty($password))
            $errors[] = "Введите пароль";
        if ($re_password != $password)
            $errors[] = "Повторый пароль введен неправильно";

        if (R::count('users', "login = ?", array($login)) > 0)
            $errors[] = "Пользователь с таким логином уже существует";
        if (R::count('users', 'email = ?', array($email)) > 0)
            $errors[] = "Пользователь с таким Email уже существует";

        if (empty($errors)) {
            $user = R::dispense('users');
            $user->login = $login;
            $user->email = $email;
            $user->password = password_hash($password, PASSWORD_DEFAULT);
            R::store($user);
            header("Location:/login.php");
        } else {
            echo array_shift($errors);
        }
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Registration</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
.login-form {
    width: 340px;
    margin: 50px auto;
  	font-size: 15px;
}
.login-form form {
    margin-bottom: 15px;
    background: #f7f7f7;
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    padding: 30px;
}
.login-form h2 {
    margin: 0 0 15px;
}
.form-control, .btn {
    min-height: 38px;
    border-radius: 2px;
}
.btn {
    font-size: 15px;
    font-weight: bold;
}
</style>
</head>
<body>
<div class="login-form">
    <form action="/registration.php" method="POST">
        <h2 class="text-center">Регистрация</h2>
        <div class="form-group">
            <input type="text" value="<?php echo @$login; ?>" name="login" class="form-control" placeholder="Логин" required="required">
        </div>
        <div class="form-group">
            <input type="email" value="<?php echo @$email; ?>" name="email" class="form-control" placeholder="Email" required="required">
        </div>
        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Пароль" required="required">
        </div>
        <div class="form-group">
            <input type="password" name="re_password" class="form-control" placeholder="Повторите пароль" required="required">
        </div>
        <div class="form-group">
            <button type="submit" name="sign_up" class="btn btn-primary btn-block">Зарегистрироваться</button>
        </div>
        <p class="text-center" id="errorId"></p>
    </form>
    <p class="text-center"><a href="/login.php">Войти</a></p>
    <p class="text-center"><a href="/">На главную</a></p>
</div>
</body>
</html>