<?php


namespace Phansible;




class Machine
{


	protected $ip;
    protected $parameter=array();



    public function getParameters() {
        return $this->parameters;
    }


    public function setParameter($name, $value) {
        $this->parameters[$name]=$value;
        return $this;
    }

    public function setSSHKeyFile($file) {
        return $this->setParameter('ansible_ssh_private_key_file', $file);
    }


	public function setIp($ip) {
		$this->ip=$ip;
		return $this;
	}

	public function getIp() {
		return $this->ip;
	}



	public function toString() {

        $parameters=$this->getParameters();

        $parameterString='';
        foreach ($parameters as $name => $value) {
            $parameterString.=$name."=".$value." ";
        }


        return $this->getIp()."\t".$parameterString;
	}

}

