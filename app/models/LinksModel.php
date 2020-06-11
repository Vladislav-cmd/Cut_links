<?php
  // выполним подключение к БД
  require_once 'DB.php';

  class LinksModel {
    private $long_link;
    private $short_link;
    private $author;

    private $_db = null;

    public function __construct() {
      $this->_db = DB::getInstanse();
    }

    public function setData($long_link, $short_link, $author) {
      $this->long_link = $long_link;
      $this->short_link = $short_link;
      $this->author = $author;
    }

    // в функции будем проверять на корректность значий в переменных
    public function validForm() {
      if($this->long_link == '')
        return "Вы не ввели длинную ссылку";
      else if(strlen($this->long_link) < 5)
        return "Вы ввели слишком короткую ссылку в поле 'Длинная ссылка'";
      else if($this->short_link == '')
        return "Вы не ввели короткую ссылку";
      else if(strlen($this->short_link) < 3)
        return "Вы ввели слишком короткую ссылку в поле 'Короткая ссылка'";
      else if($this->checkShortLink($this->short_link))
        return "Такое сокращение ссылки уже существует";
      else
        return "Верно";
    }

    // функция для проверки уже существующих сокращений ссылок
    public function checkShortLink($short_link) {
      $result = $this->_db->query("SELECT * FROM `links` WHERE `short_link` = '$short_link'");
      $link = $result->fetch(PDO::FETCH_ASSOC);

      if($link['short_link'] == $short_link)
        return "Такое сокращение ссылки уже существует";
    }

    // функция для добавления ссылки в БД
    public function addLink() {
      $sql = 'INSERT INTO links(long_link, short_link, author) VALUES(:long_link, :short_link, :author)';
      $query = $this->_db->prepare($sql);
      $query->execute(['long_link' => $this->long_link, 'short_link' => $this->short_link, 'author' => $this->author]);
    }

    // функция для получения всех ссылок конкретного пользователя
    public function getLinks($author) {
      $result = $this->_db->query("SELECT * FROM `links` WHERE `author` = '$author'");
      return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    // функция для удаления конкретной ссылки из БД
    public function deleteThisLink($linkID) {
       $sql = "DELETE FROM `links` WHERE `id` = '$linkID'";
       $query = $this->_db->prepare($sql);
       $query->execute();
    }
  }
