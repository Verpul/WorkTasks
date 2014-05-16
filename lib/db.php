<?php
define('DB_TYPE', 'mysql');
define('DB_HOST', 'localhost');
define('DB_NAME', 'work');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');

	function makeCrypt($crypt, $salt){
		$crypt = md5(md5($crypt).md5($salt));
		return $crypt;
	}

	function connect(){
		static $connect = null;
		if(!$connect){
			$connect_str = DB_TYPE.': host='.DB_HOST.';dbname='.DB_NAME;
			$connect = new PDO($connect_str, DB_USERNAME, DB_PASSWORD);
			$connect->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		}
		return $connect;
	}

	function login($username, $password){
		$crypt = makeCrypt($password, $username);
		$connect = connect();
		$query = $connect->prepare("SELECT username, password FROM users WHERE username = ? and password = ?");
		$query->bindValue(1, $username);
		$query->bindValue(2, $crypt);
		$query->execute();
		$count = $query->rowCount();
		if($count) return true;
		return false;
	}

	function showTasks(){
		$connect = connect();
		$query = $connect->prepare("SELECT * FROM missions ORDER BY date DESC");
		$query->execute();	
		$all = $query->fetchAll();
		return $all;
	}

	function insertTask($time, $priority, $comment, $closed = false){ 
		$connect = connect();
		$query = $connect->prepare("INSERT INTO missions(priority, comment, closed, date) VALUES (?, ?, ?, ?)");
		$query->bindValue(1, $priority);
		$query->bindValue(2, $comment);
		$query->bindValue(3, $closed);
		$query->bindValue(4, $time);
		$query->execute();
	}

	function showTask($id){
		$connect = connect();
		$query = $connect->prepare("SELECT comment FROM missions WHERE id=?");
		$query->bindValue(1, $id);
		$query->execute();
		$count = $query->rowCount();
		$comment = $query->fetch();
		if($count) return $comment['comment'];
		return false;
}

	function deleteTask($id){
		$connect = connect();
		$query = $connect->prepare("DELETE FROM missions WHERE id=?");
		$query->bindValue(1, $id);
		$query->execute();
	}

	function updateTask($id, $comment, $close=false){
		$connect = connect();
		if(!$close){
			$query = $connect->prepare("UPDATE missions SET comment=? WHERE id=?");
			$query->bindValue(1, $comment);
		} else {
			$query = $connect->prepare("UPDATE missions SET closed=? WHERE id=?");
			$query->bindValue(1, $close);
		}					
		$query->bindValue(2, $id);
		$query->execute();
	}	
?>
