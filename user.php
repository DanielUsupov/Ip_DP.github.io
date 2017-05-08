<?php
require_once('dbconnect.php');

class USER
{

	private $conn;

	public function __construct()
	{
		$database = new Database();
		$db = $database->dbConnection();
		$this->conn = $db;
    }

	public function runQuery($sql)
	{
		$stmt = $this->conn->prepare($sql);
		return $stmt;
	}

	public function register($uname,$umiddlename,$usurname,$uadress,$uzipcode,$umobnum,$uhomenum,$umail,$upass,$ugen,$udate)
	{
		try
		{
			$new_password = password_hash($upass, PASSWORD_DEFAULT);

			$stmt = $this->conn->prepare("INSERT INTO patients (emails,passwords,first_name,middle_name,surname,addresses,zipcode,
        mobile_numbers,home_numbers,gender,dates)
		    VALUES(:umail,:upass,:uname,:umiddlename,:usurname,:uadress,:uzipcode,:umobnum,:uhomenum,:ugen,:udate)");

			$stmt->bindparam(":umail", $umail);
      $stmt->bindparam(":upass", $new_password);
      $stmt->bindparam(":uname", $uname);
      $stmt->bindparam(":umiddlename", $umiddlename);
      $stmt->bindparam(":usurname", $usurname);
      $stmt->bindparam(":uadress", $uadress);
      $stmt->bindparam(":uzipcode", $uzipcode);
      $stmt->bindparam(":umobnum", $umobnum);
      $stmt->bindparam(":uhomenum", $uhomenum);
      $stmt->bindparam(":ugen", $ugen);
      $stmt->bindparam(":udate", $udate);

			$stmt->execute();

			return $stmt;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}


	public function doLogin($umail,$upass)
	{
		try
		{
			$stmt = $this->conn->prepare("SELECT id, emails, passwords FROM patients WHERE emails=:umail");
			$stmt->execute(array(':umail'=>$umail));
			$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
			if($stmt->rowCount() == 1)
			{
				if(password_verify($upass, $userRow['passwords']))
				{
					$_SESSION['user_session'] = $userRow['id'];
					return true;
				}
				else
				{
					return false;
				}
			}
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}

	public function is_loggedin()
	{
		if(isset($_SESSION['user_session']))
		{
			return true;
		}
	}

	public function redirect($url)
	{
		header("Location: $url");
	}

	public function doLogout()
	{
		session_destroy();
		unset($_SESSION['user_session']);
		return true;
	}
}
?>
