<?php


namespace Phansible\Debian\PlayBook;




class LAMP extends \Phansible\Playbook
{



    public function __construct() {
        parent::__construct();


        $essentialRole=new \Phansible\Debian\Role\Essential();
        $rolePHP7=new \Phansible\Debian\Role\PHP7();
        $roleBDD=new \Phansible\Debian\Role\BDD();

        $this->createRecipe('LAMP')
            ->addRole($essentialRole)
            ->addRole($rolePHP7)
            ->addRole($roleBDD)
        ;




    }


}

