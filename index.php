<?php 
	include 'php/models/user.php';
	include 'php/controller.php';

	$demo=true;
	$activating=false;
	//if session has user logged in

	$user;
	$userOptions = '';
	//if the user is logged in
	if ( $user = loggedIn() ){
		$demo=false;
	//if this request is to log in
	} else if ( isLoggingIn() ){
		$user = $d;
		if ($user){
			exit( $userOptions = getUserOptions($user) );
		}
	//if this request is to register a new account
	} else if ( isRegistering() ){
		exit( register() );
	} else if ( isActivating() ){
		$activating = getActivate();
	} else if ( isActivated() ){
		exit( postActivate() );
	}



?>
<head>
	<meta charset="utf-8">
	<title>James Clifford - Freelance Engineer &amp; Developer</title>
	
	<link href='http://fonts.googleapis.com/css?family=Exo+2' rel='stylesheet' type='text/css'>
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	<link href='liveroom.css' rel='stylesheet' type='text/css'>
</head>
<body>
	<header>
		<div>
			<h1>Pre-production: The <span class="logo"></span></h1>
			<h2>GET YOURSELVES TOGETHER</h2>
			<h3>This is the place where you can create a better live show.<br>
				It's 2014 and we still can't sort out the disconnect<br>
				between band, sound and lighting.
			</h3>
			<h4>You can change that, here in the <span class="logo"></span>.<h4>
		</div>
	</header>

	<div id="user">
		<?php if ($activating===false){ ?>
			<span>
				<?php echo ($demo?"Log In / Register":$user['name']); ?>
				<br>
				<i class="fa fa-plus" style="margin-top:10px;"></i>
			</span>
			<div id="userDetails" class="borderR10 clearfix hidden">
				<div id="register">
					Register:<br>
					<input type="text" id="registerName" placeholder="Name"></input><br>
					<input type="text" id="registerEmail" placeholder="Email"></input><br>
					<b class="note">We'll send you an email to confirm the registration.</b><br>
					<button>Register</button>
				</div>
				<div id="login">
					Log In:<br>
					<input type="text" id="loginEmail" placeholder="Email"></input><br>
					<input type="text" id="loginPassword" placeholder="Password"></input><br>
					<a class="note"><b>Forgot your password? todo</b></a><br>
					<button>Log In</button>
				</div>
			</div>
		<?php } else echo '<div id="userDetails" class="borderR10 clearfix">'.$activating.'</div>'; ?>
	</div>
	

	<div id="content">


		<div id="productionDetails">
			<span>EVENT:</span>
			<span>LOCATION:</span>
			<span>TIME:</span>
			<button id="event" class="profile borderR10"><?php echo (!$demo?$event:"The Battle of the Bands"); ?></button>
			<button id="location" class="profile borderR10"><?php echo (!$demo?$location:"Andorra,Dublin"); ?></button>
			<button id="date" class="profile borderR10"><?php echo (!$demo?$date:"27th November"); ?></button>
			<div class="hidden event"><?php echo (!$demo?$eventProfile:"This is the event profile:<br><br>yada yada...<br>maybe even a pic? website?"); ?></div>
			<div class="hidden location"><?php echo (!$demo?$locationProfile:"This is the location profile:<br><br>yada yada...<br>maybe even a map? website?"); ?></div>
			<div class="hidden date"><?php echo (!$demo?$dateProfile:"This is the date profile:<br><br>yada yada...<br>maybe even a calendar?"); ?></div>
			<span>BAND:</span>
			<span>SOUND:</span>
			<span>LIGHTING:</span>
			<button id="band" class="profile borderR10"><?php echo (!$demo?$band:"The JC band"); ?></button>
			<button id="sound" class="profile borderR10"><?php echo (!$demo?$sound:"JC audio services"); ?></button>
			<button id="lighting" class="profile borderR10"><?php echo (!$demo?$lighting:"JC lighting services"); ?></button>
			<div class="hidden band"><?php echo (!$demo?$bandProfile:"This is the band profile:<br><br>yada yada...<br>maybe even a website? tech spec? image?"); ?></div>
			<div class="hidden sound"><?php echo (!$demo?$soundProfile:"This is the sound engineer profile:<br><br>yada yada...<br>maybe even a website? talent portfolio?"); ?></div>
			<div class="hidden lighting"><?php echo (!$demo?$lightingProfile:"This is the lighting designer profile:<br><br>yada yada...<br>maybe even a website? talent portfolio?"); ?></div>
		</div>

		

		<div class="songs">
			<h3 class="playAllSongs">Set List:&nbsp;&nbsp;&nbsp;<i class="borderR10 fa fa-play"> all</i></h3>
			<?php 
				if ($demo) { include('php/demo_songs.php'); }
				else {
					foreach ($songs as $id => $song) { 
			?>
						<div class="song borderR25 clearfix">
							<h3 class="playSong">
								<?php echo $song['band']." - ".$song['name']; ?>
								<i class="fa fa-play"></i>
							</h3>
							<div class="songBars">
								<audio src="media/songs/<?php echo $song[location]; ?>" type="audio/mpeg" controls="false">
									Your browser does not support the audio element.
								</audio>
								<div class="songBar band">
									<progress value="30" max="100"></progress>
									<label>band</label>
									<div class="tags">
										<?php echo $song['bandTags']; ?>
									</div>
								</div>
								<div class="songBar sound">
									<progress value="30" max="100"></progress>
									<label>sound</label>
									<div class="tags">
										<?php echo $song['soundTags']; ?>
									</div>
								</div>
								<div class="songBar lighting">
									<progress value="30" max="100"></progress>
									<label>lighting</label>
									<div class="tags">
										<?php echo $song['lightingTags']; ?>
									</div>
								</div>
							</div>
							<div class="songMeta borderR25">
								<div class="songMessages">
									<h4><u>Messages:</u></h4>
									<?php echo $song['messages']; ?>
								</div>
								<div class="tagEditor hidden">
									<h4><u>Tag editor:</u></h4>
									<span>name:</span><input type="text" class="nameInput"></input><br>
									<span>suggested: </span><input type="checkbox" class="suggestedInput"></input><br>
									<span>approved: </span><input type="checkbox" class="approvedInput"></input><br>
									<span>query: </span><input type="checkbox" class="queryInput"></input><br>
									<span>new: </span><input type="checkbox" class="newInput"></input><br>
									<br><br>
									<button class="tagConfirm">confirm</button>
									<button class="tagCancel">cancel</button>
								</div>
							</div>
						</div>
					<!--end song-->
			<?php 	}
				}
			?>
		</div>
	</div>

	<footer>
		<div class="links">
			<a href="/"><h2>JClifford</h2></a>|
			<a href="../tour.php"><h3>Tour</h3></a>|
			<a href="../contact.php"><h3>Contact</h3></a>
			<a href="../contact.php"><h3>Terms, yada yada...</h3></a>

		</div>

		<!--todo media player here-->

		<div class="buttons">
			<!--<a href="https://twitter.com/jamescaudio" class="twitter-follow-button" data-show-count="false">Follow @jamescaudio</a>
			<br>
			<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
			<div class="fb-like" data-href="https://www.facebook.com/Visilit" data-layout="button" data-action="like" data-show-faces="true" data-share="true"></div>
			-->
			<a href="http://ie.linkedin.com/in/jcengineer" target="_blank">
	        	<img src="https://static.licdn.com/scds/common/u/img/webpromo/btn_myprofile_160x33.png" width="160" height="33" border="0" alt="View James Clifford's profile on LinkedIn">
	    	</a>
		</div>
	</footer>

	<!-- javascript -->
	<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	<script src="liveroom.js"></script>


	<?php if ($activating!==false){ ?>
		<script>
			$('#activateUserAccount').click(function(){
				$('#activateUserAccount').attr('disabled',true);
				var p=$('#passwordUserAccount').val(), 
					cP=$('#confirmPasswordUserAccount').val(),
					userId=$('#activateUserAccount').data('userid');
				//check userId
				if ( !userId ){
					$('#messageActivateUserAccount').html('Invalid user id.<br>Please try again.');
					$('#messageActivateUserAccount').css('color','red');
					$('#activateUserAccount').attr('disabled',false);
					return false;
				}
				//check password length
				if (p.length < 6){
					$('#messageActivateUserAccount').html('Please use a longer password.<br>Please try again.');
					$('#messageActivateUserAccount').css('color','red');
					$('#activateUserAccount').attr('disabled',false);
					return false;
				}
				//check confirm password is same as password fields
				if (p==cP){
					$.post('index.php', {activated:true,user:userId, p:p}).done(function(result){
						$('#messageActivateUserAccount').html(result);
						if (result == "Activated"){
							$('#messageActivateUserAccount').css('color','green');
						}
					}).error(function(result){
						$('#messageActivateUserAccount').html('Error: '+result.responseText+'<br>Please try again.');
						$('#messageActivateUserAccount').css('color','red');
						$('#activateUserAccount').attr('disabled',false);
					});
				} else {
					$('#messageActivateUserAccount').html('The passwords don\'t match.<br>Please try again.');
					$('#messageActivateUserAccount').css('color','red');
					$('#activateUserAccount').attr('disabled',false);
				}
			})
		</script>
	<?php } ?>


</body>