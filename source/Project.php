<?php


namespace Phansible;




class Project
{



	protected $filepathRoot;

	protected $playbooks=array();
	protected $networks=array();
	protected $roles=array();


	public function __construct($filepathRoot=null) {
		if($filepathRoot) {
			$this->filepathRoot=$filepathRoot;
		}
	}


	public function createPlaybook($name) {
		$playbook=new \Phansible\Playbook();
		$playbook->setName($name);
		$this->playbooks[$playbook->getName()]=$playbook;

		return $playbook;
	}



	public function createNetwork($name) {
		$network=new \Phansible\Network();
		$network->setName($name);
		$this->networks[$network->getName()]=$network;
		return $network;
	}


	public function createRole($name) {
		$role=new \Phansible\Role();
		$role->setName($name);
		$this->roles[$role->getName()]=$role;
		return $role;
	}







	public function create($filepath=null) {

		if($filepath==null) {
			$filepath=$this->filepathRoot;
		}
		else {
			$this->filepathRoot=$filepath;
		}



		if(!is_dir($filepath)) {
			mkdir($filepath, true);
		}


		file_put_contents($filepath.'/ansible.cfg', '[ssh_connection]
ssh_args = -o ControlMaster=no
		');






		foreach ($this->playbooks as $playbook) {
			$playbook->create($filepath);
		}


		$buffer='';
		foreach($this->networks as $network) {
			$buffer.=$network->toString();
		}
		file_put_contents($filepath.'/hosts', $buffer);


		$roleFilepathRoot=$filepath.'/roles';

		mkdir($roleFilepathRoot);

		foreach ($this->roles as $role) {
			$roleFilepath=$roleFilepathRoot.'/'.$role->getName();
			mkdir($roleFilepath);
			$role->create($roleFilepath);
		}


		return $this;
	}






}

