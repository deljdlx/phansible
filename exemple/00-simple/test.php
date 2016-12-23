<?php


//ansible-playbook --private-key=/cygdrive/d/vm/vagrant/test-00/.vagrant/machines/default/virtualbox/private_key -u vagrant -i hosts test.yml

require(__DIR__.'/../../vendor/autoload.php');






$machineHTTP=new \Phansible\VagrantMachine();
$machineHTTP->setIp('192.168.180.151');
$machineHTTP->create(__DIR__.'/machine/http');
$machineHTTP->setSSHKeyFile(__DIR__.'/machine/http/.vagrant/machines/default/virtualbox/private_key');


$project=new \Phansible\Project(__DIR__.'/__project');


$groupHTTP=$project->createGroup('web');
$groupHTTP->addMachine($machineHTTP);




$machineBDD=new \Phansible\VagrantMachine();
$machineBDD->setIp('192.168.180.152');
$machineBDD->create(__DIR__.'/machine/bdd');
$machineBDD->setSSHKeyFile(__DIR__.'/machine/bdd/.vagrant/machines/default/virtualbox/private_key');



$groupBDD=$project->createGroup('bdd');
$groupBDD->addMachine($machineBDD);



/*
$group->createMachineByIP('192.168.180.150')
        ->setSSHKeyFile('/Users/Julien/www/phansible/script/vagrant/.vagrant/machines/default/virtualbox/private_key')
    //->addMachineByIP('192.168.1.89')
        //->setSSHKeyFile('/cygdrive/e/shared/var/www/project/phansible/script/vagrant/.vagrant/machines/default/virtualbox/private_key')

	//->addMachineByIP('192.168.1.94')
	//->addMachineByIP('192.168.1.33')
;
*/





$playbook=new \Phansible\Debian\PlayBook\LAMP();


$httpRecipe=$playbook->getRecipeByName('HTTP');
$httpRecipe->addGroup($groupHTTP);

$bddRecipe=$playbook->getRecipeByName('BDD');
$bddRecipe->addGroup($groupBDD);

$project->addPlayBook($playbook);

$project->create();


/*
$playbook->createRecipe('default configuration')
    ->addRole($essentialRole)
    ->addRole($rolePHP7)
    ->addRole($roleBDD)
;
*/





echo "\n";

exit();



//die('EXIT '.__FILE__.'@'.__LINE__);





$essentialRole=new \Phansible\Debian\Role\Essential();
$project->addRole($essentialRole);
/*
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
$task->upgradeAll();
*/

//$task->install('Install Python', 'python-minimal');



//===================================================================
$rolePHP7=new \Phansible\Debian\Role\PHP7();
$project->addRole($rolePHP7);

/*
$rolePHP7=$project->createRole('PHP7');
$task=$rolePHP7->createTask('main', '\Phansible\Debian\Task');
$task->createRawAction(
    'Add repo for PHP7',
    'apt_repository: repo="deb http://packages.dotdeb.org {{ ansible_distribution_release }} all" state=present',
    true
);
$task->createRawAction(
    'Add apt key for Debian',
    'apt_key: url=https://www.dotdeb.org/dotdeb.gpg state=present',
    true
);
$task->createAction('Update apt', array(
    'apt'=>'update_cache=yes'
), true);
$task->install('Install PHP7', 'php7.0-fpm');
*/
//===================================================================




//$task->install('Install apache', 'apache2');









/*
$roleBDD=$project->createRole('bdd');
$bddTask=$roleBDD->createTask('main', '\Phansible\Debian\Task');
$bddTask->install('Install MariaDB', 'mariadb-server');
*/

$roleBDD=new \Phansible\Debian\Role\BDD();
$project->addRole($roleBDD);





$playbook=$project->createPlaybook('test');

$playbook->createRecipe('default configuration')
	->addRole($essentialRole)
    ->addRole($rolePHP7)
    ->addRole($roleBDD)
;





$project->create();



