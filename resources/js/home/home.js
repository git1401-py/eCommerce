require("../bootstrap");
// window.$ = window.jQuery = require("jQuery");
require("bootstrap/dist/js/bootstrap.bundle");
require("bootstrap/js/dist/dropdown.js");
require("bootstrap/js/dist/collapse.js");
require("sweetalert");
require("./files/rating");
window.Swiper = require('swiper');

// require('./swiper-index-photos');


// var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
// var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
//   return new bootstrap.Tooltip(tooltipTriggerEl)
// })
/*--
    Menu Stick
    -----------------------------------*/
var header = $(".sticky-bar");
var win = $(window);
win.on("scroll", function () {
    var scroll = win.scrollTop();
    if (scroll < 200) {
        header.removeClass("stick");
    } else {
        header.addClass("stick");
    }
});

/*--
    Cart active
    -----------------------------------*/
if ($(".cart-wrap").length) {
    var $body = $("body"),
        $cartWrap = $(".cart-wrap"),
        $cartContent = $cartWrap.find(".shopping-cart-content");
    $cartWrap.on("click", ".icon-cart-active", function (e) {
        e.preventDefault();
        var $this = $(this);
        if (!$this.parent().hasClass("show")) {
            $this
                .siblings(".shopping-cart-content")
                .addClass("show")
                .parent()
                .addClass("show");
        } else {
            $this
                .siblings(".shopping-cart-content")
                .removeClass("show")
                .parent()
                .removeClass("show");
        }
    });
    /*Close When Click Close Button*/
    $cartWrap.on("click", ".cart-close", function (e) {
        e.preventDefault();
        var $this = $(this);
        $this
            .closest(".cart-wrap")
            .removeClass("show")
            .find(".shopping-cart-content")
            .removeClass("show");
    });
    /*Close When Click Outside*/
    $body.on("click", function (e) {
        var $target = e.target;
        if (
            !$($target).is(".cart-wrap") &&
            !$($target).parents().is(".cart-wrap") &&
            $cartWrap.hasClass("show")
        ) {
            $cartWrap.removeClass("show");
            $cartContent.removeClass("show");
        }
    });
}

/*--
    Setting active
    -----------------------------------*/

var $body2 = $("body"),
    $parloDropdown2 = $(".setting-wrap"),
    $parloDropdownMenu2 = $parloDropdown2.find(".setting-content");
$parloDropdown2.on("click", ".setting-active", function (e) {
    e.preventDefault();
    var $this = $(this);
    if (!$this.parent().hasClass("show")) {
        $this
            .siblings(".setting-content")
            .addClass("show")
            .slideDown()
            .parent()
            .addClass("show");
    } else {
        $this
            .siblings(".setting-content")
            .removeClass("show")
            .slideUp()
            .parent()
            .removeClass("show");
    }
});
/*Close When Click Outside*/
$body2.on("click", function (e) {
    var $target = e.target;
    if (
        !$($target).is(".setting-wrap") &&
        !$($target).parents().is(".setting-wrap") &&
        $parloDropdown2.hasClass("show")
    ) {
        $parloDropdown2.removeClass("show");
        $parloDropdownMenu2.removeClass("show").slideUp();
    }
});

/*====== Search active ======*/
function sidebarSearch() {
    var searchTrigger = $("a.search-active"),
        endTriggersearch = $("button.search-close"),
        container = $(".main-search-active");
    searchTrigger.on("click", function (e) {
        e.preventDefault();
        container.addClass("inside");
    });
    endTriggersearch.on("click", function () {
        container.removeClass("inside");
    });
}
sidebarSearch();

/*====== mobile off canvas active ======*/
var navbarTrigger = $(".mobile-aside-button"),
    endTrigger = $(".mobile-aside-close"),
    container = $(".mobile-off-canvas-active"),
    wrapper = $(".wrapper");
// wrapper.prepend('<div class="body-overlay"></div>');
navbarTrigger.on("click", function (e) {
    e.preventDefault();
    container.addClass("inside");
    wrapper.addClass("overlay-active");
});
endTrigger.on("click", function () {
    container.removeClass("inside");
    wrapper.removeClass("overlay-active");
});
$(".body-overlay").on("click", function () {
    container.removeClass("inside");
    wrapper.removeClass("overlay-active");
});

/*--- language currency active ----*/
$(".mobile-language-active").on("click", function (e) {
    e.preventDefault();
    $(".lang-dropdown-active").slideToggle(900);
});
$(".mobile-currency-active").on("click", function (e) {
    e.preventDefault();
    $(".curr-dropdown-active").slideToggle(900);
});
$(".mobile-account-active").on("click", function (e) {
    e.preventDefault();
    $(".account-dropdown-active").slideToggle(900);
});

/*---------------------
        mobile-menu
    --------------------- */
var $offCanvasNav = $(".mobile-menu"),
    $offCanvasNavSubMenu = $offCanvasNav.find(".dropdown");
/*Add Toggle Button With Off Canvas Sub Menu*/
$offCanvasNavSubMenu
    .parent()
    .prepend('<span class="menu-expand"><i></i></span>');
/*Close Off Canvas Sub Menu*/
$offCanvasNavSubMenu.slideUp();
/*Category Sub Menu Toggle*/
$offCanvasNav.on("click", "li a, li .menu-expand", function (e) {
    var $this = $(this);
    if (
        $this
            .parent()
            .attr("class")
            .match(/\b(menu-item-has-children|has-children|has-sub-menu)\b/) &&
        ($this.attr("href") === "#" || $this.hasClass("menu-expand"))
    ) {
        e.preventDefault();
        if ($this.siblings("ul:visible").length) {
            $this.parent("li").removeClass("active");
            $this.siblings("ul").slideUp();
        } else {
            $this.parent("li").addClass("active");
            $this
                .closest("li")
                .siblings("li")
                .removeClass("active")
                .find("li")
                .removeClass("active");
            $this.closest("li").siblings("li").find("ul:visible").slideUp();
            $this.siblings("ul").slideDown();
        }
    }
});

var $tabNav = $(".nav-item");
$activingTab = $tabNav.find(".nav-link");
$activingTab.on("click", function (e) {
    var $this = $(this);
    e.preventDefault();

    $hideContantTab = $(".container-tab").find(".show");
    $showContantTab = $(".container-tab").find(""+$this.attr("href"));
    $hideContantTab.removeClass("show");
    $showContantTab.addClass("show");

    $activedTab = $tabNav.find(".active");
    $activedTab.removeClass("active");
    $this.addClass("active");
});


    window.number_format = function (number, decimals, dec_point, thousands_point) {

        if (number == null || !isFinite(number)) {
            throw new TypeError("number is not valid");
        }

        if (!decimals) {
            var len = number.toString().split('.').length;
            decimals = len > 1 ? len : 0;
        }

        if (!dec_point) {
            dec_point = '.';
        }

        if (!thousands_point) {
            thousands_point = ',';
        }

        number = parseFloat(number).toFixed(decimals);

        number = number.replace(".", dec_point);

        var splitNum = number.split(dec_point);
        splitNum[0] = splitNum[0].replace(/\B(?=(\d{3})+(?!\d))/g, thousands_point);
        number = splitNum.join(dec_point);

        return number;
    }

    window.toPersianNum = function (num, dontTrim) {

        var i = 0,

            dontTrim = dontTrim || false,

            num = dontTrim ? num.toString() : num.toString().trim(),
            len = num.length,

            res = '',
            pos,

            persianNumbers = typeof persianNumber == 'undefined' ?
                ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'] :
                persianNumbers;

        for (; i < len; i++)
            if ((pos = persianNumbers[num.charAt(i)]))
                res += pos;
            else
                res += num.charAt(i);

        return res;
    }

    var persian = { 0: '۰', 1: '۱', 2: '۲', 3: '۳', 4: '۴', 5: '۵', 6: '۶', 7: '۷', 8: '۸', 9: '۹' };
    function traverse(el) {
        if (el.nodeType == 3) {
            var list = el.data.match(/[0-9]/g);
            if (list != null && list.length != 0) {
                for (var i = 0; i < list.length; i++)
                    el.data = el.data.replace(list[i], persian[list[i]]);
            }
        }
        for (var i = 0; i < el.childNodes.length; i++) {
            traverse(el.childNodes[i]);
        }
    }
    var convert = traverse(document.body);
    function formatNumber(num) {
        return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
    }
    formatNumber(document.body)



/*-----------------------------------
        Scroll zoom
    -------------------------------------- */
// const ScrollReveal = require('scrollreveal')
// window.sr = ScrollReveal({
//     duration: 800,
//     reset: false
// });
// sr.reveal('.scroll-zoom');

/*--------------------------
        ScrollUp
    ---------------------------- */
// $.scrollUp({
//     scrollText: '<i class="sli sli-arrow-up"></i>',
//     easingType: "linear",
//     scrollSpeed: 900,
//     animation: "fade",
// });
