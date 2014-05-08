<?php
define('DB_TYPE', 'mysql');
define('DB_HOST', 'localhost');
define('DB_NAME', 'work');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');

	function login($username, $password){
		try{
			$connect_str = DB_TYPE.': host='.DB_HOST.';dbname='.DB_NAME;
			$connect = new PDO($connect_str, DB_USERNAME, DB_PASSWORD);
			$connect->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
			$query = $connect->prepare("SELECT username, password FROM users WHERE username = ? and password = ?");
			$query->bindParam(1, $username);
			$query->bindParam(2, $password);
			$query->execute();
			$count = $query->rowCount();
			$connect = null;
			if($count) return true;
			return false;
		} catch (PDOException $e){
			echo $e->getMessage();
		}
	}

	function showTasks(){
		try{
			$connect_str = DB_TYPE.': host='.DB_HOST.';dbname='.DB_NAME;
			$connect = new PDO($connect_str, DB_USERNAME, DB_PASSWORD);
			$connect->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
			$query = $connect->prepare("SELECT * FROM missions ORDER BY date DESC");
			$query->execute();			
			while($row = $row = $query->fetch()){
				$id = $row['id'];
				$priority = $row['priority'];
				$comm  = $row['comment'];

				$disable = $row['closed'] == 0 ? '':'disabled';
				$status = $row['closed'] == 0 ? 'Не выполнена':'Выполнена';
				
				$firstDate = substr($row['date'], 0, 10);

				require 'templates/tasksTable.php';
				$secondDate = $firstDate;		
			}
			$connect = null;
		} catch (PDOException $e){
			echo $e->getMessage();
		}
	}

	function insertTask($time, $priority, $comment, $closed = false){ 
		try{
			$connect_str = DB_TYPE.': host='.DB_HOST.';dbname='.DB_NAME;
			$connect = new PDO($connect_str, DB_USERNAME, DB_PASSWORD);
			$connect->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
			$query = $connect->prepare("INSERT INTO missions(priority, comment, closed, date) VALUES (?, ?, ?, ?)");
			$query->bindParam(1, $priority);
			$query->bindParam(2, $comment);
			$query->bindParam(3, $closed);
			$query->bindParam(4, $time);
			$query->execute();
			$connect = null;
		} catch (PDOException $e){
			echo $e->getMessage();
		}
	}

	function showTask($id){
		try{
			$connect_str = DB_TYPE.': host='.DB_HOST.';dbname='.DB_NAME;
			$connect = new PDO($connect_str, DB_USERNAME, DB_PASSWORD);
			$connect->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
			$query = $connect->prepare("SELECT comment FROM missions WHERE id=?");
			$query->bindParam(1, $id);
			$query->execute();
			$count = $query->rowCount();
			$comment = $query->fetch();
			$connect = null;
			if($count) return $comment['comment'];
			return false;
		} catch (PDOException $e){
			echo $e->getMessage();
		}
	}

	function deleteTask($id){
		try{
			$connect_str = DB_TYPE.': host='.DB_HOST.';dbname='.DB_NAME;
			$connect = new PDO($connect_str, DB_USERNAME, DB_PASSWORD);
			$connect->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
			$query = $connect->prepare("DELETE FROM missions WHERE id=?");
			$query->bindParam(1, $id);
			$query->execute();
			$connect = null;
		} catch (PDOException $e){
			echo $e->getMessage();
		}
	}

	function updateTask($id, $comment, $close=false){
		try{
			$connect_str = DB_TYPE.': host='.DB_HOST.';dbname='.DB_NAME;
			$connect = new PDO($connect_str, DB_USERNAME, DB_PASSWORD);
			$connect->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
			if(!$close){
				$query = $connect->prepare("UPDATE missions SET comment=? WHERE id=?");
				$query->bindParam(1, $comment);
			} else {
				$query = $connect->prepare("UPDATE missions SET closed=? WHERE id=?");
				$query->bindParam(1, $close);
			}					
			$query->bindParam(2, $id);
			$query->execute();
			$connect = null;
		} catch (PDOException $e){
			echo $e->getMessage();
		}
	}	
?>
