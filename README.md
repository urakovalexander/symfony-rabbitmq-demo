# Symfony RabbitMQ Demo

Проект для демонстрации отправки писем через RabbitMQ с использованием Symfony.

## Описание

Этот проект демонстрирует, как отправлять письма асинхронно через RabbitMQ. Письма ставятся в очередь и обрабатываются воркером, что позволяет избежать блокировки основного потока выполнения.

## Структура проекта

- `src/Controller/MailController.php` – контроллер для отправки писем.
- `src/Message/SendEmailMessage.php` – класс сообщения для очереди.
- `src/MessageHandler/SendEmailMessageHandler.php` – обработчик сообщений, отправляющий письма.
- `templates/mail/form.html.twig` – шаблон формы для ввода данных письма.

## Установка

1. Клонируйте репозиторий:

   ```bash
   git clone https://github.com/urakovalexander/symfony-rabbitmq-demo.git
   ```

2. Перейдите в папку с проектом:

   ```bash
   cd symfony-rabbitmq-demo
   ```

3. Установите зависимости с помощью Composer:

   ```bash
   composer install
   ```

4. Зарегистрируйтесь на почтовом сервере (например, [Mailtrap](https://mailtrap.io/)) и получите учетные данные SMTP. Настройте переменные окружения в файле `.env`:

   ```
   MAILER_DSN=smtp://username:password@sandbox.smtp.mailtrap.io:2525
   ```

5. Запустите Docker-контейнеры:

   ```bash
   docker-compose up -d
   ```

6. Запустите воркер для обработки очереди:

   ```bash
   php bin/console messenger:consume
   ```

7. Запустите сервер Symfony:

   ```bash
   symfony server:start
   ```

8. Откройте браузер и перейдите по адресу `http://localhost:8000/send-mail`.

## Зависимости

- Symfony 7.2
- RabbitMQ
- Composer
- Docker

## Автор

Alexander Urakov 
