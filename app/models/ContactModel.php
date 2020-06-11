<?php
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;

  require_once 'vendor/autoload.php';

  class ContactModel {
    private $user_name;
    private $user_email;
    private $user_age;
    private $user_message;

    public function setData($user_name, $user_email, $user_age, $user_message) {
      $this->user_name = $user_name;
      $this->user_email = $user_email;
      $this->user_age = $user_age;
      $this->user_message = $user_message;
    }

    // в функции будем проверять на корректность значий в переменных
    public function validForm() {
      if(strlen($this->user_name) < 3)
        return "Имя слишком короткое";
      else if(strlen($this->user_email) < 3)
        return "Email слишком короткий";
      else if(!is_numeric($this->user_age) || $this->user_age <= 0 || $this->user_age > 90)
        return "Вы ввели не возраст";
      else if(strlen($this->user_message) < 10)
        return "Сообщение слишком короткое";
      else
        return "Верно";
    }

    public function index() {
      $mail = new PHPMailer(true);
      try {
        // Настройки отправки
        $mail->SMTPDebug = 0;                                       // Указываем чтобы не было информации про отправку писем
        $mail->isSMTP();                                            // Указываем что SMTP будет использоваться
        $mail->Host       = 'smtp.mail.ru';                         // Указываем SMTP сервера
        $mail->SMTPAuth   = true;                                   // Включаем SMTP авторизацию
        $mail->Username   = 'testhomets@mail.ru';                   // SMTP логин
        $mail->Password   = 'Fallow213&';                           // SMTP пароль
        $mail->SMTPSecure = 'ssl';                                  // Включаем TLS шифрование. Можно - `ssl`
        $mail->Port       = 465;                                    // TCP порт для подключения

        // Тот от кого письмо будет отправлено
        $mail->setFrom($this->user_email, 'Гость сайта');

        // Тот кому придет письмо
        $mail->addAddress('jean41@yandex.ru', 'Main User');

        // Само сообщение
        $mail->isHTML(true); // Говорим что сообщение может содержать HTML
        $mail->Subject = 'Сообщение с сайта'; // Тема сообщения

        // Сообщение от пользователя
        $text = "Имя отправителя: $this->user_name. Email: $this->user_email. Возраст: $this->user_age. Сообщение: $this->user_message.";

        // Сообщение с HTML
        $mail->Body = $text;

        $mail->AltBody = 'Новое сообщение через PHPMailer';

        // Устанавливаем кодировку
        $mail->CharSet = 'UTF-8';
        $mail->Encoding = 'base64';

        $mail->send();
        return 'Сообщение было отправлено';
      } catch (Exception $e) {
          return "<p>Сообщение не было отправлено!</p>
                  <p>Ошибка: {$mail->ErrorInfo}.</p>";
        }
    }
  }
