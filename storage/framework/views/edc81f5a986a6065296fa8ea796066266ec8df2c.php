<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" href="/css/toastr.min.css">
    <?php echo $__env->yieldContent('styles'); ?>

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="<?php echo e(route('index')); ?>">
                    Nintendo
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php echo e(__('Toggle navigation')); ?>">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                        <!-- // -->
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <?php if(auth()->guard()->guest()): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
                            </li>
                            <?php if(Route::has('register')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a>
                                </li>
                            <?php endif; ?>
                        <?php else: ?>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <?php echo e(__('Logout')); ?>

                                    </a>

                                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                        <?php echo csrf_field(); ?>
                                    </form>
                                </div>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
            <div class="row">
                <?php if(auth::check()): ?>
                <div class="col-lg-4">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <a href="<?php echo e(route('Content.index')); ?>">All posts</a>
                        </li>
                        <li class="list-group-item">
                            <a href="<?php echo e(route('Content.create')); ?>">Create a post</a>
                        </li>
                        <li class="list-group-item">
                            <a href="<?php echo e(route('Category.create')); ?>">Create category</a>
                        </li>
                        <li class="list-group-item">
                           <a href="<?php echo e(route('Category.index')); ?>">Categories</a>
                        </li>
                        <li class="list-group-item">
                            <a href="<?php echo e(route('Content.deleted')); ?>">Trash</a>
                        </li>
                        <li class="list-group-item">
                            <a href="<?php echo e(route('tag.index')); ?>">Tags</a>
                        </li>
                        <li class="list-group-item">
                            <a href="<?php echo e(route('tag.create')); ?>">Create Tag</a>
                        </li>
                        <?php if(Auth::user()->admin): ?>
                            <li class="list-group-item">
                               <a href="<?php echo e(route('User.index')); ?>">Users</a>
                            </li>
                            <li class="list-group-item">
                               <a href="<?php echo e(route('User.create')); ?>">Create user</a>
                            </li>
                        <?php endif; ?>
                        <li class="list-group-item">
                           <a href="<?php echo e(route('Profile.index')); ?>">Edit Profile</a>
                        </li>
                        <li class="list-group-item">
                           <a href="<?php echo e(route('Settings.index')); ?>">Settings</a>
                        </li>
                    </ul>
                </div>
            <?php endif; ?>
                <div class="col-lg-8">
                    <?php echo $__env->yieldContent('content'); ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>"></script>
    <script src="/js/toastr.min.js"></script>
    <script>
        <?php if(Session::has('success')): ?>
            toastr.success("<?php echo e(Session::get('success')); ?>")
        <?php endif; ?>

        <?php if(Session::has('info')): ?>
            toastr.info("<?php echo e(Session::get('info')); ?>")
        <?php endif; ?>
    </script>
    <?php echo $__env->yieldContent('scripts'); ?>
</body>
</html>
