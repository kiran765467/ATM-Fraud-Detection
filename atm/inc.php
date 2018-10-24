
<?php
  session_start();

    if(isset($_SESSION['count']))
	{ 
		echo $_SESSION['count'];
		$_SESSION['count']++;
		if($_SESSION['count']==4)
		{
			
			echo"Blocked";
			$_SESSION['count']=0;
		}
		
	}
	else
	{
		$_SESSION['coun']=1;
		echo"Session Doesnot Exit"; 
    }

?>