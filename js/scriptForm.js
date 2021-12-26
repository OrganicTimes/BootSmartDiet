//это функция для работы форм

window.onload = function() {
    let inputGender;
    let inputAge;
    let inputBlood;
    let inputTaste;
    let emailDiv = document.getElementById("allrecords1");
    let emailForm1 = document.forms.emailForm;
    let inputEmail;
    let myForm = document.forms.form384291799;
    let myFormDiv = document.getElementById("allrecords");
    const firstButton = document.getElementById("button");
    const notAllAnswers = document.getElementById("notAllAnswers");
    const buttonClosePopup = document.getElementById("buttonClosePopup");
    const buttonClosePopup2 = document.getElementById("buttonClosePopup2");
    const badEmail = document.getElementById("badEmail");
    const crossClose1 = document.getElementById("crossClose1");

    firstButton.addEventListener('click', function(e) {
        e.preventDefault();
        if ((document.getElementById('gridRadios1').checked == true || document.getElementById('gridRadios11').checked == true) &&
            (document.getElementById('gridRadios2').checked == true || document.getElementById('gridRadios22').checked == true) &&
            (document.getElementById('gridRadios3').checked == true || document.getElementById('gridRadios33').checked == true || document.getElementById('gridRadios333').checked == true || document.getElementById('gridRadios3333').checked == true) &&
            (document.getElementById('gridRadios4').checked == true || document.getElementById('gridRadios44').checked == true)) {
            inputGender = myForm.elements.gender.value;
            inputAge = myForm.elements.age.value;
            inputBlood = myForm.elements.blood.value;
            inputTaste = myForm.elements.taste.value;
            myFormDiv.style.display = "none";
            myForm.style.display = "none";
            emailDiv.style.display = "block";
            scrollToTop();
            document.getElementById("buttonSend").onclick = function(e) {
                // e.preventDefault();
                inputEmail = emailForm1.elements.emailinput.value;
                var regEx = new RegExp(/^[^@]+@[^@.]+\.[^@]+$/);
                if (inputEmail != null && inputEmail !== "" && regEx.test(inputEmail)) {
                    emailForm1.elements.genderHid.value = inputGender;
                    emailForm1.elements.ageHid.value = inputAge;
                    emailForm1.elements.bloodHid.value = inputBlood;
                    emailForm1.elements.tasteHid.value = inputTaste;
                } else {
                    e.preventDefault();
                    badEmail.classList.add('activeModal');
                    buttonClosePopup2.addEventListener('click', function() {
                        badEmail.classList.remove('activeModal');
                    });
                    const crossClose2 = document.getElementById("crossClose2");
                    crossClose2.addEventListener('click', function() {
                        badEmail.classList.remove('activeModal');
                    })
                    badEmail.addEventListener('click', function() {
                        badEmail.classList.remove('activeModal');
                    })
                }
            }
        } else {
            notAllAnswers.classList.add('activeModal');
            buttonClosePopup.addEventListener('click', function() {
                notAllAnswers.classList.remove('activeModal');
            });
            crossClose1.addEventListener('click', function() {
                notAllAnswers.classList.remove('activeModal');
            })
            notAllAnswers.addEventListener('click', function() {
                notAllAnswers.classList.remove('activeModal');
            })
        }
    });
}

function scrollToTop() {
    var scrolled;
    var timer;
    if (scrolled > 50) {
        window.scrollTo(0, scrolled);
        scrolled = scrolled - 10;
        timer = setTimeout(scrollToTop, 10);
    } else {
        clearTimeout(timer);
        window.scrollTo(0, 0);
    }
}