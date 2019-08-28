<?php include_once 'include_admin/header.php' ?>
	<?php include_once 'include_admin/nav.php' ?>		
	<?php include_once 'include_admin/side_bar.php' ?>

		<div class="row">
			<ol class="breadcrumb">
				<li><a href="index.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Dashboard</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Dashboard</h1>
			</div>
		</div><!--/.row-->
		
<div class="row">
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-blue panel-widget ">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large">
								<?php 
                                    $available_query = "SELECT * FROM bags WHERE item_status='available'";
                                    $available_result = mysqli_query($con,$available_query);
                                    if (!$available_result) {
                                        die("Query Failed." . mysqli_error($available_result));
                                    }
                                    $available_post_count=mysqli_num_rows($available_result);

                                    $unavailable_query = "SELECT * FROM bags WHERE item_status='unavailable'";
                                    $unavailable_result = mysqli_query($con,$unavailable_query);
                                    $unavailable_post_count = mysqli_num_rows($unavailable_result);


                                    $total_post_count = $available_post_count + $unavailable_post_count;
                                    echo "<div class='huge'>$total_post_count</div>";
                                ?>  
							</div>
							<div class="text-muted"><a href="post.php">New Posts</a></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-orange panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large">
								<?php 
                                    $query = "SELECT * FROM orders";
                                    $result = mysqli_query($con,$query);
                                    $order_count = mysqli_num_rows($result);
                                    echo "<div class='huge'>$order_count</div>";
                                ?>
							</div>
							<div class="text-muted"><a href="order.php">New Orders</a></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-teal panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked female-user"><use xlink:href="#stroked-female-user"></use></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large">
								<?php 
                                    $admin_query = "SELECT * FROM users";
                                    $admin_result = mysqli_query($con,$admin_query);
                                    $user_count = mysqli_num_rows($admin_result);
                                    echo "<div class='huge'>$user_count</div>";
                                ?>
							</div>
							<div class="text-muted"><a href="users.php">Customers</a></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-red panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked app-window-with-content"><use xlink:href="#stroked-app-window-with-content"></use></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large">
								<?php 
                                    $query = "SELECT * FROM sub_categories";
                                    $result = mysqli_query($con,$query);
                                    $category_count = mysqli_num_rows($result);
                                    echo "<div class='huge'>$category_count</div>";
                                ?>
							</div>
							<div class="text-muted"><a href="add_categories.php">Categories</a></div>
						</div>
					</div>
				</div>
			</div>
</div><!--/.row-->

		<hr>	
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Bag", "Something", { role: "style" } ],
        ["Available Posts", <?php echo $available_post_count; ?>, "#3498db"],
        ["Unavailable Posts", <?php echo $unavailable_post_count; ?>, "#3498db"],
        ["Orders", <?php echo $order_count ?>, "#e67e22"],
        ["Admin", <?php echo $admin_user_count ?>, "#1abc9c"],
        ["Customers", <?php echo $customer_user_count ?>, "#1abc9c"],
        ["Categories", <?php echo $category_count ?>, "#e74c3c"],
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Chart For Order System",
        width: 1000,
        height: 500,
        bar: {groupWidth: "50%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
  }
  </script>
<div id="columnchart_values" style="width: 900px; height: 300px;"></div>

<?php include_once 'include_admin/footer.php' ?>