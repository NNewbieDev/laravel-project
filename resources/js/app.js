import './bootstrap';
import '../css/app.css';

const account = document.querySelector('.account-icon');
const dropdown = document.querySelector('.dropdown');
account.addEventListener('click', function (e) {
    dropdown.classList.toggle('active');
})

const filter = document.querySelector('.filter-icon');
const filterBlock = document.querySelector('.filter-block');
filter.addEventListener('click', function (e) {
    filterBlock.classList.toggle('active');
});

const likes = document.querySelectorAll('.like');
for (const like of likes) {
    like.addEventListener('click', function (e) {
        like.classList.toggle('pick');
    });
};


