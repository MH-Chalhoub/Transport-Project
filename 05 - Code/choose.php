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
        .avatar {
            position: absolute;
            width: 80px;
            height: 80px;
            border-radius: 50%;
            overflow: hidden;		/*hide the over flow*/
            top: calc(100px);		/*to be show the half of the picture outside the form cadre*/
            left: calc(50% - 40px);
        }
        .contact-form h2 {
            margin: 0;
            padding: 0 0 20px;
            color: #fff;
            text-align: center;
            text-transform: uppercase;
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
        .contact-form a
        {
            color: #fff;
            font-size: 14px;
            font-weight: bold;
            text-decoration: none;
        }
		table {
		width: 100%;
		border-spacing: 20px 0px;
		}
		.which{
            transform: translate(40px,40px);
            width: 200px;
            height: 300px;
            box-sizing: border-box;
            background: rgba(255,250,0,.5);
			transition: width 2s, height 2s, transform 2s;
			border-radius: 12px;
			border-bottom: 30px solid red;
        }
		.which:hover{
            transform: translate(20px,20px);
            width: 250px;
            height: 350px;
        }
		.item {
		
			transform: translate(50px,20px);
			vertical-align: middle;
			background: rgba(255,250,0,.5);
			text-align: center;
			border-radius: 12px;
			border-bottom: 30px solid red;
			font-size: 35px;
			width: 200px;
            height: 300px;
			transition: height 2s, transform 2s;
			display: inline-block;
			box-sizing: border-box;
			margin: 25px;
			padding-top: 30%;
			font-family: "Comic Sans MS", cursive, sans-serif;
		}
		.item:hover {
            height: 350px;
			background: rgba(255,250,0,.8);
			color: white;
		}
		
		
    </style>
</head>
<body>
    <div class="contact-form">
        
        <h2>This account is for a ...</h2>
        <form>
			<a href="Sign_up_student.php"><div class="item">Student<img src="student.png" class="avatar"></div></a>
			<a href="Sign_up_chauffeur.php"><div class="item">Driver<img src="bus1.png" class="avatar"></div></a>
        </form>
    </div>
</body>
</html>