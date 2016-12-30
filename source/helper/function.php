<?php


namespace Phansible;



function getVagrantIP($path) {

	$path=str_replace('\\', '/', $path);

    $dir=getcwd();
    chdir($path);



    ob_start();



    system("vagrant ssh -c \"hostname -I | cut -d' ' -f2\"");


    $output=trim(ob_get_clean());

	$ip=trim(preg_replace('`.*?\s(\d+\.\d+\.\d+)\s.*`s', '$1', $output));


    chdir($dir);

    return $ip;
}