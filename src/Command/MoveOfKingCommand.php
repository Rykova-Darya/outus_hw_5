<?php

namespace App\Command;

use App\Services\King;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'MoveOfKing',
    description: 'Add a short description for your command',
)]
class MoveOfKingCommand extends Command
{
    public function __construct()
    {
        parent::__construct();
    }

//    protected function configure(): void
//    {
//        $this
//            ->addArgument('arg1', InputArgument::OPTIONAL, 'Argument description')
//            ->addOption('option1', null, InputOption::VALUE_NONE, 'Option description')
//        ;
//    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $input = readline("Введите позицию короля (например, E4) или битовое значение (от 0 до 63): ");
        $king = new King($input);

        echo "Начальная позиция:" . PHP_EOL;
        $king->printBoard();

        $king->steps();

        echo PHP_EOL . "Доступные ходы:" . PHP_EOL;
        $king->printBoard(1);
        return Command::SUCCESS;

    }
}
