<?php

namespace App\Controller;

use App\Message\SendEmailMessage;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Annotation\Route;

class MailController extends AbstractController
{
    #[Route('/send-mail', name: 'send_mail', methods: ['GET', 'POST'])]
    public function sendMail(Request $request, MessageBusInterface $bus): Response
    {
        if ($request->isMethod('POST')) {
            $to = $request->request->get('to');
            $subject = $request->request->get('subject');
            $body = $request->request->get('body');

            $bus->dispatch(new SendEmailMessage($to, $subject, $body));

            return new Response('Письмо поставлено в очередь!');
        }

        return $this->render('mail/form.html.twig');
    }
}
