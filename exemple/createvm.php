<?php


//ansible-playbook --private-key=/cygdrive/d/vm/vagrant/test-00/.vagrant/machines/default/virtualbox/private_key -u vagrant -i hosts test.yml

require(__DIR__.'/../vendor/autoload.php');



$machineHTTP=new \Phansible\VagrantMachine();
$machineHTTP->setPublic(true);


if(!is_dir(__DIR__.'/__shared')) {
	mkdir(__DIR__.'/__shared');
}

$machineHTTP->addSharedFolder(__DIR__.'/__shared', '/shared');


$machineHTTP->create(__DIR__.'/machine/http');





$machineBDD=new \Phansible\VagrantMachine();
$machineBDD->setPublic(true);
$machineBDD->create(__DIR__.'/machine/bdd');


