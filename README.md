SMTP AUTHENTICATION TEST
========================

## Requirement
  - [docker](https://docs.docker.com/engine/install/)
  - [docker-compose for linux](https://docs.docker.com/compose/install/standalone/)

## Change SMTP configuration ```smtp/smtp2go.php```

  ### 1. Test with Mailhog
  ```bash
    $mail->Host = "mailhog";
    $mail->Port = "1025";
    $mail->SMTPAuth = false;
    $mail->SMTPSecure = '';
    $mail->Username = "";
    $mail->Password = "";

    $mail->From = "noreply@domain.com";
    $mail->FromName = "Noreply";
    $mail->AddAddress("foo@domain.com", "Foo");
    $mail->AddReplyTo("bar@domain.com", "Bar");
  ```

  ### 2. Test with real Email
  ```bash
    $mail->Host = "smtp.gmail.com";
    $mail->Port = "587";
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Username = "foo@gmail.com";
    $mail->Password = "foopwd";

    $mail->From = "noreply@gmail.com";
    $mail->FromName = "Noreply";
    $mail->AddAddress("foo@gmail.com", "Foo");
    $mail->AddReplyTo("bar@gmail.com", "Bar");
  ```

## Start docker containers
This will pull two docker images one is ```php:8.2-apache``` and ```mailhog/mailhog:latest```

Two TCP ports will open on local computer ```80``` webserver, ```8025``` Mailhog box

  ```bash
    docker-compose up -d
  ```

## Test send out email

Open your favorite browser

    ```bash
      http://localhost/smtp2go.php
    ```

If email send success you should see ```Message has been sent.```

If email failed you should see ```Message was not sent.Mailer error: SMTP connect() failed. Please Check your configuration```
## Access mailbox

If you test with mailhog open your favourite browser

    ```bash
      http://localhost:8025
    ```

If you test with real email you can login to your mailbox