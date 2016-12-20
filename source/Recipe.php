<?php


namespace Phansible;




class Recipe
{


	protected $name;
	protected $description='Playbook without description';


	protected $networks=array();
	protected $roles=array();


	protected $configuration=array(
		'remote_user'=>'vagrant',
		'become'=> true
	);



	public function __construct() {

	}


	public function setName($name) {
		$this->name=$name;
		return $this;
	}

	public function getName() {
		return $this->name;
	}

	public function getDescription() {
		return $this->description;
	}


	public function addNetwork(Network $network) {
		$this->networks[$network->getName()]=$network;
		return $this;
	}

	public function addRole(Role $role) {
		$this->roles[$role->getName()]=$role;
		return $this;
	}



	public function toString() {

		$remoteUser=$this->configuration['remote_user'];
		if($this->configuration['become']) {
			$become='true';
		}
		else {
			$become='false';
		}



		$buffer='
- name: '.$this->getName().'
  hosts: all
  remote_user: '.$remoteUser.'
  become: '.$become.'
  roles:
';

		foreach ($this->roles as $role) {
			$buffer.='    - '.$role->getName()."\n";
		}
		return $buffer;

	}






}

