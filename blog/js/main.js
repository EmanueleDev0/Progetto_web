// filtri per categorie
$(document).ready(function () {
    $(".filter-item").click(function(){
        const value = $(this).attr("data-filter");
        if (value == "tutto") {
            $(".post-box").show("1000");
        } else {
            $(".post-box")
                .not("." + value)
                .hide("1000");
            $(".post-box")
                .filter("." + value)
                .show("1000");
        }
    });
    // background delle categorie una volta scelte
    $(".filter-item").click(function () {
        $(this).addClass("active-filter").siblings().removeClass("active-filter");
    });
});

// Header background cambia in base allo scorrimento
let header = document.querySelector("header")

window.addEventListener("scroll", () => {
    header.classList.toggle("shadow", window.scrollY > 0);
});