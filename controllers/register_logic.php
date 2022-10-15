<?php
	session_start();

    include_once '../models/db.php'
	
    $db = new DBConnector();
    $pdo = $db->connectToDB();
 
	if(ISSET($_POST['register'])){
		if($_POST['firstname'] != "" || $_POST['username'] != "" || $_POST['password'] != ""){
			try{

				$username = $_POST['username'];
                $email = $_POST['email'];
				// md5 encrypted
				// $password = md5($_POST['password']);
				$password = $_POST['password'];
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "INSERT INTO admins VALUES ('', '$username', '$email', '$password')";
				$pdo->exec($sql);
			}catch(PDOException $e){
				echo $e->getMessage();
			}
			
			$pdo->closeDB();

            echo "
				<script>alert('You have been succesfully registered!')</script>
				<script>window.location = '../views/form.php'</script>
			";
		}else{
			echo "
				<script>alert('Please fill in all the required fieldx!')</script>
				<script>window.location = '../views/registration.php'</script>
			";
		}
	}
?>