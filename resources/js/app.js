import './bootstrap';
// import '../css/app.css';
import '../sass/app.scss';

const modeUI = document.querySelector('.dark-ui');
const stateMode = document.querySelector(".state-mode");
const html = document.querySelector('html')
window.addEventListener('load', function () {
    if (localStorage.getItem('mode') == 'dark') {
        stateMode.classList.replace("fa-sun", "fa-moon");
        html.className = 'dark';
    }
    else {
        stateMode.classList.replace("fa-moon", "fa-sun");
        html.classList.remove("dark");
    }

})

modeUI.addEventListener('click', function (e) {
    if (localStorage.getItem("mode") == "dark") {
        localStorage.setItem('mode', 'light');
        stateMode.classList.replace("fa-moon", "fa-sun");
        html.classList.remove("dark");
    } else {
        localStorage.setItem('mode', 'dark');
        stateMode.classList.replace("fa-sun", "fa-moon");
        html.className = 'dark';
    }
})

