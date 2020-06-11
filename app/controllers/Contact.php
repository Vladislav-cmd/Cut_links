<?php

  class Contact extends Controller {

    public function index() {
      $this->view('contact/index');
    }

    public function mess() {
      $data = [];
      if(isset($_POST['name'])) {
        $mail = $this->model('ContactModel');
        $mail->setData($_POST['name'], $_POST['email'], $_POST['age'], $_POST['message']);

        // Выполняется проверка
        $isValid = $mail->validForm();
        if($isValid == "Верно")
          $data['message'] = $mail->index();
        else
          $data['message'] = $isValid;
      }

      $this->view('contact/mess', $data);
    }
  }
