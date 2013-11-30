(function($){
    $.fn.tip = function(options) {
        var defaults = {
                keepAlive: false,
                maxWidth: "200px",
                edgeOffset: 3,
                defaultPosition: "bottom",
                delay: 400,
                fadeIn: 200,
                fadeOut: 200,
                attribute: "title",
                content: false,
                enter: function(){},
                exit: function(){}
            },

            opts = $.extend(defaults, options),

            tip_holder = null,

            tip_content = null,

            tip_arrow = null;

        if(document.getElementById('tip_holder')){
            tip_holder = $("#tip_holder");
            tip_content = $("#tip_content");
            tip_arrow = $("#tip_arrow");
        } else {
            tip_holder = $('<div id="tip_holder" style="max-width:'+ opts.maxWidth +';"></div>');
            tip_content = $('<div id="tip_content"></div>');
            tip_arrow = $('<div id="tip_arrow"></div>');
            $("body").append(tip_holder.html(tip_content).prepend(tip_arrow.html('<div id="tip_arrow_inner"></div>')).append('<div id="tip_border"></div>'));
        }

        return this.each(function(){

            var org_elem = $(this);

            if(org_elem.data("initype") == "tip") { return true; }

            org_elem.data("initype","tip");

            var org_title = null,

                timeout = null;

            if(opts.content){
                org_title = opts.content;
            } else {
                org_title = org_elem.attr(opts.attribute);
            }

            if(org_title != ""){
                if(!opts.content){
                    org_elem.removeAttr(opts.attribute); //remove original Attribute
                }

                var active = function(){
                    if(!org_title) {return false}
                    opts.enter.call(this);
                    tip_content.html(org_title);
                    tip_holder.hide().removeAttr("class").css("margin","0");
                    tip_arrow.removeAttr("style");
                     
                    var top = parseInt(org_elem.offset().top),
                        left = parseInt(org_elem.offset().left),
                        org_width = parseInt(org_elem.outerWidth()),
                        org_height = parseInt(org_elem.outerHeight()),
                        tip_w = tip_holder.outerWidth()+27,
                        tip_h = tip_holder.outerHeight(),
                        w_compare = Math.round((org_width - tip_w) / 2),
                        h_compare = Math.round((org_height - tip_h) / 2),
                        marg_left = Math.round(left + w_compare),
                        marg_top = Math.round(top + org_height + opts.edgeOffset),
                        t_class = "_"+opts.defaultPosition,
                        arrow_top = "",
                        arrow_left = Math.round(tip_w - 40) / 2,
                        right_compare = (w_compare + left) < parseInt($(window).scrollLeft()),
                        left_compare = (tip_w + left+org_width)+100 > parseInt($(window).width()),//向右多加100px的偏差防止箭头向左时出现尾部换行 by  goingta
                        top_compare = (top + org_height + opts.edgeOffset + tip_h + 8) > parseInt($(window).height() + $(window).scrollTop()),
                        bottom_compare =  ((top + org_height) - (opts.edgeOffset + tip_h + 8)) < 0;

                    if((right_compare && w_compare < 0) || (t_class == "_right" && !left_compare) || (t_class == "_left" && left < (tip_w + opts.edgeOffset + 15))){
                        t_class = "_right";
                        arrow_top = Math.round(tip_h - 13) / 2;
                        arrow_left = -12;
                        marg_left = Math.round(left + org_width + opts.edgeOffset);
                        marg_top = Math.round(top + h_compare);
                    } else if((left_compare ) || (t_class == "_left" && !right_compare)){
                        t_class = "_left";
                        arrow_top = Math.round(tip_h - 13) / 2;
                        arrow_left =  Math.round(tip_w);
                        marg_left = Math.round(left - (tip_w + opts.edgeOffset ));
                        marg_top = Math.round(top + h_compare);
                    }

                    if( (t_class == "_bottom" && top_compare) || (t_class == "_top" && !bottom_compare)){
                        if(t_class == "_top" || t_class == "_bottom"){
                            t_class = "_top";
                        }
                        arrow_top = tip_h;
                        marg_top = Math.round(top - (tip_h + 5 + opts.edgeOffset));
                    } else if( (t_class == "_top" && bottom_compare) || (t_class == "_bottom" && !top_compare)){
                        if(t_class == "_top" || t_class == "_bottom"){
                            t_class = "_bottom";
                        }
                        arrow_top = 0;//-12;                        
                        marg_top = Math.round(top + org_height + opts.edgeOffset);
                    }
                
                    if(t_class == "_right_top" || t_class == "_left_top"){
                        marg_top = marg_top + 5;
                    } else if(t_class == "_right_bottom" || t_class == "_left_bottom"){     
                        marg_top = marg_top - 5;
                    }
                    if(t_class == "_left_top" || t_class == "_left_bottom"){    
                        marg_left = marg_left + 5;
                    }
                    tip_arrow.css({"margin-left": arrow_left+"px", "margin-top": arrow_top-4+"px"});
                    tip_holder.css({"margin-left": marg_left+"px", "margin-top": marg_top-2+"px"}).attr("class","tip"+t_class);
 
                    if (timeout){ clearTimeout(timeout); }
                    timeout = setTimeout(function(){
                        tip_holder.stop(true,true).fadeIn(opts.fadeIn);
                    }, opts.delay);
                };
                
                var deactive = function(){
                    opts.exit.call(this);
                    if (timeout){ clearTimeout(timeout); }
                    tip_holder.fadeOut(opts.fadeOut);
                };

                org_elem.on("showTip",function(e,data){
                    if(data) {
                        org_title = data;
                    }
                    active();
                    $(window).on("resize",active);
                });

                org_elem.on("hideTip",function(e){
                    deactive();
                    $(window).off("resize",active);
                });
            }               
        });
    }
})(jQuery);