<!DOCTYE html>
<html>

<head>
	<meta charset="utf-8">
	<!--Adapt to mobile phone size, not allowed to zoom-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
	<title>web relay</title>
	
	<script src="jquery-3.3.1.js"></script>

	<style type="text/css">
		body,div{border:0; margin:0; padding:0;}
	</style>

	<style type="text/css">
		button {
		display: block;
		margin: 5px 5px 5px 5px;
		width: 200px;
		height: 55px;
		font-size: 24pt;
		font-weight: bold;
		color: black;
		}

		.LOW {
		background-color: Red;
		}

		.HIGH {
		background-color: White;
		}
	</style>
  
</head>


<body>

	<?php 

	//exec('gpio mode 25 out');
	//exec('gpio write 25 1');
	
	if( isset($_GET["CH1"]) )
	{
		if( 0 == strcmp($_GET["CH1"],"ON") )
		{
			$stat = 0;
		}
		else
		{
			$stat = 1;
		}
		//echo $stat;
		
		exec('gpio mode 25 out');
		exec('gpio write 25 '.$stat);
	}
	
	if( isset($_GET["CH2"]) )
	{
		if( 0 == strcmp($_GET["CH2"],"ON") )
		{
			$stat = 0;
		}
		else
		{
			$stat = 1;
		}
		//echo $stat;
		
		exec('gpio mode 28 out');
		exec('gpio write 28 '.$stat);
	}
	
	if( isset($_GET["CH3"]) )
	{
		if( 0 == strcmp($_GET["CH3"],"ON") )
		{
			$stat = 0;
		}
		else
		{
			$stat = 1;
		}
		//echo $stat;
		
		exec('gpio mode 29 out');
		exec('gpio write 29 '.$stat);
	}
	//sleep(1);
	
	
	
	
	//以下是读取pin的状态
	exec('gpio read 25',$output);
	if(0 == $output[0])
	{
		$ch1_now="ON";
		$ch1_next="OFF";
	}
	else
	{
		$ch1_now="OFF";
		$ch1_next="ON";
	}
	
	exec('gpio read 28',$output);
	if(0 == $output[1])
	{
		$ch2_now="ON";
		$ch2_next="OFF";
	}
	else
	{
		$ch2_now="OFF";
		$ch2_next="ON";
	}

	exec('gpio read 29',$output);
	if(0 == $output[2])
	{
		$ch3_now="ON";
		$ch3_next="OFF";
	}
	else
	{
		$ch3_now="OFF";
		$ch3_next="ON";
	}
	//echo 'jf='.$ch1_now;
	

	

	?>




	<h1> Relay CH1 is <?php echo $ch1_now; ?>	</h1>
	
	
	
	<form action'index.php" method="get">
		
	<input type="hidden" name="CH1" value=<?php echo $ch1_next; ?> >
	
	<input type="submit" value=<?php echo $ch1_next; ?> >
	
	</form>
	
	
	
	
	<h1> Relay CH2 is <?php echo $ch2_now; ?>	</h1>
	<form action'index.php" method="get">

	<input type="hidden" name="CH2" value=<?php echo $ch2_next; ?> >
	
	<input type="submit" value=<?php echo $ch2_next; ?> >
	
	</form>
	
	<h1> Relay CH3 is <?php echo $ch3_now; ?>	</h1>
	<form action'index.php" method="get">

	<input type="hidden" name="CH3" value=<?php echo $ch3_next; ?> >
	
	<input type="submit" value=<?php echo $ch3_next; ?> >
	
	</form>


</body>


</html>
