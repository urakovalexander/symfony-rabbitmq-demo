<?php

namespace App\MessageHandler;

use App\Message\SendEmailMessage;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

#[AsMessageHandler]
class SendEmailMessageHandler
{
    public function __construct(private MailerInterface $mailer) {}

    public function __invoke(SendEmailMessage $message): void
    {
        $email = (new Email())
            ->from('noreply@example.com')
            ->to($message->to)
            ->subject($message->subject)
            ->text($message->body);

        $this->mailer->send($email);
    }
}
