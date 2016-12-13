<?php


//ansible-playbook --private-key=/cygdrive/d/vm/vagrant/test-00/.vagrant/machines/default/virtualbox/private_key -u vagrant -i hosts test.yml

require(__DIR__.'/vendor/autoload.php');




$project=new \Phansible\Project(__DIR__.'/__project');

$project->createGroup('web')
    ->addMachineByIP('192.168.180.150')
        ->setSSHKeyFile('/Users/Julien/www/phansible/script/vagrant/.vagrant/machines/default/virtualbox/private_key')
	//->addMachineByIP('192.168.1.94')
	//->addMachineByIP('192.168.1.33')
;


$roleDefaultRequirement=$project->createRole('defaultRequirements');
$task=$roleDefaultRequirement->createTask('main', '\Phansible\Debian\Task');


$task->createAction('Install Vim', array(
	'apt'=>array(
		'name'=>'vim',
		'state'=>'latest'
	)
));

$task->install('Install wget', 'wget');
$task->install('Install git', 'git');


$task->install('Install apache', 'apache2');

$task->upgradeAll();



$roleBDD=$project->createRole('bdd');
$bddTask=$roleBDD->createTask('main', '\Phansible\Debian\Task');
$bddTask->install('Install MariaDB', 'mariadb-server');





$playbook=$project->createPlaybook('test');

$playbook->createRecipe('default configuration')
	->addRole($roleDefaultRequirement)
    ->addRole($roleBDD)
;





$project->create();



