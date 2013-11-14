<?php

namespace Jmoati\HelperBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Process\Process;

abstract class Command extends ContainerAwareCommand
{

    /**
     * @var OutputInterface
     */
    protected $output = null;

    protected function get($service)
    {
        return $this->getContainer()->get($service);
    }

    protected function has($service)
    {
        return $this->getContainer()->has($service);
    }

    protected function getParameter($name)
    {
        return $this->getContainer()->getParameter($name);
    }

    protected function hasParameter($name)
    {
        return $this->getContainer()->hasParameter($name);
    }

    /**
     * @param InputInterface  $input
     * @param OutputInterface $output
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->output = $output;
    }

    /**
     * @param string          $cmd
     * @param OutputInterface $output
     * @param string          $display_message
     * @param bool            $check_success
     *
     * @return Process
     */
    protected function runProcess($cmd, $display_message = null, $check_success = false)
    {
        if ($display_message && $this->output instanceof OutputInterface) {
            $this->write($display_message);
        }

        $process = new Process($cmd);
        $process->run();

        if ($check_success && $this->output instanceof OutputInterface) {
            $this->checkProcessExitCode($process);
        }

        return $process;
    }

    /**
     *
     * @param string $text
     */
    protected function write($text)
    {
        $this->output->write($text);
    }

    /**
     * @param Process         $process
     * @param OutputInterface $output
     */
    protected function checkProcessExitCode(Process $process)
    {
        if (0 == $process->getExitCode()) {
            $this->write(" <info>[DONE]</info>\n");
        } else {
            $this->write(" <error>[ERROR]</error>\n");
        }
    }
}
