<?php
namespace AppBundle\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Output\OutputInterface;
use AppBundle\Service\ArticleService;

class AddArticleCommand extends Command
{
    public function __construct(ArticleService $articleService,$name = null)
    {
        $this->articleService = $articleService;
        parent::__construct($name);
    }

    protected function configure()
    {
        $this
            // the name of the command (the part after "bin/console")
            ->setName('app:add-article')

            // the short description shown while running "php bin/console list"
            ->setDescription('Adds a new article.')

            // the full command description shown when running the command with
            // the "--help" option
            ->setHelp('This command allows you to add a new article.')

            ->addArgument('header', InputArgument::REQUIRED, 'Article header.')
            ->addArgument('text', InputArgument::REQUIRED, 'Article text.')
        ;
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $header = $input->getArgument('header');
        $text = $input->getArgument('text');
        $this->articleService->create($header, $text);
        $output->writeln([
            'Created news',
            '============',
            '',
        ]);

        // retrieve the argument value using getArgument()
        $output->writeln('Header: '.$input->getArgument('header'));
        $output->writeln('Text: '.$input->getArgument('text'));
    }
}