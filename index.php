<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>TJP BOOKSTORE</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">

<!--Icons-->
<script src="js/lumino.glyphs.js"></script>
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
<?php
session_start();
?>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#"><span>TJP</span>BOOKSTORE</a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> User <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="#"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Profile</a></li>
							<li><a href="controller/authcontroller.php?page=logout"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>
							
		</div><!-- /.container-fluid -->
	</nav>
		
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>
		<ul class="nav menu">

		<?php
			if(!isset($_GET['page'])){
				echo '<li class="active"><a href="index.php"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Dashboard</a></li>';
			}else{
				echo '<li><a href="index.php"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Dashboard</a></li>';
			}

			if(isset($_GET['page']) && $_GET['page'] == 'order'){
				echo '<li class="active"><a href="index.php?page=order"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg> Order</a></li>';
			}else{
				echo '<li><a href="index.php?page=order"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg> Order</a></li>';
			}

			if(isset($_GET['page']) && $_GET['page'] == 'buku'){
				echo '<li class="active"><a href="index.php?page=buku"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg> Buku</a></li>';
			}else{
				echo '<li><a href="index.php?page=buku"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg> Buku</a></li>';
			}
		if($_SESSION['level'] == 'operator' OR $_SESSION['level'] == 'admin'){

			if(isset($_GET['page']) && $_GET['page'] == 'distributor'){
				echo '<li class="active"><a href="index.php?page=distributor"><svg class="glyph stroked table"><use xlink:href="#stroked-table"></use></svg> Distributor</a></li>';
			}else{
				echo '<li><a href="index.php?page=distributor"><svg class="glyph stroked table"><use xlink:href="#stroked-table"></use></svg> Distributor</a></li>';
			}

			if(isset($_GET['page']) && $_GET['page'] == 'pemasok'){
				echo '<li class="active"><a href="index.php?page=pemasok"><svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"></use></svg> Pemasok</a></li>';
			}else{
				echo '<li><a href="index.php?page=pemasok"><svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"></use></svg> Pemasok</a></li>';
			}

			if(isset($_GET['page']) && $_GET['page'] == 'penjualan'){
				echo '<li class="active"><a href="index.php?page=penjualan"><svg class="glyph stroked app-window"><use xlink:href="#stroked-app-window"></use></svg> Penjualan</a></li>';
			}else{
				echo '<li><a href="index.php?page=penjualan"><svg class="glyph stroked app-window"><use xlink:href="#stroked-app-window"></use></svg> Penjualan</a></li>';
			}
		}
		if ($_SESSION['level'] == 'admin') {

			if(isset($_GET['page']) && $_GET['page'] == 'kasir'){
				echo '<li class="active"><a href="index.php?page=kasir"><svg class="glyph stroked star"><use xlink:href="#stroked-star"></use></svg> Kasir</a></li>';
			}else{
				echo '<li><a href="index.php?page=kasir"><svg class="glyph stroked star"><use xlink:href="#stroked-star"></use></svg> Kasir</a></li>';
			}
		}
		?>
			
		<div class="attribution">RPL-TJP 2017<br/></div>
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Icons</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">TJP BOOKSTORE</h1>
			</div>
		</div><!--/.row-->

	<?php

if(isset($_SESSION['username'])){

	if(isset($_GET['page'])){
			if($_GET['page'] == 'buku'){
				require_once('view/buku/index.php');
			}
			if($_GET['page'] == 'tambahbuku'){
				require_once('view/buku/create.php');
			}
			if($_GET['page'] == 'editbuku'){
					require_once('view/buku/edit.php');
			}
			if($_GET['page'] == 'detailbuku'){
				require_once('view/buku/show.php');
			}

		if($_SESSION['level'] == 'operator' OR $_SESSION['level'] == 'admin'){

			if($_GET['page'] == 'distributor'){
				require_once('view/distributor/index.php');
			}
			if($_GET['page'] == 'tambahdistributor'){
				require_once('view/distributor/create.php');
			}
			if($_GET['page'] == 'editdistributor'){
				require_once('view/distributor/edit.php');
			}

			if($_GET['page'] == 'penjualan'){
				require_once('view/penjualan/index.php');
			}

			if($_GET['page'] == 'detail_penjualan'){
				require_once('view/penjualan/show.php');
			}



			if($_GET['page'] == 'pemasok'){
				require_once('view/pasok/index.php');
			}
			if($_GET['page'] == 'tambahpasok'){
				require_once('view/pasok/create.php');
			}
			if($_GET['page'] == 'editpasok'){
				require_once('view/pasok/edit.php');
			}

		}
		if ($_SESSION['level'] == 'admin') {
			if($_GET['page'] == 'kasir'){
				require_once('view/kasir/index.php');
			}
			if($_GET['page'] == 'tambahkasir'){
				require_once('view/kasir/create.php');
			}
			if($_GET['page'] == 'editkasir'){
				require_once('view/kasir/edit.php');
			}
			if($_GET['page'] == 'detailkasir'){
				require_once('view/kasir/show.php');
			}
		}




			if($_GET['page'] == 'order'){
				require_once('view/order/index.php');
			}

			if($_GET['page'] == 'cart'){
				require_once('view/order/cart.php');
			}

			if($_GET['page'] == 'selesai'){
				require_once('view/order/selesai.php');
			}

			if($_GET['page'] == 'login'){
				require_once('view/login/index.php');
			}

	}else{
		require_once('view/home/index.php');
	}
}else {
	header('location: login.php');
}
?>




								
		
	</div>	<!--/.main-->


	<script>
		$('#calendar').datepicker({
		});

		!function ($) {
		    $(document).on("click","ul.nav li.parent > a > span.icon", function(){          
		        $(this).find('em:first').toggleClass("glyphicon-minus");      
		    }); 
		    $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>	
</body>

</html>
