<?php

function checkUserLogin($username,$password)
{
	$dbhost=	"127.0.0.1";
	$dbname=	"test";
	$dbuser=	"root";
	$dbpass=	"";
	$table=		"logins";
	$tbname=	"name";
	$tbpass=	"password";

	
	$_username = mysql_real_escape_string($username);
    $_password = mysql_real_escape_string($password);

	$con=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
	if (mysqli_connect_errno()) {
  		return 1;
		}

	 $sql = "SELECT * FROM $table WHERE
            $tbname='$_username' AND
            $tbpass='$_password'";
            
	$res = mysqli_query($con, $sql);
    $rowcount = mysqli_num_rows($res);
    
  if ($rowcount < 1 || $rowcount > 1 ){
  		mysqli_close($con);
        return 1;
        }
       
mysqli_close($con);
 return 0;
}

function insertMongo($jsonData, $gameName)
{
	
	$jsonData = json_decode($jsonData);
	
	$dbhost = '127.0.0.1';
	$dbname = "mydb";
	$dbcollection = $gameName;


	$m = new Mongo("mongodb://$dbhost");
	$db = $m->$dbname;
	$collection=$db->$gameName;
	$collection->insert($jsonData);



 return 0;

}



$server= new SoapServer("service.wsdl");
$server->addFunction("checkUserLogin");
$server->addFunction("insertMongo");
$server->handle();


?>