//это функция для скролла ВВЕРХ

window.onload = function() {

    var scrolled;
    var timer;
    var allHeight = document.body.scrollHeight;
    var upButton = document.getElementById('buttonUp');

    document.onscroll = function() {
        if (window.pageYOffset > allHeight / 5) {
            upButton.style.display = "block";
        } else {
            upButton.style.display = "none";
        }
    }

    upButton.onclick = function() {
        scrolled = window.pageYOffset;
        scrollToTop();
    }

    function scrollToTop() {
        if (scrolled > 50) {
            window.scrollTo(0, scrolled);
            scrolled = scrolled - 100;
            timer = setTimeout(scrollToTop, 30);
        } else {
            clearTimeout(timer);
            window.scrollTo(0, 0);
        }
    }
}