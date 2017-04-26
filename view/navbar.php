<nav class="navbar navbar-inverse" style="width: 101%; margin-left:-0.2%">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			<span class="sr-only"> Toggle Navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			</button>
			<a href="index.php" class="navbar-brand">TJP BookStore</a>
		</div>

		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
						<?php
						session_start();
						if(isset($_GET['page']) && $_GET['page'] == 'order' ){
							echo '<li class="active"><a href="index.php?page=order">Order</a></li>';
						}else{
							echo '<li><a href="index.php?page=order">Order</a></li>';
						}

						if(isset($_GET['page']) && $_GET['page'] == 'buku' ){
							echo '<li class="active"><a href="index.php?page=buku">Buku</a></li>';
						}else{
							echo '<li><a href="index.php?page=buku">Buku</a></li>';
						}
				if(isset($_SESSION['level'])){
					if($_SESSION['level'] == 'operator' OR $_SESSION['level'] == 'admin'){
						
						if(isset($_GET['page']) && $_GET['page'] == 'distributor'){
						echo '<li class="active"><a href="index.php?page=distributor">Distributor</a></li>';
						}else{
							echo '<li><a href="index.php?page=distributor">Distributor</a></li>';
						}

						if(isset($_GET['page']) && $_GET['page'] == 'pemasok'){
						echo '<li class="active"><a href="index.php?page=pemasok">Pemasok</a></li>';
						}else{
							echo '<li><a href="index.php?page=pemasok">Pemasok</a></li>';
						}
						if(isset($_GET['page']) && $_GET['page'] == 'penjualan'){
							echo '<li class="active"><a href="index.php?page=penjualan">Penjualan</a></li>';
						}else{
							echo '<li><a href="index.php?page=penjualan">Penjualan</a></li>';
						}
					}
					if($_SESSION['level'] == 'admin'){
						if(isset($_GET['page']) && $_GET['page'] == 'kasir'){
							echo '<li class="active"><a href="index.php?page=kasir">Kasir</a></li>';
						}else{
							echo '<li><a href="index.php?page=kasir">Kasir</a></li>';
						}
					}
				}
						?>


			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="logout.php"> LOGOUT </a></li>
				<li class="dropdown"></li>
			</ul>
		</div>
	</div>
</nav>