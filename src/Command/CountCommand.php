<?php

namespace App\Command;

use App\Services\Count;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'Count',
    description: 'Add a short description for your command',
)]
class CountCommand extends Command
{
    public function __construct()
    {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $count = new Count();

        $result = $count->getOnesRev1(1234567890);
        $result2 = $count->getOnesRev2(1234567890);

        $output->writeln('<info> Результат getOnesRev1: ' . $result . '</info>');
        $output->writeln('<info> Результат getOnesRev2: ' . $result2 . '</info>');

        return Command::SUCCESS;
    }
}
