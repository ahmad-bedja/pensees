/* effacer alert success apres 5sec */
window.setTimeout(function() {
    $(".alert-success").slideUp(150, function(){ $(this).remove();});
}, 3000);