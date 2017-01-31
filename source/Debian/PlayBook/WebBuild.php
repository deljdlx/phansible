<?php


namespace Phansible\Debian\PlayBook;


use Phansible\Debian\Role\Bower;
use Phansible\Debian\Role\NPM;
use Phansible\Debian\Role\Webpack;


class WebBuild extends Minimal
{

    use NPM;
    use Webpack;
    use  Bower;



    public function __construct($name = "WebBuild")
    {
        parent::__construct($name);
        $recipe=$this->getRecipeByName('Minimal');


        $npmRole = $this->buildRoleNPM();
        $webpack = $this->buildRoleWebpack();
        $bower = $this->buildRoleBower();

        $recipe->addRole($npmRole);
        $recipe->addRole($webpack);
        $recipe->addRole($bower);



    }


}

