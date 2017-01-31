<?php

namespace Phansible;
//ansible-playbook --private-key=/cygdrive/d/vm/vagrant/test-00/.vagrant/machines/default/virtualbox/private_key -u vagrant -i hosts test.yml


require(__DIR__ . '/../../vendor/autoload.php');


    {
        $machineIP = getVagrantIP(__DIR__ . '/../machine/mac/http');
        echo "Virtual HTTP machine IP : " . $machineIP . "\n";


        $SSHKey = realpath(__DIR__ . '/../machine/mac/http/.vagrant/machines/default/virtualbox/private_key');
        echo "Set SSH key for HTTP machine : " . $SSHKey . "\n";
        $webdevMachine = new \Phansible\Machine($machineIP);
        $webdevMachine->setSSHKeyFile($SSHKey);
    }


$project = new \Phansible\Project(__DIR__ . '/ansible');

    {
        $groupWebdev = $project->createGroup('Webdev');
        $groupWebdev->addMachine($webdevMachine);
    }


$playbook = new \Phansible\Debian\PlayBook\Webdev();


$playbook->addGroupToRecipe('HTTP', $groupWebdev);


$project->addPlayBook($playbook);

$project->create();


echo "\n";


