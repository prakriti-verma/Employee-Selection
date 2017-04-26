<?php
function SeniorEmpl($min,$max)
{
	$conn = mysql_connect('localhost','root','');
	mysql_select_db('test',$conn);
	$query = "SELECT `name`, (`salary`/`years`) as P, `years`, `salary`,`field` FROM `employee` WHERE `field` = 'senior' order by P asc limit $min,$max" ;
	$data = mysql_query($query,$conn);
	while ($row = mysql_fetch_assoc($data) )
	{
		$value[] = $row;
	}
	return $value;
}

function JuniorEmpl($min,$max)
{
	$conn = mysql_connect('localhost','root','');
	mysql_select_db('test',$conn);
	$query = "SELECT `name`, (`salary`/`years`) as P, `years`, `salary`,`field` FROM `employee` WHERE `field` = 'junior' order by P asc limit $min,$max" ;
	$data = mysql_query($query,$conn);
	while ($row = mysql_fetch_assoc($data) )
	{
		$value[] = $row;
		
	}
	return $value;
}

function TotalSumEmployee($limit)
{
	
	$senior = $_POST['senior'];
	$junior = $_POST['junior'];
	$budget = $_POST['budget'];
	$Senior = SeniorEmpl($limit,$senior);
	$Junior = JuniorEmpl($limit,$junior);

	$senior_sum = array_sum(array_column($Senior, 'salary')); 
	$junior_sum = array_sum(array_column($Junior, 'salary')); 
	$total = $senior_sum+$junior_sum;
	if($total > $budget)
	{
		return TotalSumEmployee($limit+1);
	}
	else{

		$completeArray = array_merge($Senior,$Junior);
		return $completeArray;
		//return $total;
	}
		
}
$Total = TotalSumEmployee('0');
echo json_encode($Total);




?>