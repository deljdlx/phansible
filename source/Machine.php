<?php


namespace Phansible;




class Machine
{


	protected $ip;




	public function setIp($ip) {
		$this->ip=$ip;
		return $this;
	}

	public function getIp() {
		return $this->ip;
	}



	public function toString() {
		return $this->getIp();
	}

}

