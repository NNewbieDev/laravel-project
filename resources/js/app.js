import './bootstrap';
import '../css/app.css';

const account = document.querySelector('.account-icon');
const dropdown = document.querySelector('.dropdown');
account.addEventListener('click', function (e) {
    dropdown.classList.toggle('active');
})