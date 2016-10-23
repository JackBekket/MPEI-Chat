/**
 * Created on 10/15/2016.
 */
//$(document).ready(function {
    var interval = setInterval(function(){
        $.ajax({
            url: 'chat.php',
            success: function(data)
            {
                $('#ChatMainID').html(data);
            }
        });
    },1000);
//});
