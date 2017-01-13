/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

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

      
       
    });
    