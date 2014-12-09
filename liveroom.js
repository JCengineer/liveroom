//if the window has been scrolled down a bit, hide the header
		var toggleHeaderHeight = function(clicked){
			if ($('header').css('overflow') != 'hidden'){
				$('header').css('overflow','hidden');
				$('header').finish().animate({height:80},500);
				
			} else {
				$('header').css('overflow','');
				$('header').finish().animate({height:300},500);
			}
		};
		//do it per scroll, but only once
		$(window).bind('scroll',function(e){ 
			if ( $(window).scrollTop() > 20 ) {
				toggleHeaderHeight();
				$(window).unbind('scroll');
			}
		});
		$('header').click(function(e){ toggleHeaderHeight(true); });

		//"collapse" all songs except one
		$.each($('.song'),function(i,el){if (i!=0) $(el).addClass('collapsed');});
		$('.songs').on('click','.collapsed',function(){
			$(this).removeClass('collapsed').siblings().addClass('collapsed');
		});

		//expand profiles of productionDetails
		$('#productionDetails button').click(function(){
			if (!$(this).hasClass('active')){
				$(this).addClass('active');
				$('#productionDetails div.'+$(this).attr('id')).removeClass('hidden').siblings('div').addClass('hidden');
			} else {
				$('#productionDetails div').addClass('hidden');
				$(this).removeClass('active');
			}
		});

		//edit tags!
		$(document).on('click','.tag',function(){
			//jQuery object variables
			var $element = $(this),
					$parentSong = $(".song").has($element),
					$matchingMetaArea = $parentSong.find('.songMeta'),
					$songMessages = $matchingMetaArea.find('.songMessages'),
					$tagEditor = $matchingMetaArea.find('.tagEditor');

			$tagEditor.removeClass('hidden').siblings().addClass('hidden');
			$tagEditor.find('.nameInput').val($element.text());
			$tagEditor.find('.suggestedInput').prop('checked',$element.hasClass('suggestion'));
			$tagEditor.find('.approvedInput').prop('checked',$element.hasClass('approved'));
			$tagEditor.find('.queryInput').prop('checked',$element.hasClass('query'));
			$tagEditor.find('.newInput').prop('checked',$element.hasClass('new'));
			//confirm/cancel edit, also close
			$tagEditor.on('click','button',function(e){
				var btn = e.target;
				console.log( 'tag fn:', $(btn).hasClass('tagConfirm'), $(btn).hasClass('tagCancel') );

				if ($(btn).hasClass('tagConfirm')){

					$element.text( $tagEditor.find('.nameInput').val() );
					if ($tagEditor.find('.suggestedInput').prop('checked'))$element.addClass('suggestion');
					else $element.removeClass('suggestion');
					if ($tagEditor.find('.approvedInput').prop('checked'))$element.addClass('approved');
					else $element.removeClass('approved');
					if ($tagEditor.find('.queryInput').prop('checked'))$element.addClass('query');
					else $element.removeClass('query');
					if ($tagEditor.find('.newInput').prop('checked'))$element.addClass('new');
					else $element.removeClass('new');

				} else if ($(btn).hasClass('tagCancel')){
					//cancel logic
					//ie. do nothing :)
				}


				$songMessages.removeClass('hidden').siblings().addClass('hidden');
			});
		});

		//create tags!
		$(document).on('click','progress',function(event,ui){
			//jQuery object variables
			var $progress = $(event.target);
					$barTags = $progress.siblings(".tags").children();
			
			var left=10;
			$barTags.last().after('<span class="tag borderR10" style="left:'+left+'%">tag-to-be-added</span>');

			var $element = $progress.siblings(".tags").children().last(),//new search
					$parentSong = $(".song").has($element),
					$matchingMetaArea = $parentSong.find('.songMeta'),
					$songMessages = $matchingMetaArea.find('.songMessages'),
					$tagEditor = $matchingMetaArea.find('.tagEditor');

			$tagEditor.removeClass('hidden').siblings().addClass('hidden');
			$tagEditor.find('.nameInput').val('');
			$tagEditor.find('.nameInput').attr('placeholder','Describe the tag here!');
			$tagEditor.find('.suggestedInput').prop('checked',false );
			$tagEditor.find('.approvedInput').prop('checked',false );
			$tagEditor.find('.queryInput').prop('checked',false );
			$tagEditor.find('.newInput').prop('checked',true );
			//confirm/cancel edit, also close
			$tagEditor.on('click','button',function(e){
				var btn = e.target;

				if ($(btn).hasClass('tagConfirm')){
					$element.text( $tagEditor.find('.nameInput').val() );
					if ($tagEditor.find('.suggestedInput').prop('checked'))$element.addClass('suggestion');
					if ($tagEditor.find('.approvedInput').prop('checked'))$element.addClass('approved');
					if ($tagEditor.find('.queryInput').prop('checked'))$element.addClass('query');
					if ($tagEditor.find('.newInput').prop('checked'))$element.addClass('new');
				} else if ($(btn).hasClass('tagCancel')){
					//cancel logic => delete it again
					$element.remove();
				}


				$songMessages.removeClass('hidden').siblings().addClass('hidden');
			});
		});

		//audio player
		var $playingAudio,
			loopTracks='none';
		$('audio').on('timeupdate',function(event,ui){
			var $element = $(event.target),
				$songBars = $element.siblings('.songBar');

			var percentPlayed = $element[0].currentTime*100 / $element[0].duration;
			$songBars.find('progress').val( percentPlayed );
		});
		var playPause = function(audio, controls){
			var $element = $(controls),
				$playingAudio = $(audio);
			
			if ( $element.find('i').hasClass('fa-play') ) {//when adding other control elements to song, add btn purpose classes
				$playingAudio[0].play();
				$playingAudio.addClass('audioPlaying');
				//todojc
				//report track playing in playlist
				//add next/previous buttons
				$element.find('i').removeClass('fa-play').addClass('fa-pause');
			} else {
				$playingAudio[0].pause();
				$playingAudio.removeClass('audioPlaying');
				$element.find('i').addClass('fa-play').removeClass('fa-pause');
			}
		}

		var playOne = function(){
			var $element = $(this),
				$song = $('.song').has($element),
				$audio = $song.find('audio');

				playPause($audio[0],this);
		};

		var playList = function(){
			var $element = $(this),
				$audios = $('audio');

			if ($playingAudio == undefined ) { //no audio played yet
				playPause($audios[0], this);
			} else if ( $audios.find('.audioPlaying').length > 0 ){ //audio previously played
				playPause( $audios.find('.audioPlaying')[0], this );
			} else { //play from the start
				playPause($element[0], this);
			}

			$audios.bind('ended',function(){
				var iOfAudioElement = $.inArray($(this)[0],$audios); //$(this) should be equal to $playingAudio?
				if (loopTracks=='one'){
					$playingAudio[0].play();
				} else if (loopTracks=='all' || iOfAudioElement != $audios.length-1){//if not at end of playlist
					if ($audios[ iOfAudioElement + 1]) {
						$playingAudio = $($audios[ iOfAudioElement + 1 ]);
						$playingAudio[0].play();
						//open the relevant song.
						$('.song').has($playingAudio).removeClass('collapsed').siblings().addClass('collapsed');
					}
				} else {
					alert('playlist ended');
					$element.find('i').addClass('fa-play').removeClass('fa-pause');
				}
			});
		};
		$('audio').hide();
		$('.playSong').click(playOne);
		$('.playAllSongs').click(playList);