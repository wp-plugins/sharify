jQuery(document).ready(function($) {
    $('.sharify-remove-trans').click(function(){
        var clickBtnValue = $(this).val();
        var ajaxurl = 'sharify_cache.php',
        data =  {'action': clickBtnValue};
        $.post(ajaxurl, data, function (response) {
        	location.reload();
        });
    });

});