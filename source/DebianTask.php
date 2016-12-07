<?php


namespace Phansible;




class DebianTask extends Task
{


	public function install($name, $package, $version='latest') {

		return $this->createBlock($name, array(
			'apt'=>array(
				'name'=>$package,
				'state'=>$version
			)
		));
	}

	public function upgradeAll() {

		$this->createBlock('apt-upgrade', array(
			'apt'=>array(
				'upgrade'=>'dist'
			)
		));

	}


}

