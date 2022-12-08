// import './bootstrap';
// import '../css/app.css';
// import '../../../resources/sass/app.scss';

const account = document.querySelector('.account-icon');
const dropdown = document.querySelector('.dropdown');
const filter = document.querySelector('.filter-icon');
const filterBlock = document.querySelector('.filter-block');
const likes = document.querySelectorAll('.like');
const comment = document.querySelectorAll('.comment');
const showComment = document.querySelector('.comment-input');
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

for (const like of likes) {
    like.addEventListener('click', function (e) {
        like.classList.toggle('pick');
    });
};
account.addEventListener('click', function (e) {
    dropdown.classList.toggle('active');
})

comment.addEventListener('click', function (e) {
    showComment.classList.toggle('active');
});

closeWarning.addEventListener('click', function (e) {
    warning.classList.remove('active-flex');
});

filter.addEventListener('click', function (e) {
    filterBlock.classList.toggle('active');
});