<?php
namespace FreePBX\Install;

use Symfony\Component\Console\Command\HelpCommand;
use Symfony\Component\Console\Helper\DescriptorHelper;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
/**

* HelpCommand displays the help for a given command.
*
* @author Fabien Potencier <fabien@symfony.com>
*/
class FreePBXHelpCommand extends HelpCommand {
	private $command;

	public function setCommand(FreePBXInstallCommand $command) {
		$this->command = $command;
	}
	protected function execute(InputInterface $input, OutputInterface $output) {	
		$output->writeln("   _              _               ___         ___                     ");
		$output->writeln(" / _  \ ____    |  |             |     \    /     |                    ");
		$output->writeln("| |  | |  __  __|  |__           |      \  /      |                    ");
		$output->writeln("| |__| | |___|__    __| __  _  _ |  |\   \/   /|  |  __   _  ___     ");
		$output->writeln("|  _   | _   |  |  |   /  \| '__/|  | \      / |  |/    \| |/ __ \    ");
		$output->writeln("| |  | |___| |  |  |  |  _/|  |  |  |  \____/  |  |  ()  | | |  | |   ");
		$output->writeln("|_|  |_|_____|  |__|   \___||_|  |__|          |__|\ ___/|_|_|  |_|   ");

		if (null === $this->command) {
			$this->command = $this->getApplication()->find($input->getArgument('command_name'));
		}
		if ($input->getOption('xml')) {
			$input->setOption('format', 'xml');
		}
		$helper = new DescriptorHelper();
		$helper->describe($output, $this->command, array(
			'format' => $input->getOption('format'),
			'raw' => $input->getOption('raw'),
		));
		$this->command = null;
	}
}
