$("a").on("click",function(){
    $("html, body").animate({
        scrollTop: $($(this).attr('href')).offset().top-57
    },1000);
    if($(this).hasClass("chevron-down-o-veznikovi")){
        $(".chevron-down-o-veznikovi").css({opacity:0,transition: "1s"});
    }
});

$(document).on("scroll",function(){
    if($("input[type='hidden']").hasClass("jsonoff")){
        if($(window).scrollTop() > $(".o-veznikovi-h4").outerHeight() + $(".o-veznikovi-h4").offset().top - 200){
            $(".chevron-down-o-veznikovi").css({opacity:0,transition: "1s"});
        }
        else{
            $(".chevron-down-o-veznikovi").css({opacity:1,transition: "1s"});
        }
    }
});







$($(".tower-top")).ready(function(){
    //if (!/Edge\/\d./i.test(navigator.userAgent)){
        if($(".tower-top").hasClass("tower-top")){
            var i = 0;
            var veznikove = [1,2,3,4,3,2];
            setInterval(function(){
                if(i==6)
                    i=0;
                $(".tower-top").css({backgroundImage:"url('../img/tower-top-"+veznikove[i]+".png')"});
                i++;

            }, 175);
        }

    //}
});
