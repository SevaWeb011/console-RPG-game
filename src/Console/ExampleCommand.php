<?php

namespace App\Console;

use App\Model\Hero;
use App\Model\Monster;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\ConfirmationQuestion;
use Symfony\Component\Console\Question\Question;

final class ExampleCommand extends Command
{
    private int $day = 0;

    protected function configure(): void
    {
        parent::configure();

        $this->setName('example');
        $this->setDescription('A console command');

//        $this
//            // ...
//            ->addArgument('name', InputArgument::REQUIRED, 'Who do you want to greet?')
//            ->addArgument('last_name', InputArgument::OPTIONAL, 'Your last name?')
//        ;
    }


    protected function execute(InputInterface $input, OutputInterface $output): int
    {

//        $output->writeln(sprintf("\033\143"));
//        $helper = $this->getHelper('question');
//        $question = new Question('Continue with this action?', '');
//        $color = $helper->ask($input, $output, $question);
//        $output->writeln('You have just selected: ' . $input);
//        $output->writeln('You have just selected: ' . $color);
//        $helper = $this->getHelper('question');
//        $question = new Question('Continue with this action?', '');
//
//        $output->writeln('<info>Hello, World!</info>');
//
//
//        $color = $helper->ask($input, $output, $question);


        while (true) {
            $this->outputGameMenu($output);

            $question = new Question('Введите цифру:', '');
            $helper = $this->getHelper('question');
            $answer = $helper->ask($input, $output, $question);

            if ((int)$answer === 1) {
                $this->nextDay();
            }

            if ((int)$answer === 2) {
                $this->processFight($input, $output);
            }

            $output->writeln($answer);

            // $output->writeln(sprintf("\033\143"));
        }


       return Command::SUCCESS;
    }

    private function processFight(InputInterface $input, OutputInterface $output): void
    {
        $hero = new Hero();
        $monster = new Monster();

        while (true) {
            $question = new Question('Введите цифру:', '');

            $this->outputFightMenu($output, $monster);

            $helper = $this->getHelper('question');
            $userChoice = $helper->ask($input, $output, $question);

            if ((int)$userChoice === 1) {
                $hero->attackTo($monster);
                $this->outputFightMenu($output, $monster);
            } else {
                break;
            }
        }
    }

    private function outputGameMenu(OutputInterface $output): void
    {
        $output->writeln(sprintf("\033\143"));
        $output->writeln('День ' . $this->getDay());
        $output->writeln('Приветствуем герой!');
        $output->writeln('Выберите варианты действий:');
        $output->writeln('1. Следующий день');
        $output->writeln('2. Сразиться с монстром');
    }

    private function outputFightMenu(OutputInterface $output, Monster $monster): void
    {
        $output->writeln(sprintf("\033\143"));
        $output->writeln('Идет сражение!');
        $output->writeln('Здоровье врага: ' . $monster->getHealth());
        $output->writeln('Сила монстра:' . $monster->getPower());
        $output->writeln('1. Ударить монстра');
    }

    private function getDay(): int
    {
        return $this->day;
    }

    private function nextDay(): void
    {
        $this->day++;
    }
}
