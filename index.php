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
			<h2>Get your shit together</h2>
			<h3>
				This is the place where you can create a better live show.<br>
				It's 2014 and we still can't sort out the disconnect<br>
				between band, sound and lighting.<br>
				Time to change.
			</h3>
			<h4>
				You don't even have to look at eachother<br>
				Don't worry!
			<h4>
		</div>
	</header>

	

	<div id="content">
		<div id="productionDetails">
			<span>EVENT:</span>
			<span>LOCATION:</span>
			<span>TIME:</span>
			<button id="event" class="profile borderR10">The Battle of the Bands</button>
			<button id="location" class="profile borderR10">Andorra,Dublin</button>
			<button id="date" class="profile borderR10">27th November</button>
			<div class="hidden event">This is the event profile:<br><br>yada yada...<br>maybe even a pic? website?</div>
			<div class="hidden location">This is the location profile:<br><br>yada yada...<br>maybe even a map? website?</div>
			<div class="hidden date">This is the date profile:<br><br>yada yada...<br>maybe even a calendar?</div>
			<span>BAND:</span>
			<span>SOUND:</span>
			<span>LIGHTING:</span>
			<button id="band" class="profile borderR10">The JC band</button>
			<button id="sound" class="profile borderR10">JC audio services</button>
			<button id="lighting" class="profile borderR10">JC lighting services</button>
			<div class="hidden band">This is the band profile:<br><br>yada yada...<br>maybe even a website? tech spec? image?</div>
			<div class="hidden sound">This is the sound engineer profile:<br><br>yada yada...<br>maybe even a website? talent portfolio?</div>
			<div class="hidden lighting">This is the lighting designer profile:<br><br>yada yada...<br>maybe even a website? talent portfolio?</div>
		</div>

		

		<div class="songs">
			<h3 class="playAllSongs">Set List:&nbsp;&nbsp;&nbsp;<i class="borderR10 fa fa-play"> all</i></h3>
			<!--song1-->
			<div class="song borderR25 clearfix">
				<h3 class="playSong">
					"Come Together"&nbsp;&nbsp;&nbsp;
					<i class="fa fa-play"></i>
				</h3>
				<div class="songBars">
					<audio src="media/Come Together.mp3" type="audio/mpeg" controls="false">
						Your browser does not support the audio element.
					</audio>
					<div class="songBar band">
						<progress value="30" max="100"></progress>
						<label>band</label>
						<div class="tags">
							<span class="tag borderR10" style="left:1%">build</span>
							<span class="tag borderR10" style="left:11%">verse</span>
							<span class="tag borderR10" style="left:17%">pre-chorus</span>
							<span class="tag borderR10" style="left:26%">chorus</span>
							<span class="tag borderR10" style="left:32%">verse</span>
							<span class="tag borderR10" style="left:40%">chorus</span>
							<span class="tag borderR10" style="left:50%">chorus</span>
							<span class="tag borderR10" style="left:57%">bass drop</span>
							<span class="tag borderR10" style="left:60%">breakdown</span>
							<span class="tag borderR10" style="left:70%">chorus</span>
							<span class="tag borderR10" style="left:80%">chorus</span>
							<span class="tag borderR10" style="left:90%">outro</span>
						</div>
					</div>
					<div class="songBar sound">
						<progress value="30" max="100"></progress>
						<label>sound</label>
						<div class="tags">
							<span class="tag borderR10 suggestion" style="left:1%">echo / thin intro</span>
							<span class="tag borderR10 suggestion" style="left:11%">full sound in verse</span>
							<span class="tag borderR10 suggestion" style="left:60%">drums up</span>
							<span class="tag borderR10 suggestion" style="left:90%">extra reverb/effect</span>
						</div>
					</div>
					<div class="songBar lighting">
						<progress value="30" max="100"></progress>
						<label>lighting</label>
						<div class="tags">
							<span class="tag borderR10 suggestion" style="left:1%">ambient opening</span>
							<span class="tag borderR10 suggestion" style="left:11%">still verse</span>
							<span class="tag borderR10 suggestion" style="left:80%">big moving lights</span>
							<span class="tag borderR10 suggestion" style="left:90%">moody</span>
							<span class="tag borderR10 suggestion" style="left:99%">blackout</span>
						</div>
					</div>
				</div>
				<div class="songMeta borderR25">
					<div class="songMessages">
						<h4><u>Messages:</u></h4>
						<span class="band">Hey guys, this is my song</span><br>
						<span class="band">I've added the tags for when there are changes</span><br>
						<span class="sound">Nice one, I've had a listen. Good sound!</span><br>
						<span class="band">Yeah? thanks!</span><br>
						<span class="band">Do you want me to add suggestions for sound cues? Might help you recreate what has worked for us before.</span><br>
						<span class="sound">Perfect yeah, I'll take that and work from there.</span><br>
						<span class="band">No problem.</span><br>
						<span class="lighting">Hey! Nice song. Have you lighting cues too?</span><br>
						<span class="band">Sure lx.</span><br>	
						<span class="band">Ok done. Suggestions are greyed out but you can "approve" to keep or edit them by clicking on them.</span><br>	
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
			<!--end song1-->
			<!--song 2-->
			<div class="song borderR25 clearfix">
				<h3 class="playSong">
					"The Stops"&nbsp;&nbsp;&nbsp;
					<i class="fa fa-play"></i>
				</h3>
				<div class="songBars">
					<audio src="media/The Stops.mp3" type="audio/mpeg" controls="false">
						Your browser does not support the audio element.
					</audio>
					<div class="songBar band">
						<progress value="30" max="100"></progress>
						<label>band</label>
						<div class="tags">
							<span class="tag borderR10" style="left:1%">build</span>
							<span class="tag borderR10" style="left:11%">verse</span>
							<span class="tag borderR10" style="left:17%">pre-chorus</span>
							<span class="tag borderR10" style="left:26%">chorus</span>
							<span class="tag borderR10" style="left:32%">verse</span>
							<span class="tag borderR10" style="left:40%">chorus</span>
							<span class="tag borderR10" style="left:50%">chorus</span>
							<span class="tag borderR10" style="left:57%">bass drop</span>
							<span class="tag borderR10" style="left:60%">breakdown</span>
							<span class="tag borderR10" style="left:70%">chorus</span>
							<span class="tag borderR10" style="left:80%">chorus</span>
							<span class="tag borderR10" style="left:90%">outro</span>
						</div>
					</div>
					<div class="songBar sound">
						<progress value="30" max="100"></progress>
						<label>sound</label>
						<div class="tags">
							<span class="tag borderR10 suggestion approved" style="left:1%">echo / thin intro</span>
							<span class="tag borderR10 suggestion approved" style="left:11%">full sound in verse</span>
							<span class="tag borderR10 new" style="left:32%">guitars back down in verse</span>
							<span class="tag borderR10 new" style="left:57%">mute group on vocal mics</span>
							<span class="tag borderR10 new" style="left:60%">no compressor on bass</span>
							<span class="tag borderR10 suggestion approved" style="left:63%">drums up</span>
							<span class="tag borderR10 suggestion approved" style="left:90%">extra reverb/effect</span>
						</div>
					</div>
					<div class="songBar lighting">
						<progress value="30" max="100"></progress>
						<label>lighting</label>
						<div class="tags">
							<span class="tag borderR10 suggestion approved" style="left:1%">ambient opening</span>
							<span class="tag borderR10 suggestion approved" style="left:11%">still verse</span>
							<span class="tag borderR10 suggestion approved" style="left:55%">blackout</span>
							<span class="tag borderR10 new" style="left:58%">strobe</span>
							<span class="tag borderR10 query" style="left:69%">focus on drums and bass</span>
							<span class="tag borderR10 suggestion approved" style="left:80%">big moving lights</span>
							<span class="tag borderR10 suggestion approved" style="left:90%">moody</span>
							<span class="tag borderR10 suggestion approved" style="left:99%">blackout</span>
						</div>
					</div>
				</div>
				<div class="songMeta borderR25">
					<div class="songMessages">
						<h4><u>Messages:</u></h4>
						<span class="band">OK guys, The next song...</span><br>
						<span class="band">but I've added the tags again for you to approve</span><br>
						<span class="sound">Nice one, I've had a look.</span><br>
						<span class="lighting">Ok</span><br>
						<span class="sound">Done there now</span><br>
						<span class="sound">and I've added some ("new" blue) ones for myself</span><br>
						<span class="band">Great, that good</span><br>
						<span class="lighting">Approved mine as well</span><br>
						<span class="lighting">but I've have a question for you</span><br>
						<span class="lighting">See where the red "query" tag is?</span><br>
						<span class="lighting">Are you looking for follow spots?</span><br>
						<span class="lighting">They're unfortunately out of action in this venue</span><br>
						<span class="lighting">I can try and focus some moving heads there instead?</span><br>
						<span class="band">We usually use follow spots but yeah,</span><br>	
						<span class="band">movers pointing to the drummer and bassist will do fine</span><br>	
						<span class="lighting">I've also added strobe to the bass drop, for fun</span><br>
						<span class="band">Awesome</span><br>
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
			<!--end song 2-->
			<!--song 3-->
			<div class="song borderR25 clearfix">
				<h3 class="playSong">
					"Come Together 2"&nbsp;&nbsp;&nbsp;
					<i class="fa fa-play"></i>
				</h3>
				<div class="songBars">
					<audio src="media/Come Together.mp3" type="audio/mpeg" controls="false">
						Your browser does not support the audio element.
					</audio>
					<div class="songBar band">
						<progress value="30" max="100"></progress>
						<label>band</label>
						<div class="tags">
							<span class="tag borderR10" style="left:1%">build</span>
							<span class="tag borderR10" style="left:11%">verse</span>
							<span class="tag borderR10" style="left:17%">pre-chorus</span>
							<span class="tag borderR10" style="left:26%">chorus</span>
							<span class="tag borderR10" style="left:32%">verse</span>
							<span class="tag borderR10" style="left:40%">chorus</span>
							<span class="tag borderR10" style="left:50%">chorus</span>
							<span class="tag borderR10" style="left:58%">bass drop</span>
							<span class="tag borderR10" style="left:60%">breakdown</span>
							<span class="tag borderR10" style="left:70%">chorus</span>
							<span class="tag borderR10" style="left:80%">chorus</span>
							<span class="tag borderR10" style="left:90%">outro</span>
						</div>
					</div>
					<div class="songBar sound">
						<progress value="30" max="100"></progress>
						<label>sound</label>
						<div class="tags">
							<span class="tag borderR10 suggestion" style="left:1%">echo / thin intro</span>
							<span class="tag borderR10 suggestion" style="left:11%">full sound in verse</span>
							<span class="tag borderR10 suggestion" style="left:60%">drums up</span>
							<span class="tag borderR10 suggestion" style="left:90%">extra reverb/effect</span>
						</div>
					</div>
					<div class="songBar lighting">
						<progress value="30" max="100"></progress>
						<label>lighting</label>
						<div class="tags">
							<span class="tag borderR10 suggestion" style="left:1%">ambient opening</span>
							<span class="tag borderR10 suggestion" style="left:11%">still verse</span>
							<span class="tag borderR10 suggestion" style="left:80%">big moving lights</span>
							<span class="tag borderR10 suggestion" style="left:90%">moody</span>
							<span class="tag borderR10 suggestion" style="left:99%">blackout</span>
						</div>
					</div>
				</div>
				<div class="songMeta borderR25">
					<div class="songMessages">
						<h4><u>Messages:</u></h4>
						<span class="band">Hey guys, this is my song</span><br>
						<span class="band">I've added the tags for when there are changes</span><br>
						<span class="sound">Nice one, I've had a listen. Good sound!</span><br>
						<span class="band">Yeah? thanks!</span><br>
						<span class="band">Do you want me to add suggestions for sound cues? Might help you recreate what has worked for us before.</span><br>
						<span class="sound">Perfect yeah, I'll take that and work from there.</span><br>
						<span class="band">No problem.</span><br>
						<span class="lighting">Hey! Nice song. Have you lighting cues too?</span><br>
						<span class="band">Sure lx.</span><br>	
						<span class="band">Ok done. Suggestions are greyed out but you can "approve" to keep or edit them by clicking on them.</span><br>	
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
			<!--end song 3-->
		</div>
	</div>

	<footer>
		<div class="links">
			<a href="/"><h2>JClifford</h2></a>|
			<a href="tour.php"><h3>Tour</h3></a>|
			<a href="contact.php"><h3>Contact</h3></a>
			<a href="contact.php"><h3>Terms, yada yada...</h3></a>

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
</body>