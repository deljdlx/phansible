<?php

require(__DIR__.'/vendor/autoload.php');




$project=new \Phansible\Project(__DIR__.'/__project');

$project->createNetwork('web')
	->addMachineByIP('192.168.1.94');


$roleDefaultRequirement=$project->createRole('defaultRequirements');

$task=$roleDefaultRequirement->createTask('main');




$task->createBlock('Install Vim', array(
	'apt'=>array(
		'name'=>'vim',
		'state'=>'latest'
	)
));



$task->createBlock('Install wget', array(
	'apt'=>array(
		'name'=>'wget',
		'state'=>'latest'
	)
));


$task->createBlock('apt-upgrade', array(
	'apt'=>array(
		'upgrade'=>'dist'
	)
));





$playbook=$project->createPlaybook('test');

$playbook->createRecipe('default configuration')
	->addRole($roleDefaultRequirement);
;





$project->create();



