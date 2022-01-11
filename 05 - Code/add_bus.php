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
            width: 1000px;
            height: 700px;
            padding: 20px 40px;
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
			max-height: 200px;
			overflow-y: auto;
			-ms-overflow-style: -ms-autohiding-scrollbar;
		}
		
    </style>
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
			$paymentmode = trim($_POST['mode']);
			if($paymentmode == 'Month')
			{
				$paymentmode=1;
			}
			else
			{
				$paymentmode=0;
			}
		
			$query = "INSERT INTO chaufeur (USERC, NUMERO_DU_VEHICULE, PRENOMC, NOMC, TELEPHONEC, PASSWORDC, MODE_DE_PAYEMENT)
						VALUES ('$username', null, '$firstname', '$lastname', '$pnb', '$password', $paymentmode)
					 ";

			if (@mysqli_query($dbc,$query))
			{
				//print '<p>The blog entry has been added!</p>';
			}
			mysqli_close($dbc);
	}
?>
</head>
<body>
    <div class="contact-form">
        <h2>Enter bus information ...</h2>
        <form method="post" action="success_chauffeur.php">
			<fieldset>
				<legend><p>Bus information:</p></legend>
				<table>
					<tr>
						<td width="50px"><p>Vehicule Number</p></td>
						<td width="50px"><p>Vehicule Model</p></td>
					</tr>
					<tr>
						<td><input type="text" name="vnb" placeholder="Enter Vehicule Number"></td>
						<td><input type="text" name="vmodel" placeholder="Enter Vehicule Model"></td>
					</tr>
					<tr>
						<td width="50px"><p>Vehicule Capacity</p></td>
					</tr>
					<tr>
						<td><input type="number" name="quantity" min="1" max="100" placeholder="Enter Vehicule Capacity"></td>
					</tr>
				</table>
			</fieldset>
			<fieldset>
				<legend><p>ADD Location:</p></legend>
				<table>
					<tr>
						<td width="50px"><p>Location</p></td>
					</tr>
					<tr>
						<td width="500px"><input type="text" name="vlocation" placeholder="Enter Location"></td>
						<td><center><input type="submit" name="add_bus" value="ADD" disabled></center></td>
					</tr>
				</table>
			<div class="table-wrapper-scroll-y">
				<table class="show">
					<tr>
						<th><p>Vehicule Number</p></th>
						<th><p>Location</p></th>
					</tr>
				</table>
			</div>
			</fieldset>
			<input type="hidden" name="usere" value="<?php echo $username; ?>">
			<center><input type="submit" name="submit" value="OK"></center>
        </form>
    </div>
</body>
</html>