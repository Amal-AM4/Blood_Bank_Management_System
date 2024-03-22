<style type="text/css">
	.container{
		display: block;
		height: 100vh;
		position: relative;
	}
	.wrapper{
		width: 300px;
		height: 600px;
		text-align: center;
		border-radius: 30px;
		background-color: #1a237e;
		color: #fff;
		box-shadow: 0 10px 20px rgba(0,0,0,0.4); 
		position: absolute;
		top: 0; bottom: 0;
		left: 0; right: 0;
		margin: auto;
	}
	.wrapper .icon{
		display: block;
	}
	.wrapper .icon img{
		margin-top: 20px;
		width: 310px;
		height: auto;
	}
	.wrapper .navigation{
		margin-top: 20px;
		text-transform: uppercase;
		color: #fff;
	}
	.wrapper .navigation ul{
		list-style: none;
	}
	.wrapper .navigation ul li{
		margin: 10px;
	}
	.wrapper .navigation ul li a{
		text-decoration: none;
		color: #fff;
		font-size: 20px;
		font-weight: bold;
	}
	.wrapper .navigation ul li a:hover{
		color: #304FFE;
	}
</style>
<link rel="stylesheet" type="text/css" href="../assets/css/aos.css">

<nav class="container" data-aos="fade-right" data-aos-delay="350">
	<div class="wrapper">
		<div class="icon">
			<center>
				<img src="../assets/images/BGLO.png">
			</center>
		</div>
		<div class="navigation">
			<ul>
				<li><a href="dashboard.php">Dashboard</a></li>
				<li><a href="members.php">Members</a></li>
				<li><a href="hospital.php">Hospitals</a></li>
				<li><a href="message.php">Messages</a></li>
				<li><a href="feedback.php">Feed Back</a></li>
				<li><a href="send.php">Send</a></li>
			</ul>
		</div>
	</div>
</nav>


<script type="text/javascript" src="../assets/js/aos.js"></script>
<script>
        AOS.init();
</script>