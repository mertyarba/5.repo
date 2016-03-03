<?php
	//table.php
	//getting our config.php
	require_once("../../config.php");
	
	//create connection
	$mysql = new mysqli("localhost", $db_username, $db_password, "webpr2016_mertyarba");
		
	$stmt = $mysql->prepare("INSERT INTO messages_sample(recipient, message)VALUES (?, ?)");
	
	
	
	//SQL sentence
	$stmt = $mysql->prepare("SELECT id, recipient, message, created FROM messages_sample ORDER BY created LIMIT 5");
	
	//if error in sentence
	echo $mysql->error;
	
	$stmt->bind_result($id, $recipient, $message, $created);
	
	//save
	$stmt->execute();
	
	$table_html = "";
	$table_html .= "<table>";
	
	//add something to string
	$table_html .= "<tr>";
		$table_html .= "<tr>";
		$table_html .= "<th>ID</th>";
		$table_html .= "<th<Recipient</th>";
		$table_html .= "<th>Created</th>";
	$table_html .= "</tr>";
	
	
	//Get Result
	while($stmt->fetch()){
		
		//DO SOMETHING FOR EACH ROW
		//echo $id."".$message."<br>";
		$table_html .= "<tr>"; //start new row
			$table_html .= "<td>".$id."</td>"; //add columns
			$table_html .= "<td>".$recipient."</td>";
			$table_html .= "<td>".$message."</td>";
			$table_html .= "<td>".$created."</td>";
		$table_html .= "/<tr>"; //end row
		
		echo $id."".$message."<br>";
	
	}
	
		$table_html .= "</table>";
	echo $table_html;
?>

<a href="APP.php">APP<a/>