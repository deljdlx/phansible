<?php


namespace Phansible\Debian\PlayBook;


class LAMP extends Minimal
{




    public function __construct($name="LAMP") {
        parent::__construct($name);


        /*
        $essentialRole=$this->buildRoleEssential();
        $HTTPServer=$this->buildRoleApache2();  //$HTTPServer=new \Phansible\Debian\Role\Apache2();
	    $rolePHP7=$this->buildRolePHP7ModApache();
        */



        $httpRecipe=new \Phansible\Debian\Recipe\PHP7ModApache('HTTP');
        $this->addRecipe($httpRecipe);


        $bddRecipe=new \Phansible\Debian\Recipe\MariaDB('BDD');
        $this->addRecipe($bddRecipe);


        /*
        $recipe0=$this->createRecipe('HTTP')
            ->addRole($essentialRole)
	        ->addRole($HTTPServer)
            ->addRole($rolePHP7)
            //->addRole($rolePHP7)
            //->addRole($roleBDD)
        ;
        */

        /*
         * $roleBDD=$this->buildRoleMariaDB();
        $recipe1=$this->createRecipe('BDD')
            ->addRole($essentialRole)
            //->addRole($HTTPServer)
            ->addRole($roleBDD)
        ;
        */


    }


}

