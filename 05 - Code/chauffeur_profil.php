<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>transparent login form</title>
    <style>
        body{
            margin: 0;
            padding: 0;
        }
        body:before{
            content: '';
            position: fixed;
            width: 100vw;
            height: 100vh;
            background-image: url("bus.jpg");
            background-position: center center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
            -webkit-filter: blur(10px);
            -moz-filter: blur(10px);
            -o-filter: blur(10px);
            -ms-filter: blur(10px);
            filter: blur(10px);
        }
        .contact-form
        {
            position: absolute;
            top: 50%;
            left: 60%;
            transform: translate(-50%,-50%);
            width: 1200px;
            height: 700px;
            padding: 20px 40px;
            box-sizing: border-box;
            background: rgba(0,0,0,.5);
        }
		.contact-form1
        {
            position: absolute;
            top: 50%;
            left: 10.5%;
            transform: translate(-50%,-50%);
            width: 300px;
            height: 700px;
            padding: 20px 40px;
            box-sizing: border-box;
            background: rgba(0,0,0,.5);
        }
        .avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            overflow: hidden;		/*hide the over flow*/
            top: 4%;		/*to be show the half of the picture outside the form cadre*/
            left: calc(50% - 40px);
			box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5), 0 6px 20px 0 rgba(0, 0, 0, 0.5);
        	transition: width 1s,height 1s;
        }
		.avatar:hover {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            overflow: hidden;		/*hide the over flow*/
            top: 4%;		/*to be show the half of the picture outside the form cadre*/
            left: calc(50% - 40px);
			box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5), 0 6px 20px 0 rgba(0, 0, 0, 0.5);
        }
        .contact-form1 h2 {
            margin: 0;
            padding: 10px 0 10px;
            color: #fff;
            text-align: center;
            text-transform: uppercase;
        }
		.contact-form1 h3 {
            margin: 0;
            padding: 10px 0 10px;
            color: #FF5E01;
            text-transform: uppercase;
        }
        .contact-form p
        {
            margin: 0;
            padding: 0;
            font-weight: bold;
            color: #fff;
			display:block;
        }
        .contact-form input
        {
            width: 100%;
            margin-bottom: 20px;
        }
        .contact-form input[type="text"],
        .contact-form input[type="password"]
        {
            border: none;
            margin-right: 20px;
            border-bottom: 1px solid #FF5E01;
            background: transparent;
            outline: none;
            height: 40px;
            color: #fff;
            font-size: 16px;
        }
        .contact-form input[type="submit"] {
            height: 30px;
			display:block;
			width: 100%;
            color: #fff;
            font-size: 15px;
            background: red;
            cursor: pointer;
            border: none;
            outline: none;
			transition: background 1s;
        }
		.contact-form input[type="submit"]:hover{
			background: #EF6D0A;
        }
        .contact-form a
        {
            color: #fff;
            font-size: 14px;
            font-weight: bold;
            text-decoration: none;
        }
        input[type="checkbox"] {
            width: 20%;
        }
		input[type="radio"] {
            margin-top: 20px;
            width: 20%;
            padding: 0;
        }
		table {
		width: 100%;
		border-spacing: 20px 0px;
		}
		.choix td {
			display:inline-block;
		}
		.near_radio {
			margin: 0;
            padding: 0;
            font-weight: bold;
            color: #FF5E01;
		}
		table.show {
			background: rgba(114, 43, 5,.5);
			border-collapse: collapse;
			width: 100%;
			overflow: auto;
		}

		th, td {
			text-align: left;
			padding: 8px;
		}

		.show tr:nth-child(even){background: rgba(255,250,0,.5);}

		th {
			background: rgba(255, 97, 0,.5);
			color: white;
			}
		input[type="time"] {
			border: none;
			background: transparent;
			border-bottom: 1px solid red;
        }
		.contact-form input[type="button"]
        {
            height: 30px;
			width: 50%;
            color: #fff;
            font-size: 15px;
            background: red;
            cursor: pointer;
            border-radius: 25px;
            border: none;
            outline: none;
            margin-top: 5%;
			transition: background 1s,width 2s;
        }
		input[type="number"] {
			border: none;
            margin-right: 20px;
            border-bottom: 1px solid #FF5E01;
            background: transparent;
            outline: none;
            height: 40px;
            color: #fff;
            font-size: 16px;
        }
		.table-wrapper-scroll-y {
			display: block;
			max-height: 170px;
			max-weight: 300px;
			overflow-y: auto;
			overflow-x: auto;
			-ms-overflow-style: -ms-autohiding-scrollbar;
		}
		.fixed-size  {
			border: none;
            background: transparent;
			width: 100%;
		}
    </style>
	<?php 
		$dbc = mysqli_connect('localhost','root', '');
		mysqli_select_db($dbc,'Transport1');
		
		
		
		if (isset($_POST['usere']))
			$username = trim($_POST['usere']);
		else
			$username = trim($_GET['usere']);
		
		
		$query1 = "	SELECT * 
					FROM chaufeur 
					WHERE USERC='$username'
				 ";

		if ($r = @mysqli_query($dbc,$query1))
		{
			$row = mysqli_fetch_array($r,MYSQLI_NUM);
			$vehicule=(int)$row[1];
			$prenom=$row[2];
			$nom=$row[3];
			$telephone=$row[4];
			$paymentmode=$row[6];
			if($paymentmode == 1)
			{
				$paymentmode='Per Month';
			}
			else
			{
				$paymentmode='Per Year';
			}
		}
		$query = "	SELECT MIN(joure.HEURE_DE_DEPART) 
					FROM programmee,joure,etudiant
					WHERE 	programmee.IDP=joure.IDP AND
							programmee.IDP=etudiant.IDP AND
							etudiant.NUMERO_DU_VEHICULE=$vehicule AND
							joure.JOUR='Monday'";
		if ($r = @mysqli_query($dbc,$query))
		{
			$row = mysqli_fetch_array($r,MYSQLI_NUM);
			$MondayGo = $row[0];
		}
		$query = "	SELECT MIN(joure.HEURE_DE_DEPART) 
					FROM programmee,joure,etudiant
					WHERE 	programmee.IDP=joure.IDP AND
							programmee.IDP=etudiant.IDP AND
							etudiant.NUMERO_DU_VEHICULE=$vehicule AND
							joure.JOUR='Tuesday'";
		if ($r = @mysqli_query($dbc,$query))
		{
			$row = mysqli_fetch_array($r,MYSQLI_NUM);
			$TuesdayGo = $row[0];
		}
		$query = "	SELECT MIN(joure.HEURE_DE_DEPART) 
					FROM programmee,joure,etudiant
					WHERE 	programmee.IDP=joure.IDP AND
							programmee.IDP=etudiant.IDP AND
							etudiant.NUMERO_DU_VEHICULE=$vehicule AND
							joure.JOUR='Wednesday'";
		if ($r = @mysqli_query($dbc,$query))
		{
			$row = mysqli_fetch_array($r,MYSQLI_NUM);
			$WednesdayGo = $row[0];
		}
		$query = "	SELECT MIN(joure.HEURE_DE_DEPART) 
					FROM programmee,joure,etudiant
					WHERE 	programmee.IDP=joure.IDP AND
							programmee.IDP=etudiant.IDP AND
							etudiant.NUMERO_DU_VEHICULE=$vehicule AND
							joure.JOUR='Thursday'";
		if ($r = @mysqli_query($dbc,$query))
		{
			$row = mysqli_fetch_array($r,MYSQLI_NUM);
			$ThursdayGo = $row[0];
		}
		$query = "	SELECT MIN(joure.HEURE_DE_DEPART) 
					FROM programmee,joure,etudiant
					WHERE 	programmee.IDP=joure.IDP AND
							programmee.IDP=etudiant.IDP AND
							etudiant.NUMERO_DU_VEHICULE=$vehicule AND
							joure.JOUR='Friday'";
		if ($r = @mysqli_query($dbc,$query))
		{
			$row = mysqli_fetch_array($r,MYSQLI_NUM);
			$FridayGo = $row[0];
		}
		$query = "	SELECT MIN(joure.HEURE_DE_DEPART) 
					FROM programmee,joure,etudiant
					WHERE 	programmee.IDP=joure.IDP AND
							programmee.IDP=etudiant.IDP AND
							etudiant.NUMERO_DU_VEHICULE=$vehicule AND
							joure.JOUR='Saturday'";
		if ($r = @mysqli_query($dbc,$query))
		{
			$row = mysqli_fetch_array($r,MYSQLI_NUM);
			$SaturdayGo = $row[0];
		}
		//---------------------------------------------------------------------------//
		$query = "	SELECT MIN(joure.HEURE_DE_RETOUR) 
					FROM programmee,joure,etudiant
					WHERE 	programmee.IDP=joure.IDP AND
							programmee.IDP=etudiant.IDP AND
							etudiant.NUMERO_DU_VEHICULE=$vehicule AND
							joure.JOUR='Monday'";
		if ($r = @mysqli_query($dbc,$query))
		{
			$row = mysqli_fetch_array($r,MYSQLI_NUM);
			$Mondayback = $row[0];
		}
		$query = "	SELECT MIN(joure.HEURE_DE_RETOUR) 
					FROM programmee,joure,etudiant
					WHERE 	programmee.IDP=joure.IDP AND
							programmee.IDP=etudiant.IDP AND
							etudiant.NUMERO_DU_VEHICULE=$vehicule AND
							joure.JOUR='Tuesday'";
		if ($r = @mysqli_query($dbc,$query))
		{
			$row = mysqli_fetch_array($r,MYSQLI_NUM);
			$Tuesdayback = $row[0];
		}
		$query = "	SELECT MIN(joure.HEURE_DE_RETOUR) 
					FROM programmee,joure,etudiant
					WHERE 	programmee.IDP=joure.IDP AND
							programmee.IDP=etudiant.IDP AND
							etudiant.NUMERO_DU_VEHICULE=$vehicule AND
							joure.JOUR='Wednesday'";
		if ($r = @mysqli_query($dbc,$query))
		{
			$row = mysqli_fetch_array($r,MYSQLI_NUM);
			$Wednesdayback = $row[0];
		}
		$query = "	SELECT MIN(joure.HEURE_DE_RETOUR) 
					FROM programmee,joure,etudiant
					WHERE 	programmee.IDP=joure.IDP AND
							programmee.IDP=etudiant.IDP AND
							etudiant.NUMERO_DU_VEHICULE=$vehicule AND
							joure.JOUR='Thursday'";
		if ($r = @mysqli_query($dbc,$query))
		{
			$row = mysqli_fetch_array($r,MYSQLI_NUM);
			$Thursdayback = $row[0];
		}
		$query = "	SELECT MIN(joure.HEURE_DE_RETOUR) 
					FROM programmee,joure,etudiant
					WHERE 	programmee.IDP=joure.IDP AND
							programmee.IDP=etudiant.IDP AND
							etudiant.NUMERO_DU_VEHICULE=$vehicule AND
							joure.JOUR='Friday'";
		if ($r = @mysqli_query($dbc,$query))
		{
			$row = mysqli_fetch_array($r,MYSQLI_NUM);
			$Fridayback = $row[0];
		}
		$query = "	SELECT MIN(joure.HEURE_DE_RETOUR) 
					FROM programmee,joure,etudiant
					WHERE 	programmee.IDP=joure.IDP AND
							programmee.IDP=etudiant.IDP AND
							etudiant.NUMERO_DU_VEHICULE=$vehicule AND
							joure.JOUR='Saturday'";
		if ($r = @mysqli_query($dbc,$query))
		{
			$row = mysqli_fetch_array($r,MYSQLI_NUM);
			$Saturdayback = $row[0];
		}
		//---------------------------------------------------------------------------//
		$query = "	SELECT MAX(joure.HEURE_DE_RETOUR) 
					FROM programmee,joure,etudiant
					WHERE 	programmee.IDP=joure.IDP AND
							programmee.IDP=etudiant.IDP AND
							etudiant.NUMERO_DU_VEHICULE=$vehicule AND
							joure.JOUR='Monday'";
		if ($r = @mysqli_query($dbc,$query))
		{
			$row = mysqli_fetch_array($r,MYSQLI_NUM);
			$Mondayback1 = $row[0];
		}
		$query = "	SELECT MAX(joure.HEURE_DE_RETOUR) 
					FROM programmee,joure,etudiant
					WHERE 	programmee.IDP=joure.IDP AND
							programmee.IDP=etudiant.IDP AND
							etudiant.NUMERO_DU_VEHICULE=$vehicule AND
							joure.JOUR='Tuesday'";
		if ($r = @mysqli_query($dbc,$query))
		{
			$row = mysqli_fetch_array($r,MYSQLI_NUM);
			$Tuesdayback1 = $row[0];
		}
		$query = "	SELECT MAX(joure.HEURE_DE_RETOUR) 
					FROM programmee,joure,etudiant
					WHERE 	programmee.IDP=joure.IDP AND
							programmee.IDP=etudiant.IDP AND
							etudiant.NUMERO_DU_VEHICULE=$vehicule AND
							joure.JOUR='Wednesday'";
		if ($r = @mysqli_query($dbc,$query))
		{
			$row = mysqli_fetch_array($r,MYSQLI_NUM);
			$Wednesdayback1 = $row[0];
		}
		$query = "	SELECT MAX(joure.HEURE_DE_RETOUR) 
					FROM programmee,joure,etudiant
					WHERE 	programmee.IDP=joure.IDP AND
							programmee.IDP=etudiant.IDP AND
							etudiant.NUMERO_DU_VEHICULE=$vehicule AND
							joure.JOUR='Thursday'";
		if ($r = @mysqli_query($dbc,$query))
		{
			$row = mysqli_fetch_array($r,MYSQLI_NUM);
			$Thursdayback1 = $row[0];
		}
		$query = "	SELECT MAX(joure.HEURE_DE_RETOUR) 
					FROM programmee,joure,etudiant
					WHERE 	programmee.IDP=joure.IDP AND
							programmee.IDP=etudiant.IDP AND
							etudiant.NUMERO_DU_VEHICULE=$vehicule AND
							joure.JOUR='Friday'";
		if ($r = @mysqli_query($dbc,$query))
		{
			$row = mysqli_fetch_array($r,MYSQLI_NUM);
			$Fridayback1 = $row[0];
		}
		$query = "	SELECT MAX(joure.HEURE_DE_RETOUR) 
					FROM programmee,joure,etudiant
					WHERE 	programmee.IDP=joure.IDP AND
							programmee.IDP=etudiant.IDP AND
							etudiant.NUMERO_DU_VEHICULE=$vehicule AND
							joure.JOUR='Saturday'";
		if ($r = @mysqli_query($dbc,$query))
		{
			$row = mysqli_fetch_array($r,MYSQLI_NUM);
			$Saturdayback1 = $row[0];
		}
		
		$Mondayback = sum_the_time($Mondayback1, $Mondayback);
		$Tuesdayback =sum_the_time($Tuesdayback1, $Tuesdayback1);
		$Wednesdayback = sum_the_time($Wednesdayback1, $Wednesdayback);
		$Thursdayback = sum_the_time($Thursdayback1, $Thursdayback);
		$Fridayback = sum_the_time($Fridayback1, $Fridayback);
		$Saturdayback = sum_the_time($Saturdayback1, $Saturdayback);
		mysqli_close($dbc);
		
		//function that add 2 times help to calculate the average for the return time
		function sum_the_time($time1, $time2) {
			$times = array($time1, $time2);
			$seconds = 0;
			foreach ($times as $time)
			{
			list($hour,$minute,$second) = explode(':', $time);
			$seconds += $hour*3600;
			$seconds += $minute*60;
			$seconds += $second;
			}
			$seconds = $seconds/2;
			$hours = floor($seconds/3600);
			$seconds -= $hours*3600;
			$minutes  = floor($seconds/60);
			$seconds -= $minutes*60;
			if($seconds < 9)
			{
			$seconds = "0".$seconds;
			}
			if($minutes < 9)
			{
			$minutes = "0".$minutes;
			}
			if($hours < 9)
			{
			$hours = "0".$hours;
			}
			return "{$hours}:{$minutes}:{$seconds}";
		}
	?>
</head>
<body>
	<div class="contact-form1"> 	 	
        <a href="sign_in.php"><center><img src="2.jpg" class="avatar"></center></a>
		<hr>
        <?php 
			echo '<h2>Hello : ' . $username . '</h2><hr>';
			echo '<h3>vehicule : ' . $vehicule . '</h3>';
			echo '<h3>prenom : ' . $prenom . '</h3>';
			echo '<h3>nom : ' . $nom . '</h3>';
			echo '<h3>telephone : ' . $telephone . '</h3>';
			echo '<h3>mode de payement : ' . $paymentmode . '</h3>';
			?>
		
		<hr>
	</div>
    <div class="contact-form">
	<fieldset>
		<legend><p>Map:</p></legend>
			<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d13327.278978910097!2d35.4868383!3d33.3757717!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2slb!4v1546331768091" width="100%" height="200px" frameborder="0" style="border:0" allowfullscreen></iframe>
	</fieldset>
		
	<fieldset>
		<legend><p>Coming back:</p></legend>
			<div class="table-wrapper-scroll-y">
			
				<table class="show">
					<tr>
						<th><p>Day</p></th>
						<th><p>Going at</p></th>
						<th><p>First Coming back hour</p></th>
						<th><p>First Coming back with</p></th>
						<th><p>Second Coming back hour</p></th>
						<th><p>Second Coming back with</p></th>
					</tr>
					<tr>
						<td>Monday :</td>
						<td> <input type="time" name="usr_time" disabled value="<?php echo $MondayGo; ?>"></td>
						<td> <input type="time" name="usr_time" disabled value="<?php echo $Mondayback; ?>"></td>
						<td>
							<select class="fixed-size">
							  <option value="" selected disabled hidden>Students:</option>
								<?php
									$dbc = mysqli_connect('localhost','root', '');
									mysqli_select_db($dbc,'Transport1');
									$query = "SELECT USERE FROM etudiant WHERE NUMERO_DU_VEHICULE=$vehicule";
									if ($r = @mysqli_query($dbc,$query))
									//if ($r = @mysql_query($query))
									{
									   while ($row = mysqli_fetch_array($r,MYSQLI_NUM))
									   //while ($row = mysql_fetch_array($r))
										{
											print "<option value=\"{$row[0]}\">{$row[0]}</option>";
										}
									}
									mysqli_close($dbc);
								?>
							</select>
						</td>
						<td> <input type="time" name="usr_time" disabled value="<?php echo $Mondayback1; ?>"></td>
						<td>
							<select class="fixed-size">
							  <option value="" selected disabled hidden>Students:</option>
							  <?php
									$dbc = mysqli_connect('localhost','root', '');
									mysqli_select_db($dbc,'Transport1');
									$query = "SELECT USERE FROM etudiant WHERE NUMERO_DU_VEHICULE=$vehicule";
									if ($r = @mysqli_query($dbc,$query))
									//if ($r = @mysql_query($query))
									{
									   while ($row = mysqli_fetch_array($r,MYSQLI_NUM))
									   //while ($row = mysql_fetch_array($r))
										{
											print "<option value=\"{$row[0]}\">{$row[0]}</option>";
										}
									}
									mysqli_close($dbc);
								?>
							</select>
						</td>
					</tr>
					<tr>
						<td>Tuesday :</td>
						<td> <input type="time" name="usr_time" disabled value="<?php echo $TuesdayGo; ?>"></td>
						<td> <input type="time" name="usr_time" disabled value="<?php echo $Tuesdayback; ?>"></td>
						<td>
							<select class="fixed-size">
							  <option value="" selected disabled hidden>Students:</option>
								<?php
									$dbc = mysqli_connect('localhost','root', '');
									mysqli_select_db($dbc,'Transport1');
									$query = "SELECT USERE FROM etudiant WHERE NUMERO_DU_VEHICULE=$vehicule";
									if ($r = @mysqli_query($dbc,$query))
									//if ($r = @mysql_query($query))
									{
									   while ($row = mysqli_fetch_array($r,MYSQLI_NUM))
									   //while ($row = mysql_fetch_array($r))
										{
											print "<option value=\"{$row[0]}\">{$row[0]}</option>";
										}
									}
									mysqli_close($dbc);
								?>
							</select>
						</td>
						<td> <input type="time" name="usr_time" disabled value="<?php echo $Tuesdayback1; ?>"></td>
						<td>
							<select class="fixed-size">
							  <option value="" selected disabled hidden>Students:</option>
								<?php
									$dbc = mysqli_connect('localhost','root', '');
									mysqli_select_db($dbc,'Transport1');
									$query = "SELECT USERE FROM etudiant WHERE NUMERO_DU_VEHICULE=$vehicule";
									if ($r = @mysqli_query($dbc,$query))
									//if ($r = @mysql_query($query))
									{
									   while ($row = mysqli_fetch_array($r,MYSQLI_NUM))
									   //while ($row = mysql_fetch_array($r))
										{
											print "<option value=\"{$row[0]}\">{$row[0]}</option>";
										}
									}
									mysqli_close($dbc);
								?>
							</select>
						</td>
					</tr>
					<tr>
						<td>Wednesday :</td>
						<td> <input type="time" name="usr_time" disabled value="<?php echo $WednesdayGo; ?>"></td>
						<td> <input type="time" name="usr_time" disabled value="<?php echo $Wednesdayback; ?>"></td>
						<td>
							<select class="fixed-size">
							  <option value="" selected disabled hidden>Students:</option>
								<?php
									$dbc = mysqli_connect('localhost','root', '');
									mysqli_select_db($dbc,'Transport1');
									$query = "SELECT USERE FROM etudiant WHERE NUMERO_DU_VEHICULE=$vehicule";
									if ($r = @mysqli_query($dbc,$query))
									//if ($r = @mysql_query($query))
									{
									   while ($row = mysqli_fetch_array($r,MYSQLI_NUM))
									   //while ($row = mysql_fetch_array($r))
										{
											print "<option value=\"{$row[0]}\">{$row[0]}</option>";
										}
									}
									mysqli_close($dbc);
								?>
							</select>
						 </td>
						<td> <input type="time" name="usr_time" disabled value="<?php echo $Wednesdayback1; ?>"></td>
						<td>
							<select class="fixed-size">
							  <option value="" selected disabled hidden>Students:</option>
								<?php
									$dbc = mysqli_connect('localhost','root', '');
									mysqli_select_db($dbc,'Transport1');
									$query = "SELECT USERE FROM etudiant WHERE NUMERO_DU_VEHICULE=$vehicule";
									if ($r = @mysqli_query($dbc,$query))
									//if ($r = @mysql_query($query))
									{
									   while ($row = mysqli_fetch_array($r,MYSQLI_NUM))
									   //while ($row = mysql_fetch_array($r))
										{
											print "<option value=\"{$row[0]}\">{$row[0]}</option>";
										}
									}
									mysqli_close($dbc);
								?>
							</select>
						</td>
					</tr>
					<tr>
						<td>Thursday :</td>
						<td> <input type="time" name="usr_time" disabled value="<?php echo $ThursdayGo; ?>"></td>
						<td> <input type="time" name="usr_time" disabled value="<?php echo $Thursdayback; ?>"></td>
						<td>
							<select class="fixed-size">
							  <option value="" selected disabled hidden>Students:</option>
								<?php
									$dbc = mysqli_connect('localhost','root', '');
									mysqli_select_db($dbc,'Transport1');
									$query = "SELECT USERE FROM etudiant WHERE NUMERO_DU_VEHICULE=$vehicule";
									if ($r = @mysqli_query($dbc,$query))
									//if ($r = @mysql_query($query))
									{
									   while ($row = mysqli_fetch_array($r,MYSQLI_NUM))
									   //while ($row = mysql_fetch_array($r))
										{
											print "<option value=\"{$row[0]}\">{$row[0]}</option>";
										}
									}
									mysqli_close($dbc);
								?>
							</select>
						</td>
						<td> <input type="time" name="usr_time" disabled value="<?php echo $Thursdayback1; ?>"></td>
						<td>
							<select class="fixed-size">
							  <option value="" selected disabled hidden>Students:</option>
								<?php
									$dbc = mysqli_connect('localhost','root', '');
									mysqli_select_db($dbc,'Transport1');
									$query = "SELECT USERE FROM etudiant WHERE NUMERO_DU_VEHICULE=$vehicule";
									if ($r = @mysqli_query($dbc,$query))
									//if ($r = @mysql_query($query))
									{
									   while ($row = mysqli_fetch_array($r,MYSQLI_NUM))
									   //while ($row = mysql_fetch_array($r))
										{
											print "<option value=\"{$row[0]}\">{$row[0]}</option>";
										}
									}
									mysqli_close($dbc);
								?>
							</select>
						</td>
					</tr>
					<tr>
						<td>Friday :</td>
						<td> <input type="time" name="usr_time" disabled value="<?php echo $FridayGo; ?>"></td>
						<td> <input type="time" name="usr_time" disabled value="<?php echo $Fridayback; ?>"></td>
						<td>
							<select class="fixed-size">
							  <option value="" selected disabled hidden>Students:</option>
								<?php
									$dbc = mysqli_connect('localhost','root', '');
									mysqli_select_db($dbc,'Transport1');
									$query = "SELECT USERE FROM etudiant WHERE NUMERO_DU_VEHICULE=$vehicule";
									if ($r = @mysqli_query($dbc,$query))
									//if ($r = @mysql_query($query))
									{
									   while ($row = mysqli_fetch_array($r,MYSQLI_NUM))
									   //while ($row = mysql_fetch_array($r))
										{
											print "<option value=\"{$row[0]}\">{$row[0]}</option>";
										}
									}
									mysqli_close($dbc);
								?>
							</select>
						</td>
						<td> <input type="time" name="usr_time" disabled value="<?php echo $Fridayback1; ?>"></td>
						<td>
							<select class="fixed-size">
							  <option value="" selected disabled hidden>Students:</option>
								<?php
									$dbc = mysqli_connect('localhost','root', '');
									mysqli_select_db($dbc,'Transport1');
									$query = "SELECT USERE FROM etudiant WHERE NUMERO_DU_VEHICULE=$vehicule";
									if ($r = @mysqli_query($dbc,$query))
									//if ($r = @mysql_query($query))
									{
									   while ($row = mysqli_fetch_array($r,MYSQLI_NUM))
									   //while ($row = mysql_fetch_array($r))
										{
											print "<option value=\"{$row[0]}\">{$row[0]}</option>";
										}
									}
									mysqli_close($dbc);
								?>
							</select>
						</td>
					</tr>
					<tr>
						<td>Saturday :</td>
						<td> <input type="time" name="usr_time" disabled value="<?php echo $SaturdayGo; ?>"></td>
						<td> <input type="time" name="usr_time" disabled value="<?php echo $Saturdayback; ?>"></td>
						<td>
							<select class="fixed-size">
							  <option value="" selected disabled hidden>Students:</option>
								<?php
									$dbc = mysqli_connect('localhost','root', '');
									mysqli_select_db($dbc,'Transport1');
									$query = "SELECT USERE FROM etudiant WHERE NUMERO_DU_VEHICULE=$vehicule";
									if ($r = @mysqli_query($dbc,$query))
									//if ($r = @mysql_query($query))
									{
									   while ($row = mysqli_fetch_array($r,MYSQLI_NUM))
									   //while ($row = mysql_fetch_array($r))
										{
											print "<option value=\"{$row[0]}\">{$row[0]}</option>";
										}
									}
									mysqli_close($dbc);
								?>
							</select>
						</td>
						<td> <input type="time" name="usr_time" disabled value="<?php echo $Saturdayback1; ?>"></td>
						<td>
							<select class="fixed-size">
							  <option value="" selected disabled hidden>Students:</option>
								<?php
									$dbc = mysqli_connect('localhost','root', '');
									mysqli_select_db($dbc,'Transport1');
									$query = "SELECT USERE FROM etudiant WHERE NUMERO_DU_VEHICULE=$vehicule";
									if ($r = @mysqli_query($dbc,$query))
									//if ($r = @mysql_query($query))
									{
									   while ($row = mysqli_fetch_array($r,MYSQLI_NUM))
									   //while ($row = mysql_fetch_array($r))
										{
											print "<option value=\"{$row[0]}\">{$row[0]}</option>";
										}
									}
									mysqli_close($dbc);
								?>
							</select>
						</td>
					</tr>
				</table>
			</div>
	</fieldset>
	<fieldset>
		<legend><p>Students:</p></legend>
			<div class="table-wrapper-scroll-y">
			
				<table class="show">
					<tr>
						<th><p>Name</p></th>
						<th><p>Telephone</p></th>
						<th><p>Location</p></th>
					</tr>
					<?php
									$dbc = mysqli_connect('localhost','root', '');
									mysqli_select_db($dbc,'Transport1');
									$query = "SELECT USERE,TELEPHONEE,LOCATIONE FROM etudiant WHERE NUMERO_DU_VEHICULE=$vehicule";
									if ($r = @mysqli_query($dbc,$query))
									//if ($r = @mysql_query($query))
									{
									   while ($row = mysqli_fetch_array($r,MYSQLI_NUM))
									   //while ($row = mysql_fetch_array($r))
										{
											print "	<tr>
														<td>{$row[0]}</td>
														<td>{$row[1]}</td>
														<td>{$row[2]}</td>
													</tr>";
										}
									}
									mysqli_close($dbc);
								?>
				</table>
			</div>
	</fieldset>
    </div>
</body>
</html>