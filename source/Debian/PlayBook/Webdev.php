<?php


namespace Phansible\Debian\PlayBook;






use Phansible\Debian\Role\MariaDB;
use Phansible\Debian\Role\NPM;
use Phansible\Debian\Role\Samba;

class Webdev extends Minimal
{

    use NPM;
    use MariaDB;
    use Samba;


    public function __construct($name="webdev") {
        parent::__construct($name);




        $httpRecipe=new \Phansible\Debian\Recipe\PHP7ModApache('HTTP');
        $this->addRecipe($httpRecipe);

        $npmRole=$this->buildRoleNPM();
        $mariaRole=$this->buildRoleMariaDB();

        $sambaRole=$this->buildRoleSamba();


        $HTTPRecipe=$this->getRecipeByName('HTTP');
        $HTTPRecipe->addRole($npmRole);
        $HTTPRecipe->addRole($mariaRole);
        $HTTPRecipe->addRole($sambaRole);

    }


}

