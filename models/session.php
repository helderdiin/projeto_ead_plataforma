<?php
    class Session {
    	public static function getSession() {
    		if ((isset($_COOKIE) && isset($_COOKIE['USER'])) || isset($_SESSION['USER'])) {
	    		if (isset($_COOKIE['USER'])) {
	        		return explode(',', $_COOKIE['USER']);
	        	} else {
	        		return explode(',', $_SESSION['USER']);
	        	}
    		}
    	}

        public static function setSession($user, $remember) {
        	$values = array(
        					$user['name'], 
        					$user['email'], 
        					$user['type']);

    		$session = implode(",", $values);
        	
        	if (isset($_COOKIE) && $remember == 'on') {
        		setcookie("USER", $session, time() + 1000 * 60 * 60 * 24 * 365, '/');
        	} else {
        		$_SESSION['USER'] = $session;
        	}
        }

        public static function unsetSession() {
        	if (isset($_COOKIE) && isset($_COOKIE['USER'])) {
        		unset($_COOKIE['USER']);
				setcookie('USER', '', time() - 3600, '/');
        	} else {
	        	unset($_SESSION['USER']);
				session_destroy();
        	}
        }

        public static function getName() {
        	return self::getSession()[0];
        }

        public static function getEmail() {
        	return self::getSession()[1];
        }

        public static function getType() {
        	return self::getSession()[2];
        }
    }
?>