<?php

	class Address {
		private $street;
		private $city;
		private $state;

		function __construct($new_street, $new_city, $new_state)
		{
			$this->street = $new_street;
			$this->city = $new_city;
			$this->state = $new_state;
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
	}



?>