<?php


//ansible-playbook --private-key=/cygdrive/d/vm/vagrant/test-00/.vagrant/machines/default/virtualbox/private_key -u vagrant -i hosts test.yml

require(__DIR__.'/../../vendor/autoload.php');



$machineHTTP=new \Phansible\VagrantMachine();
$machineHTTP->setPublic(true);


if(!is_dir(__DIR__.'/shared')) {
	mkdir(__DIR__.'/shared');
}

$machineHTTP->addSharedFolder(__DIR__.'/shared', '/shared');


$machineHTTP->create(__DIR__.'/../machine/http');





$machineBDD=new \Phansible\VagrantMachine();
$machineBDD->setPublic(true);
$machineBDD->create(__DIR__.'/../machine/bdd');


