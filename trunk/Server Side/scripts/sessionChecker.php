<?php

session_start();


if(!(isset($_SESSION['user_id'])) || $_SESSION['user_id']=="")
{
echo "0";
}
else
{
	echo "1";
}

?>