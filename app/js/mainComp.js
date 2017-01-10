/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

 function toggleFullScreen(elem) { 
            if ((document.fullScreenElement !== undefined && document.fullScreenElement === null) || (document.msFullscreenElement !== undefined && document.msFullscreenElement === null) || (document.mozFullScreen !== undefined && !document.mozFullScreen) || (document.webkitIsFullScreen !== undefined && !document.webkitIsFullScreen)) {
              if (elem.requestFullScreen) {
                elem.requestFullScreen();
              } else if (elem.mozRequestFullScreen) {
                elem.mozRequestFullScreen();
              } else if (elem.webkitRequestFullScreen) {
                elem.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
              } else if (elem.msRequestFullscreen) {
                elem.msRequestFullscreen();
              }
            } else {
              if (document.cancelFullScreen) {
                document.cancelFullScreen();
              } else if (document.mozCancelFullScreen) {
                document.mozCancelFullScreen();
              } else if (document.webkitCancelFullScreen) {
                document.webkitCancelFullScreen();
              } else if (document.msExitFullscreen) {
                document.msExitFullscreen();
              }
            }
          }

$(document).ready(function(e) {
            
            
        document.body.style.overflow = 'hidden';
        
        var start = new Date;

        setInterval(function() { 
            var minute = start.getMinutes();
            var hour = start.getHours();
            if (minute < 10)
                minute = "0"+minute;
            var hora = hour +":"+minute;
            $('.Timer').text(hora);
            start = new Date;
        }, 1000);

        $(".ideaboxNews").ideaboxNews({
		/*	maxwidth		:'400px',
			position		:'leftfixed',
			openspeed		:'fast'*/
		
			maxwidth		:'30%',
			newscount		:6,
			position		:'leftfixed',
			openspeed		:'fast',
			headercolor		:'#FFFFFF',
			headerbgcolor           :'rgba(74, 38, 106, 0.75)',
		//	feedimage		:'img/in-rss-image.jpg',
			feedimage		:'',
			feedcount		:4,
			feed			:'http://www.clarin.com/rss/lo-ultimo/,http://www.nacion.com/rss/latest/?contentType=NWS',
			feedlabels		:'Noticias ALAS',
			feedlink		:'self', //or target
			feedupdatetimer	:60000  //60000 ms = 1 Sec
		});
		
		$('#example5').ideaboxWeather({
			/* lang		:"sp",
			themecolor	:"#098da1",
			location	:"Tandil",
			daycount	:5,
			metric		:'C',
			days		:["Domingo", "Lunes", "Martes", "Mi�rcoles", "Jueves", "Viernes", "S�bado"],
			dayssmall	:["Do", "Lo", "Ma", "Mi", "Ju", "Vi", "Sa"],
			todaytext	:'Hoy', */
			template	:"horizontal",
			lang		:"sp",
			themecolor	:"#098da1",
			location	:"Tandil",
			daycount	:6,
			days		:["Domingo", "Lunes", "Martes", "Mi�rcoles", "Jueves", "Viernes", "S�bado"],
			dayssmall	:["Dom", "Lu", "Mar", "Mi", "Ju", "Vi", "Sáb"],
			metric		:'C',
			imgpath		:"img/",
			radius		:false
		});
                
       
    });
    