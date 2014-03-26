<html lang="en"><head>
    <meta charset="utf-8">
    <title>Template · Bootstrap</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 20px;
        padding-bottom: 40px;
      }

      /* Custom container */
      .container-narrow {
        margin: 0 auto;
        max-width: 700px;
      }
      .container-narrow > hr {
        margin: 30px 0;
      }

      /* Main marketing message and sign up button */
      .jumbotron {
        margin: 60px 0;
        text-align: center;
      }
      .jumbotron h1 {
        font-size: 72px;
        line-height: 1;
      }
      .jumbotron .btn {
        font-size: 21px;
        padding: 14px 24px;
      }

      /* Supporting marketing content */
      .marketing {
        margin: 60px 0;
      }
      .marketing p + h4 {
        margin-top: 28px;
      }
    </style>
    <link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="bootstrap/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="bootstrap/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="bootstrap/ico/apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="bootstrap/ico/apple-touch-icon-57-precomposed.png">
                                   <link rel="shortcut icon" href="bootstrap/ico/favicon.png">
  </head>

  <body>

    <div class="container-fluid">
		<div class="row-fluid">
      		<div class="masthead">
        		<ul class="nav nav-pills pull-right">
          			<li class="active"><a href="#">Home</a></li>
          			<li><a href="#">About</a></li>
          			<li><a href="#">Contact</a></li>
        		</ul>
       			<h3 class="muted">Test</h3>
      		</div>
			<hr>
			<div class="span3">
				<h4>Total shots for this user</h4>
          		<p>This user shots <span class="badge badge-important"><?php echo $totalshotByUser; ?></span> time(s).</p>
        	</div>
    		<div class="span5">

    		<? 
    			if(isset($submit)){
    				if($result[':hit']){
    					echo '<h3>You are ' . $ranking . '</h3>';
    				} else {
    					echo '<img src="http://4.bp.blogspot.com/-FMcYzUKJACs/TbFRVO74Q0I/AAAAAAAAAMU/z1W-wEuWchk/s1600/MissedTarget.jpg" />';
    				}
    				echo'<p style="width:100%;margin:15px 0px 0 150px;"><a name="downloadTheme" href="/test/mvc/index.php?selectUser=' . $result[':id_user'] . '" onclick="return true;" class="btn btn-primary"> Feel free to restart !!!</a></p>';
    			} else {
    		?>
				<form  class="form-signin" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
        			<h2 class="form-signin-heading">Ready ???</h2>
        			<fieldset>
    					<legend>User</legend>
    					<div class="control-group">
    						<div class="controls">
        						<select class="input-small" name="selectUser" id="selectUser" onchange="if (this.value) window.location.href='/test/mvc/index.php?selectUser=' + this.value">
  									<?php
  										foreach( $users as $user){
  											if(isset( $_GET['selectUser']) && $_GET['selectUser'] == $user->getId()){
  												echo '<option value='. $user->getId() . ' selected >' . $user->getName() . '</option>';
  											} else {
  												echo '<option value='. $user->getId() . '>' . $user->getName() . '</option>';
  											}
  										}
  									?>
								</select>
							</div>
						</div>
		 			</fieldset>

					<fieldset>
    					<legend>Howitzer Shell / Target</legend>
						<div class="control-group">
		 	 				<label class="control-label" for="selectHowitzerShell">Weight of the howitzer shell :</label>
		 	 				<div class="controls">
		 	 					<select class="input-small" name="selectHowitzerShell" id="selectHowitzerShell">
  									<?php
  										 $rand_key_howitzer = array_rand($listHowitzerShell, 1);
  										foreach( $listHowitzerShell as $item){
  											if($listHowitzerShell[$rand_key_howitzer]->getId() == $item->getId()) {
  												echo '<option value=' . $item->getId() .' selected >' . $item->getWeight() . '</option>';
  											} else {
  												echo '<option value=' . $item->getId() .'>' . $item->getWeight() . '</option>';
  											}
  										}
  									?>
								</select>
		 	 				</div>
		 				</div>
		 	
		 				<div class="control-group">
		 	 				<label class="control-label" for="selectDistanceTarget">Distance of the target :</label>
		 	 				<div class="controls">
		 	 					<select class="input-small" name="selectDistanceTarget" id="selectDistanceTarget">
		 	 					<?php
		 	 							$rand_key_distance = array_rand($listDistance, 1);
  										foreach( $listDistance as $item){
  											if($listDistance[$rand_key_distance]->getId() == $item->getId()) {
  												echo '<option value=' . $item->getId() .' selected >' . $item->getDistance() . '</option>';
  											} else {
  												echo '<option value=' . $item->getId() .'>' . $item->getDistance() . '</option>';
  											}
  										}
  									?>
  								</select>
		 	 				</div>
		 				</div>
		 	
		 				<div class="control-group">
		 	 				<label class="control-label" for="selectSizeTarget">Size of the target :</label>
		 	 				<div class="controls">
		 	 					<select class="input-small" name="selectSizeTarget" id="selectSizeTarget">
		 	 					<?php
		 	 							$rand_key_Size = array_rand($listSizeTarget, 1);
  										foreach( $listSizeTarget as $item){
  											if($listSizeTarget[$rand_key_Size]->getId() == $item->getId()) {
  												echo '<option value=' . $item->getId() .' selected >' . $item->getSize() . '</option>';
  											} else {
  												echo '<option value=' . $item->getId() .'>' . $item->getSize() . '</option>';
  											}
  										}
  									?>
  								</select>
		 	 				</div>
		 				</div>
		 			</fieldset>

					<fieldset>
    					<legend>Angle of Shot / Muzzle Speed</legend>
		 				<div class="control-group">
		 	 				<label class="control-label" for="selectAngleShot">Angle of the shot :</label>
		 	 				<div class="controls">
		 	 					<select class="input-small" name="selectAngleShot" id="selectAngleShot">
		 	 					<?php
  									foreach($listAngle as $item){
  											echo '<option value=' . $item->getId() .'>' . $item->getAngle() . '</option>';
  									}
  								?>
								</select>
		 	 				</div>
		 				</div>
		 	
		 				<div class="control-group">
		 	 				<label class="control-label" for="inputMuzzleSpeed">Muzzle Speed :</label>
		 	 				<div class="controls">
  								<select class="input-small" name="selectMuzzleSpeed" id="selectMuzzleSpeed">
		 	 					<?php
  									foreach($listSpeed as $item){
  										echo '<option value=' . $item->getId() . '>' . $item->getSpeed() . '</option>';
  									}
  								?>
  								</select>
		 	 				</div>
		 				</div>
		 			</fieldset>
		 			<input class="btn btn-large btn-primary" type="submit" name="submit" value="Fire">
        		
      		</form>
      		<?php } ?>
		</div>
		<div class="span3">
			<h4>Total shots for all users</h4>
          	<p>All users shot <span class="badge badge-warning"><? echo $totalshotAllUser; ?></span> time(s)</p>

          	<h4>Total Users</h4>
          	<p>There is <span class="badge badge-success"><?php echo $totalUsers; ?></span> User(s).</p>
		
			<h4>Average number of Shoots</h4>
          	<p><span class="badge badge-info"><?php echo $avgShotByUser; ?></span> shot(s) per user</p>

          	<h4>Top 5 most accurate users</h4>
          	<p>
          		<table class="table table-condensed">
              <thead>
              
                <tr>
                  <th>#</th>
                  <th>User</th>
                  <th>Shot Counts</th>
                  <th>AVG(close to target)</th>
                </tr>
              </thead>
              <tbody>
              <?php foreach($topFive as $k => $item){ ?>
                <tr>
                  <td><?php echo $k; ?></td>
                  <td><?php echo $item['name']; ?></td>
                  <td><?php echo $item['shots']; ?></td>
                  <td><?php echo $item['avg-closed-target']; ?></td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          	</p>
		</div>
  </div>

      <hr>

      <div class="footer">
        <p>© Company 2013</p>
      </div>

    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="bootstrap/js/jquery.js"></script>
    <script src="bootstrap/js/bootstrap-transition.js"></script>
    <script src="bootstrap/js/bootstrap-alert.js"></script>
    <script src="bootstrap/js/bootstrap-modal.js"></script>
    <script src="bootstrap/js/bootstrap-dropdown.js"></script>
    <script src="bootstrap/js/bootstrap-scrollspy.js"></script>
    <script src="bootstrap/js/bootstrap-tab.js"></script>
    <script src="bootstrap/js/bootstrap-tooltip.js"></script>
    <script src="bootstrap/js/bootstrap-popover.js"></script>
    <script src="bootstrap/js/bootstrap-button.js"></script>
    <script src="bootstrap/js/bootstrap-collapse.js"></script>
    <script src="bootstrap/js/bootstrap-carousel.js"></script>
    <script src="bootstrap/js/bootstrap-typeahead.js"></script>

  

</body></html>