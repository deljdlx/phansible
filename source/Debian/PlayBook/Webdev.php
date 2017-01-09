<?php


namespace Phansible\Debian\PlayBook;






use Phansible\Debian\Role\MariaDB;
use Phansible\Debian\Role\NPM;
use Phansible\Debian\Role\Virtualbox;

class Webdev extends Minimal
{

    use NPM;
    use MariaDB;
    use Virtualbox;


    public function __construct($name="webdev") {
        parent::__construct($name);




        $httpRecipe=new \Phansible\Debian\Recipe\PHP7ModApache('HTTP');
        $this->addRecipe($httpRecipe);


        $npmRole=$this->buildRoleNPM();
        $mariaRole=$this->buildRoleMariaDB();



        $HTTPRecipe=$this->getRecipeByName('HTTP');
        $HTTPRecipe->addRole($npmRole);
        $HTTPRecipe->addRole($mariaRole);

        //$virtualbox=$this->buildRoleVirtualbox();
        //$HTTPRecipe->addRole($virtualbox);



    }


}

