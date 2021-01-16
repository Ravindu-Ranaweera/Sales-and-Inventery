<?php
		
			unset($_SESSION['id']);
			unset($_SESSION['username']);
			unset($_SESSION['email']);
			unset($_SESSION['usertype']);
            
            header('location: ../examples/index.php');
