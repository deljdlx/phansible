<?php

namespace Phansible;


class VagrantMachine extends Machine
{



    protected $publicNetwork=false;

	protected $sharedFolders=array();


    public function setPublic($value=true) {
        $this->publicNetwork=$value;
        return $this;
    }



    public function addSharedFolder($from, $to, $id=null) {
    	if($id===null) {
    		$id=sha1($from.$to);
	    }

    	$this->sharedFolders[$id]=array(
    		'from'=>$from,
		    'to'=>$to
	    );
	    return $this;
    }




    public function create($filepath) {
        if(!is_dir($filepath)) {
            mkdir($filepath, 0755, true);
        }

        copy(__DIR__.'/asset/vagrant/Vagrantfile.default.tpl', $filepath.'/Vagrantfile');


        $mustacheEngine=new \Mustache_Engine();

        $template=file_get_contents(__DIR__.'/asset/vagrant/Vagrantfile.default.tpl');

        $variables=array();


        if($this->getIp()) {
            $variables['machine_ip']='config.vm.network "private_network", ip: "'.$this->getIp().'"';
        }

        if($this->publicNetwork) {
            $variables['public_network']='config.vm.network "public_network"';
        }





        if(count($this->sharedFolders)) {

        	$sharedFolderBuffer='';

	        foreach ( $this->sharedFolders as $id => $descriptor) {
		        $sharedFolderBuffer.=
	        	    'config.vm.synced_folder "'.str_replace('\\', '/', $descriptor['from']).'", "'.$descriptor['to'].'",'."\n".
		            '    id: "'.$id.'"'."\n"
		        ;
        	}
	        $variables['shared_folder']=$sharedFolderBuffer;
        }



        $compiled=$mustacheEngine->render($template, $variables);
        file_put_contents($filepath.'/Vagrantfile', $compiled);

        /*
         * vagrant vbguest
vagrant init debian/jessie64
vagrant up --provider virtualbox
         *
         */


    }



    /*
     *
function run($command, $filepath) {

    $descriptorspec = array(
       0 => array("pipe", "r"),  // // stdin est un pipe où le processus va lire
       1 => array("pipe", "w"),  // stdout est un pipe où le processus va écrire
       2 => array("pipe", "w") // stderr est un fichier
    );

    $env = array('HOME' => '/home/webhoster_ssh');
    $process=proc_open($command, $descriptorspec, $pipes, $filepath, $env);

    if (is_resource($process)) {

        fwrite($pipes[0], '<?php print_r($_ENV); ?>');
        fclose($pipes[0]);

        echo stream_get_contents($pipes[1]);
        fclose($pipes[1]);

        // Il est important que vous fermiez les pipes avant d'appeler
        // proc_close afin d'éviter un verrouillage.
        $return_value = proc_close($process);

        return $return_value;

    }
}

        $command='git clone git@bitbucket.org:prismamediadigital/capital.git '.$releaseFilepath.' && git checkout'.$branchName;
        ob_start();
        system($command);
        system('mkdir '.$releaseFilepath.'/www/var');
        system('ln -s /var/www/recette.capital.fr/current/www/var/cap '.$releaseFilepath.'/www/var/cap');
        run('php phing-latest.phar env:recette build:deploy:all', $releaseFilepath);
        ob_end_clean();


     *
     */


}

