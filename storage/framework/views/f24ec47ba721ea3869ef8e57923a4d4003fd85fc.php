
<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="content-block d-flex justify-content-center ">
            <div class="articles">
                <div class="filter text-end">
                    <div class="filter-dropdown">
                        <i class="fa-solid fa-filter filter-icon"></i>
                        <div class="filter-block">
                            <div class="filter-btn"><a href="<?php echo e(route('latest')); ?> ">Mới nhất</a></div>
                            <div class="filter-btn"><a href="<?php echo e(route('oldest')); ?> ">Cũ nhất</a></div>
                        </div>
                    </div>
                </div>
                <div class="article-items">
                    <?php $__currentLoopData = $result; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="item-list">
                            <h3 class="item-title">
                                
                                <a href="<?php echo e(route('news', ['id' => $item->ArticleID])); ?>"><?php echo e($item['title']); ?></a>
                            </h3>
                            
                            <div class="content-block">
                                <div class="item-content d-flex">
                                    
                                    <?php echo $item['description']; ?>

                                </div>
                            </div>
                            <?php if(Auth::user()): ?>
                                <div class="react-block d-flex">
                                    <div class="like">
                                        <i class="fa-solid fa-thumbs-up"></i>
                                    </div>
                                    <div class="comment">
                                        <i class="fa-solid fa-comment"></i>
                                    </div>
                                </div>
                                <?php $__env->startSection('js-flex'); ?>
                                    const likes = document.querySelectorAll('.like');
                                    for (const like of likes) {
                                    like.addEventListener('click', function (e) {
                                    like.classList.toggle('pick');
                                    });
                                    };
                                <?php $__env->stopSection(); ?>
                            <?php else: ?>
                                <div class="react-block d-flex">
                                    <div class="not-like">
                                        <i class="fa-solid fa-thumbs-up"></i>
                                    </div>
                                    <div class="not-comment">
                                        <i class="fa-solid fa-comment"></i>
                                    </div>
                                </div>
                                <?php $__env->startSection('js-flex'); ?>
                                    const notLikes = document.querySelectorAll('.not-like');
                                    const notComment = document.querySelectorAll('.not-comment');
                                    const warning = document.querySelector('.warning');
                                    const closeWarning = document.querySelector('.close-icon');


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
                                <?php $__env->stopSection(); ?>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <div class="paginate"><?php echo e($result->links()); ?></div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js-main'); ?>
    const account = document.querySelector('.account-icon');
    const dropdown = document.querySelector('.dropdown');
    const filter = document.querySelector('.filter-icon');
    const filterBlock = document.querySelector('.filter-block');

    account.addEventListener('click', function (e) {
    dropdown.classList.toggle('active');
    });

    filter.addEventListener('click', function (e) {
    filterBlock.classList.toggle('active');
    });
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\LaravelPJ\laravel-project\resources\views/welcome.blade.php ENDPATH**/ ?>