/**
 * Кликаем на кнопку - открывается окно с формой. Кнопка остаётся подсвеченной.
 * Если кликаем внутри окна или на кнопку открытия окна, то ничего не меняется.
 * Если кликаем в любое другое место, окно закрывается.
 * @param e
 */

function openForm(e) {
    const windowWithForm = document.querySelector(".windowWithForm"); //окно с формой
    const openFormButton = document.querySelector(".openFormButton"); // кнопка, которая открывает окно

    //проверяем, если эл-т на который кликнули является windowWithForm или его потомком, или openFormButton, то ничего не делаем
    if (windowWithForm.contains(e.target) || e.target === openFormButton) {

        if (e.target === openFormButton)  e.target.style.boxShadow = "rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px";

        windowWithForm.style.visibility = "visible";
        windowWithForm.style.opacity = "1";
        document.body.addEventListener("click", openForm);
    } else {
        document.querySelector(".openFormButton").style.boxShadow = "none";
        windowWithForm.style.opacity = "0";
        windowWithForm.style.visibility = "hidden";
        //скрыли форму, убрали обработчик с body
        document.body.removeEventListener("click", openForm);
    }
}

document.querySelector(".openFormButton").addEventListener("click", openForm);