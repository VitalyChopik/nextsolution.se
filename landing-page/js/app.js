console.log('Working...')

jQuery(document).ready(function(s) {
  console.log("worked menu"),
  setTimeout(function() {
      var t = document.getElementById("menu-svg-container")
        , e = (Snap(t)
        , Snap.select("#menu-svg-right-start"))
        , t = Snap.select("#menu-svg-right-end")
        , n = e.node.getAttribute("d")
        , r = t.node.getAttribute("d")
        , a = Snap.select("#menu-svg-left-start")
        , t = Snap.select("#menu-svg-left-end")
        , i = a.node.getAttribute("d")
        , o = t.node.getAttribute("d");
      s(".header__btn-menu").on("click", function() {
          s("body").hasClass("menu-transition") || (s("body").addClass("menu-transition"),
          s("#menu-svg-container").fadeIn(),
          e.animate({
              d: r
          }, 1e3, mina.easeinout),
          a.animate({
              d: o
          }, 1e3, mina.easeinout),
          s("html").addClass("menu-lock"),
          setTimeout(function() {
              s(".burger-content").fadeIn()
          }, 500),
          setTimeout(function() {
              s("#menu-svg-container").attr("class", "menu-svg-line-visible"),
              s("body").removeClass("menu-transition")
          }, 1e3))
      }),
      s(".burger-content__btn-menu-cross").on("click", function() {
          s("body").hasClass("menu-transition") || (s("body").addClass("menu-transition"),
          s("html").removeClass("menu-lock"),
          s(".burger-content").fadeOut(),
          e.animate({
              d: n
          }, 1e3, mina.easeinout),
          a.animate({
              d: i
          }, 1e3, mina.easeinout),
          s("#menu-svg-container").attr("class", "menu-svg-line-hidden"),
          setTimeout(function() {
              s("#menu-svg-container").fadeOut(),
              s("body").removeClass("menu-transition")
          }, 1e3))
      })
  }, 1e3)
})
