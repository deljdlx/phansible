<?php


namespace Phansible\Debian\PlayBook;




class LAMP extends \Phansible\Playbook
{



    public function __construct($name="LAMP") {
        parent::__construct($name);


        $essentialRole=new \Phansible\Debian\Role\Essential();
	    $HTTPServer=new \Phansible\Debian\Role\Apache2();
	    $rolePHP7=new \Phansible\Debian\Role\PHP7ModApache();
        $roleBDD=new \Phansible\Debian\Role\BDD();


        $this->createRecipe('LAMP')
            ->addRole($essentialRole)
	        ->addRole($HTTPServer)
            ->addRole($rolePHP7)
            ->addRole($roleBDD)
        ;




    }


}

