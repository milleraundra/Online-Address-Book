<?php

class Contact {
	private $first_name;
	private $last_name;
	private $phone;
	private $street;
	private $city;
	private $state;

	function __construct($new_first_name, $new_last_name, $new_phone, $new_street, $new_city, $new_state)
	{
		$this->first_name = $new_first_name;
		$this->last_name = $new_last_name;
		$this->phone = $new_phone;
		$this->street = $new_street;
		$this->city = $new_city;
		$this->state = $new_state;
	}
//setter and getters
	function setFirstName($new_first_name)
	{
		$this->first_name = $new_first_name;
	}

	function getFirstName()
	{
		return $this->first_name;
	}

	function setLastName($new_last_name)
	{
		$this->last_name = $new_last_name;
	}

	function getLastName()
	{
		return $this->last_name;
	}

	function setPhone($new_phone)
	{
		$this->phone = $new_phone;
	}

	function getPhone()
	{
		return $this->phone;
	}
	function setStreet($new_street)
	{
		$this->street = $new_street;
	}

	function getStreet()
	{
		return $this->street;
	}

	function setCity($new_city)
	{
		$this->city = $new_city;
	}

	function getCity()
	{
		return $this->city;
	}

	function setState($new_state)
	{
		$this->state = $new_state;
	}

	function getState()
	{
		return $this->state;
	}
//special functions
	function fullName() {
		$full_name = $this->first_name . " " . $this->last_name;
		return $full_name;
	}

	function save()
	{
		array_push($_SESSION['list_of_contacts'], $this);
	}

	static function getAll()
	{
		return $_SESSION['list_of_contacts'];
	}

	static function deleteAll()
	{
		$_SESSION['list_of_contacts'] = array();
	}

}





?>
