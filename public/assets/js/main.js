const loading = document.getElementById('loading');
window.addEventListener('load', () => {
    setTimeout(() => {
        loading.style.display = 'none';
    }, 750)
})