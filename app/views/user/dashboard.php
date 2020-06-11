<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Кабинет пользователя</title>
  <meta name="description" content="Кабинет пользователя на сайте">

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
    <h1>Кабинет пользователя</h1><br><br>
    <p>Привет, <b><?=$data['login']?></b></p>
    <form action="/?url=user/index" method="post">
      <input type="hidden" name="exit_btn">
      <br><button type="submit" class="btn">Выйти</button>
    </form>
  </div>

  <!--подключаем футер сайта-->
  <?php require 'public/blocks/footer.php' ?>
</body>
</html>
