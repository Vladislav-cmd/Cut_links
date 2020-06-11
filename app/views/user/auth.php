<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Страница авторизации</title>
  <meta name="description" content="Авторизация на сайте">

  <!--подключаем стили-->
  <link rel="stylesheet" href="/public/css/main.css" charset="utf-8">
  <link rel="stylesheet" href="/public/css/form.css" charset="utf-8">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" crossorigin="anonymous">
</head>
<body>
  <!--подключаем шапку сайта-->
  <?php require 'public/blocks/header.php' ?>

  <!--ОСНОВНАЯ ЧАСТЬ САЙТА-->
  <div class="container main">
    <div class="all">
      <h1>Авторизация</h1><br>
      <p>Здесь вы можете авторизоваться на сайте!</p>
      <form action="/?url=user/auth" method="post" class="form-control">
        <input type="text" name="login" placeholder="Введите логин" value="<?=$_POST['login']?>"><br>
        <input type="password" name="pass" placeholder="Введите пароль" value="<?=$_POST['pass']?>"><br>
        <!--Блок сообщений с ошибками-->
        <div class="error"><?=$data['message']?></div>
        <button class="btn" id="send">Готово</button>
      </form>
    </div>
  </div>

  <!--подключаем футер сайта-->
  <?php require 'public/blocks/footer.php' ?>
</body>
</html>
