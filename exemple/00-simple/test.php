<?php


//ansible-playbook --private-key=/cygdrive/d/vm/vagrant/test-00/.vagrant/machines/default/virtualbox/private_key -u vagrant -i hosts test.yml

require(__DIR__.'/vendor/autoload.php');




$project=new \Phansible\Project(__DIR__.'/__project');

$project->createGroup('web')
    ->addMachineByIP('172.19.16.178')
	//->addMachineByIP('192.168.1.94')
	//->addMachineByIP('192.168.1.33')
;


$roleDefaultRequirement=$project->createRole('defaultRequirements');

$task=$roleDefaultRequirement->createTask('main', '\Phansible\DebianTask');




$task->createBlock('Install Vim', array(
	'apt'=>array(
		'name'=>'vim',
		'state'=>'latest'
	)
));



$task->install('Install wget', 'wget');
$task->install('Install git', 'git');
$task->upgradeAll();





$playbook=$project->createPlaybook('test');

$playbook->createRecipe('default configuration')
	->addRole($roleDefaultRequirement);
;





$project->create();



