<?php
    class Home extends Controller {
        public function index() {
          $data = [];

          // для вывода всех ссылок передаем в дополнительные параметры
          // изначально массив из двух массивов, второй элемент которого и есть
          // массив со всеми ссылками из БД
          $links = $this->model('LinksModel');

            // функционал для обработки формы регистрации
            if(isset($_POST['login'])) {
               $user = $this->model('UserModel');
               $user->setData($_POST['email'], $_POST['login'], $_POST['pass']);

               $isValid = $user->validForm();
               if($isValid == "Верно")
                $user->addUser();
               else
                $data['message'] = $isValid;
            }

            // функционал для обработки формы с ссылками
            if(isset($_POST['short_link'])) {
              $link = $this->model('LinksModel');
              $link->setData($_POST['long_link'], $_POST['short_link'], $_COOKIE['log']);

              $isValid = $link->validForm();
              if($isValid == "Верно")
                $link->addLink();
              else
                $data['message'] = $isValid;
            }

            // функционал для удаление конкретной ссылки
            if(isset($_POST['link_id_delete'])) {
              $delete_link = $this->model('LinksModel');
              // в функцию передаём id той ссылки, которую хотим удалить
              $delete_link->deleteThisLink($_POST['link_id_delete']);
            }

          $this->view('home/index', [$data, $links->getLinks($_COOKIE['log'])]);
        }
    }
