import './bootstrap';
import '../css/app.css';

const account = document.querySelector('.account-icon');
const dropdown = document.querySelector('.dropdown');
account.addEventListener('click', function (e) {
    dropdown.classList.toggle('active');
})


const likes = document.querySelectorAll('.like');
for (const like of likes) {
    like.addEventListener('click', function (e) {
        like.classList.toggle('pick');
    });
};

const warning = document.querySelector('.warning');
const closeWarning = document.querySelector('.close-icon');
const notLikes = document.querySelectorAll('.not-like');
const notComment = document.querySelectorAll('.not-comment');
for (const not of notLikes) {
    not.addEventListener('click', function (e) {
        warning.classList.add('active-flex');
    });
};
for (const not of notComment) {
    not.addEventListener('click', function (e) {
        warning.classList.add('active-flex');
    });
};

closeWarning.addEventListener('click', function (e) {
    warning.classList.remove('active-flex');
});

const comment = document.querySelector('.comment');
const showComment = document.querySelector('.comment-input');
comment.addEventListener('click', function (e) {
    showComment.classList.toggle('active');
});

// Để cuối
const filter = document.querySelector('.filter-icon');
const filterBlock = document.querySelector('.filter-block');
filter.addEventListener('click', function (e) {
    filterBlock.classList.toggle('active');
});



