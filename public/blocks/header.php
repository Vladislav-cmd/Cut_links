<header>
  <div class="container top-menu">
    <div class="logo">
      <img src="/public/img/cut_this_link.png" alt="Logo">
      <!--Лозунг-->
      <span>Уберем все лишнее из ссылки!</span>
    </div>
    <?php if($_COOKIE['log'] == ''): ?>
      <!--класс nav - класс навигации, где будет несколько ссылок-->
      <div class="nav">
        <a href="/?url=home/index">Главная</a>
        <a href="/?url=contact/index">Про нас</a>
        <a href="/?url=contact/mess">Контакты</a>
        <a href="/?url=user/auth">Войти</a>
      </div>
    <?php else: ?>
      <div class="nav">
        <a href="/?url=home/index">Главная</a>
        <a href="/?url=contact/index">Про нас</a>
        <a href="/?url=contact/mess">Контакты</a>
        <a href="/?url=user/index">Кабинет пользователя</a>
      </div>
    <?php endif; ?>
  </div>
</header>
