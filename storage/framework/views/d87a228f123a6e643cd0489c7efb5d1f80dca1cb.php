<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title>News</title>


    <link rel="shortcut icon" href="<?php echo e(url('images/logoS.png')); ?>" type="image/x-icon">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Scripts -->
    <?php echo app('Illuminate\Foundation\Vite')(['resources/sass/app.scss', 'resources/js/app.js']); ?>


    
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
</head>

<body>
    <div id="app">
        <div class="header row g-0">
            <div class="header-left col-lg-6 col-md-3">
                <div class="header-logo">
                    <a href="<?php echo e(route('index')); ?>">
                        <img src="<?php echo e(url('images/logo.png')); ?>" alt="logo" class="logo">
                    </a>
                </div>
            </div>
            <div class="header-right col-lg-6 col-md-9 align-self-center ">
                <div class="header-right-block row g-0 align-items-center justify-content-end ">
                    <div class="header-search col-lg-6 col-md-5 justify-content-end ">
                        <form action="<?php echo e(route('index')); ?>" method="POST" class="header-form d-flex">
                            <?php echo csrf_field(); ?>
                            <input type="text" placeholder="Tìm kiếm bài báo..." class="search-input" name="search">
                            <button type="submit" class="search-btn">
                                <i class="fa-solid fa-magnifying-glass search-icon"></i>
                            </button>
                        </form>
                    </div>
                    <div class="header-account col-lg-6 col-md-5">
                        <div class="account-block">
                            <i class="fa-solid fa-user account-icon"></i>
                            <div class="dropdown">
                                <?php if(auth()->guard()->guest()): ?>
                                    <?php if(Route::has('login')): ?>
                                        <div><a href="<?php echo e(route('login')); ?>" class="login">Đăng nhập</a></div>
                                    <?php endif; ?>
                                    <?php if(Route::has('register')): ?>
                                        <div><a href="<?php echo e(route('register')); ?>" class="register">Đăng ký</a></div>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <div>
                                        <a href="<?php echo e(route('author.index')); ?>" class="manage">Quản lý tài khoản</a>
                                    </div>
                                    <div>
                                        <a href="<?php echo e(route('cusLogout')); ?>" class="logout">Đăng xuất</a>
                                    </div>
                                <?php endif; ?>
                                <div class="dark-ui">
                                    Chế độ:
                                    <i class="fa-solid fa-moon state-mode"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="nav">
            <ul class="nav-bar">
                <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="nav-bar-item">
                        <a href="<?php echo e(route('nav', ['id' => $item->CategoryID, 'name' => $item->CategoryName])); ?>">
                            <?php echo e($item->CategoryName); ?>

                        </a>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>

        <main class="py-4">
            <?php echo $__env->yieldContent('content'); ?>
        </main>
        <div class="warning">
            <div class="warning-block">
                <div class="warning-close">
                    <i class="fa-solid fa-xmark close-icon"></i>
                </div>
                <div class="warning-text">
                    <i class="fa-solid fa-triangle-exclamation"></i>
                    <span> Vui lòng đăng nhập!
                    </span>
                </div>
            </div>
        </div>

        <div class="footer ">
            <div class="row g-0 d-flex justify-content-center ">
                <div class="footer-category col-lg-8">
                    <div class="row g-0">
                        <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="nav-bar-item col-lg-3 col-md-4"><a
                                    href="<?php echo e(route('index')); ?>"><?php echo e($item->CategoryName); ?></a>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                <div class="footer-contact col-lg-4">
                    <div class="footer-channel">
                        <div class="footer-phone row g-0">
                            <div class="col-lg-6">
                                <div>Liên hệ tòa soạn</div>
                                <b>
                                    <h3 class="phone-number text-bold">
                                        09123456781
                                    </h3>
                                </b>
                            </div>
                        </div>
                        <div class="footer-media row g-0">
                            <div class="col-lg-1 col-md-1">
                                <i class="fa-brands fa-facebook" style="color: #4E89AE"></i>
                            </div>
                            <div class="col-lg-1 col-md-1">
                                <i class="fa-brands fa-youtube" style="color: #E64848"></i>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-0">
                <div class="footer-member col-lg-8">
                    <h5>Cộng tác viên</h5>
                    <ul class="member-role row">
                        <li class="member col-lg-4 col-md-6"> Trần Thị Giáng My</li>
                        <li class="member col-lg-4 col-md-6"> Nguyễn Phạm Thanh Hoàng </li>
                        <li class="member col-lg-4 col-md-6"> Nguyễn Thị Kim Ngân</li>
                        <li class="member col-lg-4 col-md-6"> Bùi Văn Nin</li>
                        <li class="member col-lg-4 col-md-6"> Phạm Đức Mạnh</li>
                        <li class="member col-lg-4 col-md-6"> Liêu Hà Phương Huy</li>
                    </ul>
                </div>
                <div class="footer-logo col-lg-4">
                    <a href="<?php echo e(route('index')); ?>">
                        <img src="<?php echo e(url('images/logo.png')); ?>" alt="logo" class="logo">
                    </a>
                </div>
            </div>
        </div>
    </div>
    <script>
        <?php echo $__env->yieldContent('js-main'); ?>
        <?php echo $__env->yieldContent('js-flex'); ?>
    </script>

    
    <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    <?php echo Toastr::message(); ?>


    

</body>

</html>
<?php /**PATH D:\Projects\LaravelPJ\laravel-project\resources\views/layouts/app.blade.php ENDPATH**/ ?>