<?php

namespace Phansible;
//ansible-playbook --private-key=/cygdrive/d/vm/vagrant/test-00/.vagrant/machines/default/virtualbox/private_key -u vagrant -i hosts test.yml


require(__DIR__.'/../../vendor/autoload.php');



{
    $httpMachineIP=getVagrantIP(__DIR__.'/../machine/mac/http');
    echo "Virtual HTTP machine IP : ".$httpMachineIP."\n";

    $bddMachineIP=getVagrantIP(__DIR__.'/../machine/mac/bdd');
    echo "Virtual BDD machine IP : ".$bddMachineIP."\n";


    $httpSSHKey=realpath(__DIR__.'/../machine/mac/http/.vagrant/machines/default/virtualbox/private_key');
    echo "Set SSH key for HTTP machine : ".$httpSSHKey."\n";
    $machineHTTP=new \Phansible\Machine($httpMachineIP);
    $machineHTTP->setSSHKeyFile($httpSSHKey);



    $bddSSHKey=realpath(__DIR__.'/../machine/mac/bdd/.vagrant/machines/default/virtualbox/private_key');
    echo "Set SSH key for BDD machine : ".$httpSSHKey."\n";

    $machineBDD=new \Phansible\Machine($bddMachineIP);
    $machineBDD->setSSHKeyFile($bddSSHKey);
}





$project=new \Phansible\Project(__DIR__.'/ansible');

{
    $groupHTTP=$project->createGroup('web');
    $groupHTTP->addMachine($machineHTTP);

    $groupBDD=$project->createGroup('bdd');
    $groupBDD->addMachine($machineBDD);
}



$playbook=new \Phansible\Debian\PlayBook\Webdev();
{
    $playbook->addGroupToRecipe($groupHTTP, 'HTTP');
    //$playbook->addGroupToRecipe($groupBDD, 'BDD');
}


$project->addPlayBook($playbook);

$project->create();




echo "\n";


