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
            left: 50%;
            transform: translate(-50%,-50%);
            width: 700px;
            height: 600px;
            padding: 80px 40px;
            box-sizing: border-box;
            background: rgba(0,0,0,.5);
        }
        .contact-form h2 {
            margin: 0;
            padding: 0 0 20px;
            color: #fff;
            text-align: center;
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

		.contact-form input[type="submit"]:active {
			width: 60%;
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
		table {
			background: rgba(114, 43, 5,.5);
			border-collapse: collapse;
			width: 100%;
		}

		th, td {
			text-align: left;
			padding: 8px;
		}

		tr:nth-child(even){background: rgba(255,250,0,.5);}

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
		</style>
		<script>
			//window.onload = alert(localStorage.getItem("storageName"));
			//alert("" + <?php echo $_POST['uname']; ?>);
			//alert("hello");
	</script>
	<?php 

if (isset($_POST['submitted']))
{
	$dbc = mysqli_connect('localhost','root', '');
	mysqli_select_db($dbc,'Transport1');

		$username = trim($_POST['uname']);
		$firstname = trim($_POST['fname']);
		$lastname = trim($_POST['lname']);
		$password = trim($_POST['fpass']);
		$pnb = trim($_POST['pnb']);
		$location = trim($_POST['location']);
		
		$query1 = "	SELECT NUMERO_DU_VEHICULE
					FROM location
					WHERE NOML='$location'
					";
		if ($r = @mysqli_query($dbc,$query1))
		{
			$row = mysqli_fetch_array($r,MYSQLI_NUM);
			$ndv=(int)$row[0];
		}
	
		$query = "INSERT INTO ETUDIANT (USERE, 	NUMERO_DU_VEHICULE, PRENOME, NOME, LOCATIONE, TELEPHONEE, PASSWORDE)
					VALUES ('$username', $ndv, '$firstname', '$lastname', '$location', '$pnb', '$password')
				 ";

		if (@mysqli_query($dbc,$query))
		{
			//print '<p>The blog entry has been added!</p>';
		}
		mysqli_close($dbc);
}
?>
   <?php 
   echo "	<script>
				// alert(\"\");
			</script>";
	?>
</head>
<body>
    <div class="contact-form">
        <h2>Choose your weekly program ...</h2>
        <form action="success_studiant.php" method="post">
		<table>
			<tr>
				<th><p>Day :</p></th>
				<th><p>From - hh</p></th>
				<th><p>To   - hh</p></th>
			</tr>
			<tr>
				<td>Monday :</td>
				<td> <input type="time" name="Monday1"></td>
				<td> <input type="time" name="Monday2"></td>
			</tr>
			<tr>
				<td>Tuesday :</td>
				<td> <input type="time" name="Tuesday1"></td>
				<td> <input type="time" name="Tuesday2"></td>
			</tr>
			<tr>
				<td>Wednesday :</td>
				<td> <input type="time" name="Wednesday1"></td>
				<td> <input type="time" name="Wednesday2"></td>
			</tr>
			<tr>
				<td>Thursday :</td>
				<td> <input type="time" name="Thursday1"></td>
				<td> <input type="time" name="Thursday2"></td>
			</tr>
			<tr>
				<td>Friday :</td>
				<td> <input type="time" name="Friday1"></td>
				<td> <input type="time" name="Friday2"></td>
			</tr>
			<tr>
				<td>Saturday :</td>
				<td> <input type="time" name="Saturday1"></td>
				<td> <input type="time" name="Saturday2"></td>
			</tr>
		</table>
			<input type="hidden" name="usere" value="<?php echo $username; ?>">
            <center><input type="submit" name="submit" value="OK"></center>
        </form>
    </div>
</body>
</html>