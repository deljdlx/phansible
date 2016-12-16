<?php


namespace Phansible;




class Project
{



	protected $filepathRoot;

	protected $playbooks=array();
	protected $groups=array();
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



	public function createGroup($name) {
		$group=new \Phansible\Group();
		$group->setName($name);
		$this->groups[$group->getName()]=$group;
		return $group;
	}


	public function createRole($name) {
		$role=new \Phansible\Role($name);
		$this->addRole($role);
		return $role;
	}

    public function addRole($role) {
        $this->roles[$role->getName()]=$role;
        return $this;
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
		foreach($this->groups as $group) {
			$buffer.=$group->toString();
		}
		file_put_contents($filepath.'/hosts', $buffer);


		$roleFilepathRoot=$filepath.'/roles';

		if(!is_dir($roleFilepathRoot)) {
			mkdir($roleFilepathRoot);
		}


		foreach ($this->roles as $role) {
			$roleFilepath=$roleFilepathRoot.'/'.$role->getName();

			if(!is_dir($roleFilepath)) {
				mkdir($roleFilepath);
			}
			$role->create($roleFilepath);
		}


		return $this;
	}






}

