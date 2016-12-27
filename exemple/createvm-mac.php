<?php


//ansible-playbook --private-key=/cygdrive/d/vm/vagrant/test-00/.vagrant/machines/default/virtualbox/private_key -u vagrant -i hosts test.yml

require(__DIR__.'/../vendor/autoload.php');




if(!is_dir(__DIR__.'/__shared')) {
    mkdir(__DIR__.'/__shared');
}


$machineHTTP=new \Phansible\VagrantMachine();
$machineHTTP->setIP('192.168.180.200');


$machineHTTP->addSharedFolder(__DIR__.'/__shared', '/shared');
$machineHTTP->create(__DIR__.'/machine/mac/http');





$machineBDD=new \Phansible\VagrantMachine();
$machineBDD->setIP('192.168.180.210');
$machineBDD->create(__DIR__.'/machine/mac/bdd');


