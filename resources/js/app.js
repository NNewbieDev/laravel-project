import './bootstrap';
import '../css/app.css';

const account = document.querySelector('.account-icon');
const dropdown = document.querySelector('.dropdown');
account.addEventListener('click', function (e) {
    dropdown.classList.toggle('active');
})

const selectNav = document.querySelector('#filter');
selectNav.addEventListener('load', function (e) {
    if (e.target.value === window.location.pathname) {
        e.target = selece;
    }
});

selectNav.addEventListener('change', function (e) {
    e.preventDefault();
    window.location = e.target.value;
});
