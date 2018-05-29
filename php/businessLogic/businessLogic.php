<?php
include 'php/dataAccess/dataAccess.php';

class businessLogic{

	public function getcomingshows(){
		$da = new dataAccess();
		return $da->getcomingshows();
	}

	public function getpastshows(){
		$da = new dataAccess();
		return $da->getpastshows();		
	}

	public function login($usuario,$pass){
		$da = new dataAccess();
		return $da->login($usuario,$pass);
	}
}

?>