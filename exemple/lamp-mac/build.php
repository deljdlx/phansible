<?php

namespace Phansible;
//ansible-playbook --private-key=/cygdrive/d/vm/vagrant/test-00/.vagrant/machines/default/virtualbox/private_key -u vagrant -i hosts test.yml


require(__DIR__.'/../../vendor/autoload.php');

$dir=getcwd();


$httpMachineIP=getVagrantIP(__DIR__.'/../machine/mac/http');

chdir(__DIR__.'/../machine/mac/bdd');
ob_start();
system("vagrant ssh -c \"hostname -I | cut -d' ' -f2\" 2>/dev/null");
$bddMachineIP=trim(ob_get_clean());

echo "Virtual HTTP machine IP : ".$httpMachineIP."\n";
echo "Virtual BDD machine IP : ".$bddMachineIP."\n";


chdir($dir);




$httpSSHKey=realpath(__DIR__.'/../machine/mac/http/.vagrant/machines/default/virtualbox/private_key');
echo "Set SSH key for HTTP machine : ".$httpSSHKey."\n";
$machineHTTP=new \Phansible\Machine();
$machineHTTP->setIp($httpMachineIP);
$machineHTTP->setSSHKeyFile(
	str_replace('\\', '/', $httpSSHKey)
);



$bddSSHKey=realpath(__DIR__.'/../machine/mac/bdd/.vagrant/machines/default/virtualbox/private_key');
echo "Set SSH key for BDD machine : ".$httpSSHKey."\n";

$machineBDD=new \Phansible\Machine();
$machineBDD->setIp($bddMachineIP);
$machineBDD->setSSHKeyFile(
	str_replace('\\', '/',$bddSSHKey)
);



$project=new \Phansible\Project(__DIR__.'/ansible');


$groupHTTP=$project->createGroup('web');
$groupHTTP->addMachine($machineHTTP);

$groupBDD=$project->createGroup('bdd');
$groupBDD->addMachine($machineBDD);


$playbook=new \Phansible\Debian\PlayBook\Webdev();
$playbook->addGroupToRecipe($groupHTTP, 'HTTP');
$playbook->addGroupToRecipe($groupBDD, 'BDD');

/*
$httpRecipe=$playbook->getRecipeByName('HTTP');
$httpRecipe->addGroup($groupHTTP);


$bddRecipe=$playbook->getRecipeByName('BDD');
$bddRecipe->addGroup($groupBDD);
*/


$project->addPlayBook($playbook);

$project->create();




echo "\n";


