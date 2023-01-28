const loading = document.getElementById('loading');
const changeMode = document.querySelector('.change-mode');
window.addEventListener('load', () => {
    setTimeout(() => {
        loading.style.display = 'none';
    }, 750)
    // if (localStorage.getItem('mode') === null) {
    //     localStorage.setItem('mode', "light");
    // }
    setCookie('mode', localStorage.getItem("mode"), 365)
})

function setCookie(cname, cvalue, exdays) {
    const d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    let expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

changeMode.addEventListener('click', () => {
    if (localStorage.getItem('mode') == "light") {
        localStorage.setItem('mode', "dark");
    } else {
        localStorage.setItem('mode', "light");
    }
    window.location.reload();
})
