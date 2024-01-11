// filtri per categorie in index
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

// filtri per categorie nelle dashboard
$(document).ready(function () {
    $(".filter-item").click(function(){
        const value = $(this).attr("data-filter");
        if (value == "tutto") {
            $(".post-box-lettore").show("1000");
        } else {
            $(".post-box-lettore")
                .not("." + value)
                .hide("1000");
            $(".post-box-lettore")
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

// Funzione per vedere in anteprima l'immagine
function updateImagePreview(url) {
    var imagePreview = document.getElementById('imagePreview');
    var linkImmagine = document.getElementById('immagine');

    if (url.trim() !== '') {
        imagePreview.src = url;
        imagePreview.style.display = 'block';
    } else {
        imagePreview.src = '';
        imagePreview.style.display = 'none';
    }
}

// Funzione per scrivere contemporaneamente il titolo dove necessario durante la creazione dell'articolo
function updateTitlePreview(value) {
    document.getElementById('previewTitle').innerText = value;
}

// Funzione per la modifica dell'articolo che permette di vedere subito l'immagine e il titolo precedentemente inseriti senza dover prima modificare i campi, avviando subito le funzioni
document.addEventListener("DOMContentLoaded", function () {
    // Recupera i valori iniziali
    var titoloInput = document.getElementById('titolo');
    var immagineInput = document.getElementById('immagine');

    // Chiama le funzioni di anteprima con i valori iniziali
    updateImagePreview(immagineInput.value);
    updateTitlePreview(titoloInput.value);
});