var selector = '.nav li';

$(selector).on('click', function(){
    $(selector).removeClass('active');
    $(this).addClass('active');
});
/*
$(document).ready(function () {
        $('ul.nav > li').click(function (e) {
            e.preventDefault();
            $('ul.nav > li').removeClass('active');
            $(this).addClass('active');
        });
    });
*/

// Shorthand for $( document ).ready()
$(function() {

    if ($('.showMore') !== null) {

        var showMoreItems = $('.showMoreTable').find('tr.tbody');
        var showMoreBtnNext = $('.showMoreBtn.next');
        var showMoreBtnPrev = $('.showMoreBtn.prev');
        
        var count = -1;
        var itemsPrSlide = 2
        var countAll = showMoreItems.length;
        var currentMax = Math.round((countAll / itemsPrSlide)  );

        showMoreItems.each(function(i, e){
            if (i < itemsPrSlide) {
                $(e).toggleClass('hidden')
                count++;
            }
        })
        if (count < countAll) {
            var current = 0

            showMoreBtnNext.on('click', function(){
                if (current < currentMax-1) {
                    current++
                    startCount = (current * itemsPrSlide ) - 1;
                    endCount = ((current + 1) * itemsPrSlide) -1;
                    showMoreItems.each(function(i, e){
                        if (i > startCount && i <= endCount){
                            $(e).removeClass('hidden')
                        } else {
                            $(e).addClass('hidden')
                        }
                    });
                }             
            })

            showMoreBtnPrev.on('click', function(){
                if (current > 0) {
                    current--
                    startCount = (current * itemsPrSlide ) - 1;
                    endCount = ((current + 1) * itemsPrSlide) -1;
                    showMoreItems.each(function(i, e){
                        if (i > startCount && i <= endCount){
                            $(e).removeClass('hidden')
                        } else {
                            $(e).addClass('hidden')
                        }
                    });  
                    console.log("prev");
                }
            });
        }
    }

});




