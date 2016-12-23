<?php


namespace Phansible\Debian\Recipe;




class MariaDB extends Minimal
{


    use \Phansible\Debian\Role\Traits\MariaDB;

    public function __construct($name="MariaDB") {
        parent::__construct($name);

        $mariaDBRole=$this->buildRoleMariaDB();
        $this->addRole($mariaDBRole);
    }


}

