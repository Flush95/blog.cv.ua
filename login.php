<?php
    include "db.php";

    $login_data = $_POST;

    if (isset($login_data["do_login"])) {

        $login = $login_data['login'];
        $password = $login_data['password'];
        $errors = array();

        $user = R::findOne('users', "login = ?", array($login));
        if ($user) {
            if (!password_verify($password, $user->password)) {
               $errors[] = "Пользователь с таким паролем не найден";
            }
        } else {
            $errors[] = "Пользователь с таким логином не найден";
        }


        if (empty($errors)) {
            $_SESSION['logged_user'] = $user;
                header("Location:/");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Login</title>
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
    <form action="login.php" method="POST">
        <h2 class="text-center">Вход</h2>
        <div class="form-group">
            <input type="text" name="login" value="<?php echo @$login; ?>" class="form-control" placeholder="Логин" required="required">
        </div>
        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Пароль" required="required">
        </div>
        <div class="form-group">
            <button type="submit" name="do_login" class="btn btn-primary btn-block">Войти</button>
        </div>
        <p class="text-center">
            <?php
                if (!empty($errors)) {
                    include "views/alerts.php";
                    errorToast($errors);
                }
            ?>
        </p>
    </form>
    <p class="text-center"><a href="/registration.php">Создание Аккаунта</a></p>
    <p class="text-center"><a href="/">На главную</a></p>
</div>
</body>
</html>