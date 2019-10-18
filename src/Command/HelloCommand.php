<?php

namespace App\Command;

use App\Service\NameGenerator;
use Symfony\Component\Console\Command\Command ;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class HelloCommand extends Command{
  public $nameGenerator;

  public function __construct (NameGenerator $nameGenerator){
    $this->nameGenerator = $nameGenerator ;
    parent::__construct();
  }

  protected function configure()
  {
    $this
        ->setName('app:hello')
        ->setDescription('Merhaba mesajı verir')
        ->setHelp('php bin/console app:help veya a:h şeklinde çalıştırılabilir')
        ->addArgument('name', InputArgument::OPTIONAL, 'Kime selam verilsin ? ', 'kadir')
        ->addOption('yas', 'y', InputOption::VALUE_REQUIRED, 'Yaşınızı giriniz', 25)
        ;
  }
  protected function execute (InputInterface $input, OutputInterface $output){
    $name= $input->getArgument('name');
    //$name = $this->nameGenerator->randomName();
    $yas = $input -> getOption ('yas');

    $output -> writeln ('Merhaba ' . $name . ' ve yaşınız: ' . $yas );
  }
}
