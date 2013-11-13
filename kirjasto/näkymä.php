<?php

	function naytaNakyma($sivu, $data = array()) {
		$data = (object)$data;
		require "views/$sivu";
		exit();
	} 
