<?php

class Contact {
	private $first_name;
	private $last_name;
	private $phone;
	private $address;

	function __construct($new_first_name, $new_last_name, $new_phone, $new_address) 
	{
		$this->first_name = $new_first_name;
		$this->last_name = $new_last_name;
		$this->phone = $new_phone;
		$this->address = $new_address;
	}

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
		return $this->last_name = $new_last_name;
	}

	function setPhone($new_phone)
	{
		$this->phone = $new_phone;
	}

	function getPhone()
	{
		return $this->phone;
	}

	function setAddress($new_address)
	{
		$this->address = $new_address;
	}

	function getAddress()
	{
		return $this->getAddress;
	}

	function save()
	{
		array_push($_SESSION['list_of_contacts'], $this);
	}

	function getAll()
	{
		return $_SESSION['list_of_contacts'];
	}

	function deleteAll()
	{
		$_SESSION['list_of_contacts'] = array();
	}

}





?>