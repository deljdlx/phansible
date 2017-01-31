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



    public function __construct($name = "webdev")
    {
        parent::__construct($name);

        $httpRecipe = new \Phansible\Debian\Recipe\PHP7ModApache('webdev');
        $this->addRecipe($httpRecipe);

        $mariaRole = $this->buildRoleMariaDB();
        $httpRecipe->addRole($mariaRole);


        $postGreSQLRole = $this->buildRolePostGreSQL();
        $httpRecipe->addRole($postGreSQLRole);

        $gitRole = $this->buildRoleGit();
        $httpRecipe->addRole($gitRole);


    }


}

