<?php 
	session_start();

	function getValue($divisionName, $entityName, $returnType = '') { 
		return isset($_POST[$divisionName][$entityName]) 
            ? $_POST[$divisionName][$entityName] 
            : getSessionValue($divisionName, $entityName);
	}

	function getSessionValue($divisionName, $entityName) {
		return isset($_SESSION[$divisionName][$entityName]) 
			? $_SESSION[$divisionName][$entityName] 
			: '';
    }
        
  function setSessionValues($divisionName) {
		isset($_POST[$divisionName]) 
			? $_SESSION[$divisionName] = $_POST[$divisionName] 
			: [];
	}

	setSessionValues('account');
	setSessionValues('address');
	setSessionValues('other');
?>