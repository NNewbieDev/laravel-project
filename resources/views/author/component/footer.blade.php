<div class="container-fluid text-center p-4"
    style="background-color: {{ $_COOKIE['mode'] == 'dark' ? 'var(--dark-clr)' : 'var(--primary-color)' }}">
    <p class=" fs-6 fw-normal m-3"
        style=" color:{{ $_COOKIE['mode'] == 'dark' ? 'var(--primary-color)' : 'var(--white-clr)' }}">Copyright &copy;
        {{ date('Y') }} by Nin</p>
</div>
