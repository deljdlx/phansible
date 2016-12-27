<?php

require(__DIR__.'/../../vendor/autoload.php');







$machineHTTP=new \Phansible\Machine();
$machineHTTP->setIp('192.168.1.29');
$machineHTTP->setSSHKeyFile(
	str_replace('\\', '/', __DIR__.'/../machine/http/.vagrant/machines/default/virtualbox/private_key')
);



$machineBDD=new \Phansible\Machine();
$machineBDD->setIp('192.168.1.23');
$machineBDD->setSSHKeyFile(
	str_replace('\\', '/',__DIR__.'/../machine/bdd/.vagrant/machines/default/virtualbox/private_key')
);



$project=new \Phansible\Project(__DIR__.'/ansible');


$groupHTTP=$project->createGroup('web');
$groupHTTP->addMachine($machineHTTP);

$groupBDD=$project->createGroup('bdd');
$groupBDD->addMachine($machineBDD);





$playbook=new \Phansible\Debian\PlayBook\LAMP();


$httpRecipe=$playbook->getRecipeByName('HTTP');
$httpRecipe->addGroup($groupHTTP);

$bddRecipe=$playbook->getRecipeByName('BDD');
$bddRecipe->addGroup($groupBDD);

$project->addPlayBook($playbook);

$project->create();




echo "\n";


