<?php




$fileExtention=['.jpg','.jpeg','.gif','.png'];
$fileName=$_FILES["flightImage"]["name"];
foreach($fileExtention as $f)
{
	$extention=strtolower(substr($fileName,strlen($fileName) - strlen($f), strlen($f)));
	if ($extention == $f)
	{
		break;
	}
}
echo $_FILES["flightImage"]["name"];
$fileName= date("Y_m_d_h_i_s_a").$extention;
$target_file = "../resources/". basename($fileName);
move_uploaded_file($_FILES["flightImage"]["tmp_name"], $target_file);



?>