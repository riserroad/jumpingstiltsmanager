<?php

namespace App\Command;

use App\Services\LendingManager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use App\Services\MailManager;

class RiserroadVerifLendingCommand extends Command
{
    protected static $defaultName = 'riserroad:verif-lending';
    private $mailManager;
    private $lendingManager;

    public function __construct(MailManager $mailManager, LendingManager $lendingManager)
    {
        $this->mailManager = $mailManager;
        $this->lendingManager = $lendingManager;

        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setDescription('Verifing the lendings')
            ->addOption('mail', null, InputOption::VALUE_NONE, 'send alert mail');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $badLendings = $this->lendingManager->getBadLending();


        if ($badLendings) {
            if ($input->getOption('mail')) {
                $this->mailManager->sendLendingAlertMail($badLendings);
            }

            foreach ($badLendings as $badLending) {
                $io->warning($badLending->getRiser() . ' n\'as pas rendu la paire ' . $badLending->getJumpingTilt() . ' , la location est terminé le : ' .   $badLending->getEndDate()->format('d/m/Y'));
            }
        }
        $io->success('test finished');

        return 0;
    }
}
