<?php


namespace Phansible;



function getVagrantIP($path) {

    $dir=getcwd();
    chdir($path);
    ob_start();
    system("vagrant ssh -c \"hostname -I | cut -d' ' -f2\" 2>/dev/null");
    $machineIP=trim(ob_get_clean());
    chdir($dir);

    return $machineIP;
}