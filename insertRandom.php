<?php
$conn = mysql_connect('localhost','root','');
mysql_select_db('test',$conn);
$createQuery = "CREATE TABLE employee(id INT(11) NOT NULL AUTO_INCREMENT ,
				name VARCHAR(10) NOT NULL , 
				salary INT(10) NOT NULL ,
				field VARCHAR(10) NOT NULL ,
				years INT(10) NOT NULL,
				PRIMARY KEY ( id ))";

mysql_query($createQuery,$conn);

for($i=1;$i<=5000;$i++)
{
	$name = randomString(8);
	$years = rand( 1 , 10 );
	if($years >= 3)
	{
		$field = 'senior';
		$salary = 50000*rand( 10 , 40 );
	}else{
		$field = 'junior';
		$salary = 30000*rand( 10 , 20 );
	}
	$query = "INSERT INTO `employee` (`name`,`salary`,`field`,`years`) VALUES ('$name','$salary','$field','$years')";
	//echo $query;
	mysql_query($query,$conn);	
}

//GENERATE RANDOM STRING
function randomString($length = 6) {
	$str = "";
	$characters = range('a','z');
	$max = count($characters) - 1;
	for ($i = 0; $i < $length; $i++) {
		$rand = mt_rand(0, $max);
		$str .= $characters[$rand];
	}
	return ucwords($str);
}



?>