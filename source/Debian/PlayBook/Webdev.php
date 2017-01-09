<?php


namespace Phansible\Debian\PlayBook;






use Phansible\Debian\Role\MariaDB;
use Phansible\Debian\Role\NPM;
<<<<<<< HEAD
use Phansible\Debian\Role\Virtualbox;
=======
use Phansible\Debian\Role\Samba;
>>>>>>> bc10278af2bc501dce31258cc6c54e2ff144bc42

class Webdev extends Minimal
{

    use NPM;
    use MariaDB;
<<<<<<< HEAD
    use Virtualbox;
=======
    use Samba;
>>>>>>> bc10278af2bc501dce31258cc6c54e2ff144bc42


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

        //$virtualbox=$this->buildRoleVirtualbox();
        //$HTTPRecipe->addRole($virtualbox);



    }


}

