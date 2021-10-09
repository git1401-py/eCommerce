require("../bootstrap");
// window.$ = window.jQuery = require("jQuery");
require("bootstrap/dist/js/bootstrap.bundle");
require("sweetalert");


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
