<?php

namespace App\Command;

use App\Service\PasswordService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class updatePasswordUserCommand extends Command
{
    // the name of the command (the part after "bin/console")
    protected static $defaultName = 'app:update-password-user';

    public function __construct(private PasswordService $passwordService)
    {
        parent::__construct();

    }

    protected function configure(): void
    {
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->passwordService->HashPasswordUser();
        return Command::SUCCESS;
    }
}