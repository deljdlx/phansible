<?php


//ansible-playbook --private-key=/cygdrive/d/vm/vagrant/test-00/.vagrant/machines/default/virtualbox/private_key -u vagrant -i hosts test.yml

require(__DIR__.'/vendor/autoload.php');




$project=new \Phansible\Project(__DIR__.'/__project');

$project->createGroup('web')
    ->addMachineByIP('192.168.180.150')
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



$roleBDD=$project->createRole('bdd');
$bddTask=$roleBDD->createTask('main', '\Phansible\DebianTask');
$bddTask->install('Install MariaDB', 'mariadb-server');





$playbook=$project->createPlaybook('test');

$playbook->createRecipe('default configuration')
	->addRole($roleDefaultRequirement)
    ->addRole($roleBDD)
;





$project->create();



