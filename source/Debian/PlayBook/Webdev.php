<?php


namespace Phansible\Debian\PlayBook;


use Phansible\Debian\Role\Git;
use Phansible\Debian\Role\MariaDB;
use Phansible\Debian\Role\PostGreSQL;



class Webdev extends WebBuild
{

    use MariaDB;
    use PostGreSQL;
    use Git;



    public function __construct($name = "Webdev")
    {
        parent::__construct($name);

        $httpRecipe = new \Phansible\Debian\Recipe\PHP7ModApache('HTTP');
        $this->addRecipe($httpRecipe);

        $mariaRole = $this->buildRoleMariaDB();
        $postGreSQLRole = $this->buildRolePostGreSQL();

        $gitRole = $this->buildRoleGit();


        $httpRecipe->addRole($mariaRole);
        $httpRecipe->addRole($postGreSQLRole);
        $httpRecipe->addRole($gitRole);


    }


}

