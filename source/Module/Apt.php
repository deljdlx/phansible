<?php


namespace Phansible\Module;




class Apt extends \Phansible\Task
{




	public function install($name, $package, $state='latest') {

		return $this->createAction($name, array(
			'apt'=>array(
				'name'=>$package,
				'state'=>$state
			)
		), true);
	}

	public function upgradeAll() {

		$this->createAction('apt-upgrade', array(
			'apt'=>array(
				'upgrade'=>'dist'
			)
		));
	}


	public function updateAll() {

		$this->createAction('apt-update', array(
			'apt'=>array(
				'update_cache'=>'yes'
			)
		));
	}


}

