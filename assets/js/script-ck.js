+function($){"use strict";function t(){var t=document.createElement("bootstrap"),e={WebkitTransition:"webkitTransitionEnd",MozTransition:"transitionend",OTransition:"oTransitionEnd otransitionend",transition:"transitionend"};for(var n in e)if(void 0!==t.style[n])return{end:e[n]};return!1}$.fn.emulateTransitionEnd=function(t){var e=!1,n=this;$(this).one("bsTransitionEnd",function(){e=!0});var i=function(){e||$(n).trigger($.support.transition.end)};return setTimeout(i,t),this},$(function(){$.support.transition=t(),$.support.transition&&($.event.special.bsTransitionEnd={bindType:$.support.transition.end,delegateType:$.support.transition.end,handle:function(t){return $(t.target).is(this)?t.handleObj.handler.apply(this,arguments):void 0}})})}(jQuery),+function($){"use strict";function t(t){return this.each(function(){var n=$(this),i=n.data("bs.carousel"),s=$.extend({},e.DEFAULTS,n.data(),"object"==typeof t&&t),a="string"==typeof t?t:s.slide;i||n.data("bs.carousel",i=new e(this,s)),"number"==typeof t?i.to(t):a?i[a]():s.interval&&i.pause().cycle()})}var e=function(t,e){this.$element=$(t),this.$indicators=this.$element.find(".carousel-indicators"),this.options=e,this.paused=null,this.sliding=null,this.interval=null,this.$active=null,this.$items=null,this.options.keyboard&&this.$element.on("keydown.bs.carousel",$.proxy(this.keydown,this)),"hover"==this.options.pause&&!("ontouchstart"in document.documentElement)&&this.$element.on("mouseenter.bs.carousel",$.proxy(this.pause,this)).on("mouseleave.bs.carousel",$.proxy(this.cycle,this))};e.VERSION="3.3.7",e.TRANSITION_DURATION=600,e.DEFAULTS={interval:5e3,pause:"hover",wrap:!0,keyboard:!0},e.prototype.keydown=function(t){if(!/input|textarea/i.test(t.target.tagName)){switch(t.which){case 37:this.prev();break;case 39:this.next();break;default:return}t.preventDefault()}},e.prototype.cycle=function(t){return t||(this.paused=!1),this.interval&&clearInterval(this.interval),this.options.interval&&!this.paused&&(this.interval=setInterval($.proxy(this.next,this),this.options.interval)),this},e.prototype.getItemIndex=function(t){return this.$items=t.parent().children(".item"),this.$items.index(t||this.$active)},e.prototype.getItemForDirection=function(t,e){var n=this.getItemIndex(e),i="prev"==t&&0===n||"next"==t&&n==this.$items.length-1;if(i&&!this.options.wrap)return e;var s="prev"==t?-1:1,a=(n+s)%this.$items.length;return this.$items.eq(a)},e.prototype.to=function(t){var e=this,n=this.getItemIndex(this.$active=this.$element.find(".item.active"));return t>this.$items.length-1||0>t?void 0:this.sliding?this.$element.one("slid.bs.carousel",function(){e.to(t)}):n==t?this.pause().cycle():this.slide(t>n?"next":"prev",this.$items.eq(t))},e.prototype.pause=function(t){return t||(this.paused=!0),this.$element.find(".next, .prev").length&&$.support.transition&&(this.$element.trigger($.support.transition.end),this.cycle(!0)),this.interval=clearInterval(this.interval),this},e.prototype.next=function(){return this.sliding?void 0:this.slide("next")},e.prototype.prev=function(){return this.sliding?void 0:this.slide("prev")},e.prototype.slide=function(t,n){var i=this.$element.find(".item.active"),s=n||this.getItemForDirection(t,i),a=this.interval,o="next"==t?"left":"right",r=this;if(s.hasClass("active"))return this.sliding=!1;var l=s[0],d=$.Event("slide.bs.carousel",{relatedTarget:l,direction:o});if(this.$element.trigger(d),!d.isDefaultPrevented()){if(this.sliding=!0,a&&this.pause(),this.$indicators.length){this.$indicators.find(".active").removeClass("active");var c=$(this.$indicators.children()[this.getItemIndex(s)]);c&&c.addClass("active")}var h=$.Event("slid.bs.carousel",{relatedTarget:l,direction:o});return $.support.transition&&this.$element.hasClass("slide")?(s.addClass(t),s[0].offsetWidth,i.addClass(o),s.addClass(o),i.one("bsTransitionEnd",function(){s.removeClass([t,o].join(" ")).addClass("active"),i.removeClass(["active",o].join(" ")),r.sliding=!1,setTimeout(function(){r.$element.trigger(h)},0)}).emulateTransitionEnd(e.TRANSITION_DURATION)):(i.removeClass("active"),s.addClass("active"),this.sliding=!1,this.$element.trigger(h)),a&&this.cycle(),this}};var n=$.fn.carousel;$.fn.carousel=t,$.fn.carousel.Constructor=e,$.fn.carousel.noConflict=function(){return $.fn.carousel=n,this};var i=function(e){var n,i=$(this),s=$(i.attr("data-target")||(n=i.attr("href"))&&n.replace(/.*(?=#[^\s]+$)/,""));if(s.hasClass("carousel")){var a=$.extend({},s.data(),i.data()),o=i.attr("data-slide-to");o&&(a.interval=!1),t.call(s,a),o&&s.data("bs.carousel").to(o),e.preventDefault()}};$(document).on("click.bs.carousel.data-api","[data-slide]",i).on("click.bs.carousel.data-api","[data-slide-to]",i),$(window).on("load",function(){$('[data-ride="carousel"]').each(function(){var e=$(this);t.call(e,e.data())})})}(jQuery),+function($){"use strict";function t(t){var e,n=t.attr("data-target")||(e=t.attr("href"))&&e.replace(/.*(?=#[^\s]+$)/,"");return $(n)}function e(t){return this.each(function(){var e=$(this),i=e.data("bs.collapse"),s=$.extend({},n.DEFAULTS,e.data(),"object"==typeof t&&t);!i&&s.toggle&&/show|hide/.test(t)&&(s.toggle=!1),i||e.data("bs.collapse",i=new n(this,s)),"string"==typeof t&&i[t]()})}var n=function(t,e){this.$element=$(t),this.options=$.extend({},n.DEFAULTS,e),this.$trigger=$('[data-toggle="collapse"][href="#'+t.id+'"],[data-toggle="collapse"][data-target="#'+t.id+'"]'),this.transitioning=null,this.options.parent?this.$parent=this.getParent():this.addAriaAndCollapsedClass(this.$element,this.$trigger),this.options.toggle&&this.toggle()};n.VERSION="3.3.7",n.TRANSITION_DURATION=350,n.DEFAULTS={toggle:!0},n.prototype.dimension=function(){var t=this.$element.hasClass("width");return t?"width":"height"},n.prototype.show=function(){if(!this.transitioning&&!this.$element.hasClass("in")){var t,i=this.$parent&&this.$parent.children(".panel").children(".in, .collapsing");if(!(i&&i.length&&(t=i.data("bs.collapse"),t&&t.transitioning))){var s=$.Event("show.bs.collapse");if(this.$element.trigger(s),!s.isDefaultPrevented()){i&&i.length&&(e.call(i,"hide"),t||i.data("bs.collapse",null));var a=this.dimension();this.$element.removeClass("collapse").addClass("collapsing")[a](0).attr("aria-expanded",!0),this.$trigger.removeClass("collapsed").attr("aria-expanded",!0),this.transitioning=1;var o=function(){this.$element.removeClass("collapsing").addClass("collapse in")[a](""),this.transitioning=0,this.$element.trigger("shown.bs.collapse")};if(!$.support.transition)return o.call(this);var r=$.camelCase(["scroll",a].join("-"));this.$element.one("bsTransitionEnd",$.proxy(o,this)).emulateTransitionEnd(n.TRANSITION_DURATION)[a](this.$element[0][r])}}}},n.prototype.hide=function(){if(!this.transitioning&&this.$element.hasClass("in")){var t=$.Event("hide.bs.collapse");if(this.$element.trigger(t),!t.isDefaultPrevented()){var e=this.dimension();this.$element[e](this.$element[e]())[0].offsetHeight,this.$element.addClass("collapsing").removeClass("collapse in").attr("aria-expanded",!1),this.$trigger.addClass("collapsed").attr("aria-expanded",!1),this.transitioning=1;var i=function(){this.transitioning=0,this.$element.removeClass("collapsing").addClass("collapse").trigger("hidden.bs.collapse")};return $.support.transition?void this.$element[e](0).one("bsTransitionEnd",$.proxy(i,this)).emulateTransitionEnd(n.TRANSITION_DURATION):i.call(this)}}},n.prototype.toggle=function(){this[this.$element.hasClass("in")?"hide":"show"]()},n.prototype.getParent=function(){return $(this.options.parent).find('[data-toggle="collapse"][data-parent="'+this.options.parent+'"]').each($.proxy(function(e,n){var i=$(n);this.addAriaAndCollapsedClass(t(i),i)},this)).end()},n.prototype.addAriaAndCollapsedClass=function(t,e){var n=t.hasClass("in");t.attr("aria-expanded",n),e.toggleClass("collapsed",!n).attr("aria-expanded",n)};var i=$.fn.collapse;$.fn.collapse=e,$.fn.collapse.Constructor=n,$.fn.collapse.noConflict=function(){return $.fn.collapse=i,this},$(document).on("click.bs.collapse.data-api",'[data-toggle="collapse"]',function(n){var i=$(this);i.attr("data-target")||n.preventDefault();var s=t(i),a=s.data("bs.collapse"),o=a?"toggle":i.data();e.call(s,o)})}(jQuery),+function($){"use strict";function t(t){var e=t.attr("data-target");e||(e=t.attr("href"),e=e&&/#[A-Za-z]/.test(e)&&e.replace(/.*(?=#[^\s]*$)/,""));var n=e&&$(e);return n&&n.length?n:t.parent()}function e(e){e&&3===e.which||($(i).remove(),$(s).each(function(){var n=$(this),i=t(n),s={relatedTarget:this};i.hasClass("open")&&(e&&"click"==e.type&&/input|textarea/i.test(e.target.tagName)&&$.contains(i[0],e.target)||(i.trigger(e=$.Event("hide.bs.dropdown",s)),e.isDefaultPrevented()||(n.attr("aria-expanded","false"),i.removeClass("open").trigger($.Event("hidden.bs.dropdown",s)))))}))}function n(t){return this.each(function(){var e=$(this),n=e.data("bs.dropdown");n||e.data("bs.dropdown",n=new a(this)),"string"==typeof t&&n[t].call(e)})}var i=".dropdown-backdrop",s='[data-toggle="dropdown"]',a=function(t){$(t).on("click.bs.dropdown",this.toggle)};a.VERSION="3.3.7",a.prototype.toggle=function(n){var i=$(this);if(!i.is(".disabled, :disabled")){var s=t(i),a=s.hasClass("open");if(e(),!a){"ontouchstart"in document.documentElement&&!s.closest(".navbar-nav").length&&$(document.createElement("div")).addClass("dropdown-backdrop").insertAfter($(this)).on("click",e);var o={relatedTarget:this};if(s.trigger(n=$.Event("show.bs.dropdown",o)),n.isDefaultPrevented())return;i.trigger("focus").attr("aria-expanded","true"),s.toggleClass("open").trigger($.Event("shown.bs.dropdown",o))}return!1}},a.prototype.keydown=function(e){if(/(38|40|27|32)/.test(e.which)&&!/input|textarea/i.test(e.target.tagName)){var n=$(this);if(e.preventDefault(),e.stopPropagation(),!n.is(".disabled, :disabled")){var i=t(n),a=i.hasClass("open");if(!a&&27!=e.which||a&&27==e.which)return 27==e.which&&i.find(s).trigger("focus"),n.trigger("click");var o=" li:not(.disabled):visible a",r=i.find(".dropdown-menu"+o);if(r.length){var l=r.index(e.target);38==e.which&&l>0&&l--,40==e.which&&l<r.length-1&&l++,~l||(l=0),r.eq(l).trigger("focus")}}}};var o=$.fn.dropdown;$.fn.dropdown=n,$.fn.dropdown.Constructor=a,$.fn.dropdown.noConflict=function(){return $.fn.dropdown=o,this},$(document).on("click.bs.dropdown.data-api",e).on("click.bs.dropdown.data-api",".dropdown form",function(t){t.stopPropagation()}).on("click.bs.dropdown.data-api",s,a.prototype.toggle).on("keydown.bs.dropdown.data-api",s,a.prototype.keydown).on("keydown.bs.dropdown.data-api",".dropdown-menu",a.prototype.keydown)}(jQuery),function(){var t=navigator.userAgent.toLowerCase().indexOf("webkit")>-1,e=navigator.userAgent.toLowerCase().indexOf("opera")>-1,n=navigator.userAgent.toLowerCase().indexOf("msie")>-1;(t||e||n)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var t=location.hash.substring(1),e;/^[A-z0-9_-]+$/.test(t)&&(e=document.getElementById(t),e&&(/^(?:a|select|input|button|textarea)$/i.test(e.tagName)||(e.tabIndex=-1),e.focus()))},!1)}(),function(){var t=$(".navbar-default");$(window).scroll(function(){var e=$(window).scrollTop();e>=t.outerHeight(!0)+15?t.addClass("slideInDown navbar-fixed-top"):t.removeClass("slideInDown navbar-fixed-top")})}(),function(){$(window).scroll(function(){$(this).scrollTop()>300?$("#totop").fadeIn():$("#totop").fadeOut()}),$("#totop").click(function(){return $("body,html").animate({scrollTop:0},800),!1})}();