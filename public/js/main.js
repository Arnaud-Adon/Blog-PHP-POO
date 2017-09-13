
/********** Barre de progression ***********/


progressBar = {
    countElmt : 0,
    loadedElmt : 0,

    init : function(){
        var that = this;
        /*
        <div id="progress-bar-container">
                <div id="progress-bar"></div>
        </div>
        */

        //Contruction et ajout de progress bar
        var $progressBarContainer = $('<div/>').attr('id','progress-bar-container');
        $progressBarContainer.append($('<div/>').attr('id','progress-bar'));
        $progressBarContainer.appendTo($('body'));


        // Ajout container d'éléments
        this.countElmt = $('img').length;

        var $container = $('<div/>').attr('id','progress-bar-element');
        $container.appendTo($('body'));


        //Parcours des éléments à prendre en compte pour le chargement
        $('img').each(function(){
            $('<img/>')
            .attr('src',$(this).attr('src'))
            .on('load error',function(){
                that.loadedElmt++;
                that.updateProgressBar();
            })
            .appendTo($container)
        });
    },

    updateProgressBar : function(){
        $('#progress-bar').stop().animate({
            'width' : (progressBar.loadedElmt/progressBar.countElmt)*100 + '%'
        }, function(){
            if(progressBar.loadedElmt == progressBar.countElmt){
                setTimeout(function(){
                    $('#progress-bar-container').animate({
                        'top':'-8px'
                    },function(){
                        $('#progress-bar-container').remove();
                        $('#progress-bar-element').remove();

                    });
                }, 750);
            }
        });
    }};


progressBar.init();



$(document).ready(function(){
	$(window).scroll(function(){
		if($(window).scrollTop() > 0){
			$('.scrollTop_button').css('visibility','visible');
		}
		else{
			$('.scrollTop_button').css('visibility','hidden');
		}
	});

	$('.scrollTop_button').click(function(){
			$('html,body').animate(function(){$(this).scrollTop()},400);
		});
});


