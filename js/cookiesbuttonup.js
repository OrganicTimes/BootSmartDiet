//это для Cookies
window.onload = function() {
    if (navigator.cookieEnabled == true) {
        if (document.cookie == false) {
            document.cookie = "user=1; max-age=1*24*60*60";
            const cookies = document.getElementById("cookies");
            cookies.classList.add('activeModal');
            buttonCookies.addEventListener('click', function() {
                cookies.classList.remove('activeModal');
            });
            cookies.addEventListener('click', function() {
                cookies.classList.remove('activeModal');
            });
            //console.log(document.cookie);
        }
    } else {
        alert("В Вашем браузере отключены файлы Cookies. Если Вы сделалеи это намеренно - Вам решать. Если нет, то лучше их включить, тогда сайты, на которые Вы заходите смогут быстро Вас идентифицировать и не станут лишний раз беспокоить своими всплывающими окнами.");
    }

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