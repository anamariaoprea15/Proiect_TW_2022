<?php
$con=mysqli_connect("localhost", "root", "", "catrace");

if(!$con){
	echo "DB not Connected...";
}
else{
$result=mysqli_query($con, "Select * from competitions");
if($result->num_rows>0){
$xml = new DOMDocument("1.0");

// It will format the output in xml format otherwise
// the output will be in a single row
$xml->formatOutput=true;
$catrace=$xml->createElement("competitions");
$xml->appendChild($catrace);
while($row=mysqli_fetch_array($result)){
	$competition=$xml->createElement("competition");
	$catrace->appendChild($competition);
	
	$name=$xml->createElement("name", $row['name']);
	$competition->appendChild($name);
	
	$type=$xml->createElement("type", $row['type']);
	$competition->appendChild($type);
	
	$start=$xml->createElement("start", $row['start']);
	$competition->appendChild($start);
	
	$finish=$xml->createElement("finish", $row['finish']);
	$competition->appendChild($finish);
		
}
//echo "<xmp>".$xml->saveXML()."</xmp>";
$xml->save("../export/report.xml");
}
else{
	echo "error";
}
}
?>
