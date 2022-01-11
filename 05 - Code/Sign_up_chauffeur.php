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
            height: 670px;
            padding: 80px 40px;
            box-sizing: border-box;
            background: rgba(0,0,0,.5);
        }
        .avatar {
            position: absolute;
            width: 80px;
            height: 80px;
            border-radius: 50%;
            overflow: hidden;		/*hide the over flow*/
            top: calc(-40px);		/*to be show the half of the picture outside the form cadre*/
            left: calc(50% - 40px);
			box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5), 0 6px 20px 0 rgba(0, 0, 0, 0.5);
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
            color: #FB9716;
			display:block;
        }
		.remember
		{
            text-align: center;
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
		.contact-form input[type="button"]
        {
            height: 30px;
			width: 100%;
            color: #fff;
            font-size: 15px;
            background: #ea6f04;
            cursor: pointer;
            border-radius: 0px;
            border: none;
            outline: none;
            margin-top: 5%;
        }
		h3 {
            margin: 0;
            padding: 10px 0 10px;
            color: #FF5E01;
            text-transform: uppercase;
			display: inline-block;
			font-size: 12px;
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
    </style>
</head>
<body>
    <div class="contact-form">
        <img src="2.jpg" class="avatar">
        <h2>Dreiver Account</h2>
        <h2>Step 1 : Fill your information</h2>
        <form action="add_bus.php" method="post">
		<table>
			<tr>
				<td><p>User Name</p></td>
			</tr>
			<tr>
				<td colspan="2"><input type="text" name="uname" placeholder="Enter a unique User Name" required></td>
			</tr>
			<tr>
				<td><p>First Name</p></td>
				<td><p>Last Name</p></td>
			</tr>
			<tr>
				<td><input type="text" name="fname" placeholder="Enter First Name" required></td>
				<td><input type="text" name="lname" placeholder="Enter Last Name" required></td>
			</tr>
			
			<tr>
				<td><p>Password</p></td>
				<td><p>Confirm Password</p></td>
			</tr>
			<tr>
				<td><input type="password" name="fpass" placeholder="Enter Your Password" required></td>
				<td><input type="password" name="spass" placeholder="Confirm Your Password" required></td>
			</tr>
			<tr>
				<td><p>Phone Number</p></td>
				<td><p>Payment Mode</p></td>
			</tr>
			<tr>
				<td><input type="text" name="pnb" placeholder="Enter Your Phone Number" required></td>
				<td><input type="radio" name="mode" value="Month"><h3>Per Month </h3><input type="radio" name="mode" value="Year"><h3>Per Year</h3></td>
			</tr>
			<tr>
				<td><p>Montant</p></td>
			</tr>
			<tr>
				<td colspan="2"><input type="number" name="montant" min="1" placeholder="Enter Montant"></td>
			</tr>
		</table>
			<input type="hidden" name="submitted" value="true" />
            <center><input type="submit" name="" value="Next"></center>
			
        </form>
    </div>
</body>
</html>