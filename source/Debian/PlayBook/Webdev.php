<?php


namespace Phansible\Debian\PlayBook;






use Phansible\Debian\Role\MariaDB;
use Phansible\Debian\Role\NPM;

class Webdev extends Minimal
{

    use NPM;
    use MariaDB;


    public function __construct($name="webdev") {
        parent::__construct($name);




        $httpRecipe=new \Phansible\Debian\Recipe\PHP7ModApache('HTTP');
        $this->addRecipe($httpRecipe);

        $npmRole=$this->buildRoleNPM();
        $mariaRole=$this->buildRoleMariaDB();


        $HTTPRecipe=$this->getRecipeByName('HTTP');
        $HTTPRecipe->addRole($npmRole);
        $HTTPRecipe->addRole($mariaRole);

    }


}

