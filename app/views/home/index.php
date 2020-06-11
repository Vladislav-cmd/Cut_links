<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Главная страница</title>
  <meta name="description" content="Главная страница сократим ссылку">

  <!--подключаем стили-->
  <link rel="stylesheet" href="/public/css/main.css" charset="utf-8">
  <link rel="stylesheet" href="/public/css/form.css" charset="utf-8">
  <link rel="stylesheet" href="/public/css/links.css" charset="utf-8">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" crossorigin="anonymous">
</head>
<body>
  <!--подключаем шапку сайта-->
  <?php require 'public/blocks/header.php' ?>

  <!--ОСНОВНАЯ ЧАСТЬ САЙТА-->
  <div class="container main">
    <div class="all">
      <h1>Сокра.тим</h1><br>
      <?php if($_COOKIE['log'] == ''): ?>
        <p>Вам нужно сократить ссылку?</p>
        <p>Прежде чем это сделать, зарегистрируйтесь на сайте.</p><br>
        <!--указываем где будет происходить обработка формы-->
        <form action="/" method="post" class="form-control">
          <input type="email" name="email" placeholder="Введите email" value="<?=$_POST['email']?>"><br>
          <input type="text" name="login" placeholder="Введите логин" value="<?=$_POST['login']?>"><br>
          <input type="password" name="pass" placeholder="Введите пароль" value="<?=$_POST['pass']?>"><br>
          <!--Блок сообщений с ошибками-->
          <div class="error"><?=$data[0]['message']?></div>
          <button class="btn" id="send">Зарегистрироваться</button>
          <br><br><p>Есть аккаунт? Тогда вы можете <a href="/?url=user/auth">авторизоваться</p>
        </form>
      <?php else: ?>
        <!--Форма для сокращения ссылок-->
        <p>Вам нужно сократить ссылку? Сейчас мы это сделаем!</p>
        <form action="/" method="post" class="form-control">
          <input type="text" name="long_link" placeholder="Длинная ссылка" value="<?=$_POST['long_link']?>"><br>
          <input type="text" name="short_link" placeholder="Короткое название" value="<?=$_POST['short_link']?>"><br>
          <!--Блок сообщений с ошибками-->
          <div class="error"><?=$data[0]['message']?></div>
          <button class="btn" id="send">Уменьшить</button>
        </form>
        <!--Вывод всех имеющихся сокращенных ссылок-->
        <?php for($i = 0; $i < count($data[1]); $i++): ?>
          <div class="links">
            <p><b>Длинная: <?=$data[1][$i]['long_link']?></b></p>
            <p><b>Короткая: </b><a href="<?=$data[1][$i]['long_link']?>"><u><?=$data[1][$i]['short_link']?></u></a></p>
            <form action="/" method="post">
              <input type="hidden" name="link_id_delete" value="<?=$data[1][$i]['id']?>">
              <button class="btn">Удалить <i class="fas fa-trash-alt"></i></button>
            </form>
          </div>
        <?php endfor; ?>
      <?php endif; ?>
    </div>
  </div>

  <!--подключаем футер сайта-->
  <?php require 'public/blocks/footer.php' ?>
</body>
</html>
