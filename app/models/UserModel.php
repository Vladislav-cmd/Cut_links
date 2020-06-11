<?php
  // выполним подключение к БД
  require_once 'DB.php';

  class UserModel {
    private $email;
    private $login;
    private $pass;

    private $_db = null;

    public function __construct() {
      $this->_db = DB::getInstanse();
    }

    public function setData($email, $login, $pass) {
      $this->email = $email;
      $this->login = $login;
      $this->pass = $pass;
    }

    // в функции будем проверять на корректность значий в переменных
    public function validForm() {
      if(strlen($this->email) < 3)
        return "Email слишком короткий";
      else if(strlen($this->login) < 3)
        return "Логин слишком короткий";
      else if($this->getAllLogins($this->login))
        return "Пользователь с таким логином уже существует";
      else if(strlen($this->pass) < 3)
        return "Пароль не менее 3 символов";
      else
        return "Верно";
    }

    public function getAllLogins($login) {
      $result = $this->_db->query("SELECT * FROM `users` WHERE `login` = '$login'");
      $user = $result->fetch(PDO::FETCH_ASSOC);

      if($user['login'] == $login)
        return 'Пользователь с таким логином уже существует';
    }

    // функция будет добавлять пользователя в БД
    public function addUser() {
      $sql = 'INSERT INTO users(email, login, pass) VALUES(:email, :login, :pass)';
      $query = $this->_db->prepare($sql);
      $pass = password_hash($this->pass, PASSWORD_DEFAULT);

      $query->execute(['email' => $this->email, 'login' => $this->login, 'pass' => $pass]);

      $this->setAuth($this->login);
    }

    // получаем данные конкретного пользователя
    public function getUser() {
      $login = $_COOKIE['log'];
      $result = $this->_db->query("SELECT * FROM `users` WHERE `login` = '$login'");
      return $result->fetch(PDO::FETCH_ASSOC);
    }

    // функция для выхода из УЗ пользователя
    public function logOut() {
      setcookie('log', $this->login, time() - 3600, '/');
      unset($_COOKIE['log']);
      header('Location: /?url=user/auth');
    }

    // функия для авторизации, получаем данные из формы авторизации
    public function auth($login, $pass) {
      $result = $this->_db->query("SELECT * FROM `users` WHERE `login` = '$login'");
      $user = $result->fetch(PDO::FETCH_ASSOC);

      // делаем проверки
      if($user['login'] == '')
        return 'Пользователя с таким логином не существует';
      else if(password_verify($pass, $user['pass']))
        $this->setAuth($login);
      else
        return 'Пароли не совпадают';
    }

    public function setAuth($login) {
      setcookie('log', $login, time() + 3600, '/');
      header('Location: /?url=user/index');
    }
  }
