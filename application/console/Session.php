<?php
/**
 * 会话控制
 */
class Session extends Command
{
	
	//指令配置
	protected function configure()
	{
		//设置命令名,额外选项和描述信息
		$this->setName('session')
			->addOption('clear' , 'd' , Option::VALUE_NONE , 'clear all session' , null)
			->setDescription('Clear Session file');
	}

	//指令操作
	protected function execute(Input $input, Output $output)
	{
		//获取指令想选名称
		$path = $input->getOption('clear');
		if ($path) {
			//执行清楚会话信息操作
			unset($_SESSION);
			$output->writeln('Clear Session Successed');
		}else{
			$output->writeln('Clear Nothing');
		}
	}
}