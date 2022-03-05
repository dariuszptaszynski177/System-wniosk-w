
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>

ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  
}

ul li {
  float: right;
	margin-left:10px;
	margin-right:10px;
	margin-top:15px;
  font-size: 16px;
}

li a {
  display: block;
  color: #9d9d9d;
  text-align: center;
  padding: 0px 0px;
  text-decoration: none;
}

a:hover
{
color:white;
text-decoration: none;
}



</style>




</head>
<body style="background-color:#101010">

<div style="background-color:#101010;height:60px;margin-right:50px">

<div class="col-xs-4">
<img src="../users/images/logo.png" alt="logo" style="margin-left:100px;"/>
</div>

<div class="col-xs-8"> 

<ul>
<li><a href="../users/join.php" class="fa fa-plus-square"> Rejestracja</a></li>
<li><a href="../users/login.php" class="fa fa-sign-in"> Logowanie</a></li>
<li><a href="../index.php" class="fa fa-home"> Home</a></li>
</ul>

</div>


</div>

<div class="row" style="background-color:white;">
<div class="col-xs-12" style="margin-left:30px;">
<h1>Zresetuj swoje hasło</h1>
<ol>
	<li>Wpisz swój e-mail i kliknij Zresetuj</li>
	<li>Sprawdź e-mail. Wiadomość mogła trafić do Spamu</li>
	<li>Podążaj za kolejnymi instrukcjami</li>
</ol>

<form action="reset_password.php" method="post" class="form ">
	
	<div class="form-group">
		<label for="email">E-mail</label>
		<input type="text" name="email" placeholder="E-mail" class="form-control" autofocus>
	</div>

	
	<p><input type="submit" name="forgotten_password" value="Zresetuj" class="btn btn-primary"></p>
</form>

</div><!-- /.col -->
</div><!-- /.row -->



</body>
</html>