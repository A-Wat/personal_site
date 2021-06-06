// inview targetsに.inviewを付与する処理
$(function(){
    // inview targets
    let inviewTargets = $('.inview_target');

    inviewTargets.on('inview', function(event, isInView) {
        if (isInView) {
            // element is now visible in the viewport
            $(this).addClass('inview');
        } else {
            // element has gone out of viewport
            $(this).removeClass('inview');
        }
    });
});