<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Страница про нас</title>
  <meta name="description" content="Страница про наш сайт">

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
      <h1>Сокра.тим</h1><br>
      <p>
        <li>Наш сайт выполняет всё быстро и качественно!</li><br>
        <li>Достаточно лишь выполнить два действия и короткая ссылка в вашем распоряжении!</li><br>
        <li>Нужно пройти простую регистрацию и все возможности сайта станут вам доступны!</li><br>
        <li>Если есть какие-то пожелания, то вы всегда можете написать нам, перейдя в <a href="/?url=contact/mess">Контакты</a></li>
      </p>

    </div>
  </div>

  <!--подключаем футер сайта-->
  <?php require 'public/blocks/footer.php' ?>
</body>
</html>
