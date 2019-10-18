<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command ;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
class SymfonyStyleCommand extends Command{

  protected function configure()
  {
    $this
        ->setName('app:symfony:style')
        ->setDescription('Güzel output verir')
        ->setHelp('php bin/console app:symfony:style veya a:s:s şeklinde çalıştırılabilir') ;
  }
  protected function execute (InputInterface $input, OutputInterface $output){
    $io= new SymfonyStyle($input, $output);
    $io->title ('Stylish Title') ;

    $io->section ('Stylish section') ;

    $io->listing([
      'Item 1',
      'Item 2'
    ]);
    $io->table(
      ['Ad', 'Soyad'],
      [['Kadir', 'Yapici']]
    );
    $io->newLine(5);
    $io->caution("Caution");
    $io->progressStart (100);
    foreach (range(0,100) as $item) {
      $io->progressAdvance(1);
      sleep(1);
    }
    $io->progressFinish();
    //ask, confirm, ask hidden, choice, success, warning, error
  }
}
