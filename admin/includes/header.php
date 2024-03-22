
<style type="text/css">
	header{
		height: 110px;
	}
	header h2{
		display: inline;
		font-size:  3em;
		position: relative;
		top: 15px;
	}
	header a{
		text-decoration: none;
	}
	header .btn-out{
		width: 120px;
		height: 45px;
		background-color: #fff;
		color: #1a237e;
		font-weight: bold;
		border: none;
		outline: none;
		cursor: pointer;
		border-radius: 30px;
		font-size: 16px;
		position: relative;
		top: 5px; left: 200px;
		box-shadow: 0 10px 10px rgba(0,0,0,0.5);
	}
	header .btn-out:hover{
		background-color: #1a237e;
		color: #fff;
		box-shadow: 0 10px 10px rgba(0,0,0,0.5);
	}
	header hr{
		margin-top: 30px;
		width: 90%;
	}
</style>
<link rel="stylesheet" type="text/css" href="../assets/css/aos.css">

<header data-aos="fade-down" data-aos-delay="350">
	<h2>Blood Bank Management System</h2>
	<a href="log_out.php">
		<button class="btn-out">LOG OUT</button>
	</a>
	<hr>
</header>

<script type="text/javascript" src="../assets/js/aos.js"></script>
<script>
        AOS.init();
</script>