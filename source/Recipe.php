<?php


namespace Phansible;




class Recipe
{


	protected $name;
	protected $description='Playbook without description';


	protected $groups=array();
	protected $roles=array();


	protected $configuration=array(
		'remote_user'=>'vagrant',
		'become'=> true
	);



	public function __construct($name='unamed') {
        $this->setName($name);
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


	public function addGroup(Group $group) {
		$this->groups[$group->getName()]=$group;
		return $this;
	}

	public function addRole(Role $role, $name=null) {

        if($name===null) {
            $name=$role->getName();
        }

		$this->roles[$name]=$role;
		return $this;
	}

	public function getRoles() {
		return $this->roles;
	}



	public function toString() {

		$remoteUser=$this->configuration['remote_user'];
		if($this->configuration['become']) {
			$become='true';
		}
		else {
			$become='false';
		}

        if(count($this->groups)) {
            $groupList=array_keys($this->groups);
            $groups=implode(',', $groupList);
        }
        else {
            $groups='all';
        }



		$buffer='
- name: '.$this->getName().'
  hosts: '.$groups.'
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

