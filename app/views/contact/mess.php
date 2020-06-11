<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Обратная связь</title>
  <meta name="description" content="Обратная связь сайта">

  <!--подключаем стили-->
  <link rel="stylesheet" href="/public/css/main.css" charset="utf-8">
  <link rel="stylesheet" href="/public/css/form_contact.css" charset="utf-8">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" crossorigin="anonymous">
</head>
<body>
  <!--подключаем шапку сайта-->
  <?php require 'public/blocks/header.php' ?>

  <!--ОСНОВНАЯ ЧАСТЬ САЙТА-->
  <div class="container main">
    <div class="all">
      <div class="contact">
          <!--Форма обратной связи-->
        <h1>Обратная связь</h1><br>
        <p>Напишите нам, если у вас есть вопросы</p>
        <form action="/" method="post" class="form-control">
          <input type="text" name="name" placeholder="Введите имя" value="<?=$_POST['name']?>"><br>
          <input type="email" name="email" placeholder="Введите email" value="<?=$_POST['email']?>"><br>
          <input type="text" name="age" placeholder="Введите возраст" value="<?=$_POST['age']?>"><br>
          <textarea name="message" placeholder="Введите само сообщение"><?=$_POST['message']?></textarea>
          <!--Блок сообщений с ошибками-->
          <div class="error"><?=$data['message']?></div>
          <button class="btn" id="send">Отправить</button>
        </form>
      </div>
    </div>
  </div>

  <!--подключаем футер сайта-->
  <?php require 'public/blocks/footer.php' ?>
</body>
</html>
