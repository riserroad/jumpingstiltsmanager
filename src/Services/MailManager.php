<?php

namespace App\Services;

use App\Entity\Lending;
use Swift_Mailer;

class MailManager
{
    private $mailer;
    private $twig;

    public function __construct(Swift_Mailer $mailer, \Twig\Environment $twig)
    {
        $this->mailer = $mailer;
        $this->twig = $twig;
    }

    public function sendLendingAlertMail(Lending $lending)
    {
        $message = new \Swift_Message('Alert Location');
        $message
            ->setFrom('robot@riser-road.fr', 'Riser Road')
            ->setTo(
                [
                    'president.riser.road@gmail.com',
                    'tresorier.riserroad@gmail.com',
                    'secret.riserroad@gmail.com',
                    'vicetresorier.riserroad@gmail.com',
                ]
            )
            ->setBody(
                $this->twig->render(
                    'mail/lendingAlert.txt.twig',
                    [
                        'lending' => $lending,
                    ]
                ),
                'text/plain'
            );
        $this->mailer->send($message);
    }
}
