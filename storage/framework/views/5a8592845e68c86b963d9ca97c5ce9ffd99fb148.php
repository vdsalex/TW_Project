<?php echo Html::style('css/profile.css'); ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DiLy</title>
  
</head>
<body>

	<img id="bg-img" src="content/blue-gradient.png" alt="Blue Gradient">

    <header></header>

    <div class="container" id="mainContainer">
    <?php echo $__env->make('includes.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
         <section class="row new-post">
                <div class="col-md-6 col-md-offset-3">
                    <header><h3>Your Account</h3></header>
                    <form action="<?php echo e(route('account.save')); ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            <input type="text" name="first_name" class="form-control" value="<?php echo e($user->first_name); ?>" id="first_name">
                        </div>
                        <div class="form-group">
                            <label for="image">Image (only .jpg)</label>
                            <input type="file" name="image" class="form-control" id="image">
                        </div>
                        <button type="submit" class="btn btn-primary">Save Account</button>
                        <input type="hidden" value="<?php echo e(Session::token()); ?>" name="_token">
                    </form>
                </div>
            </section>

                <section class="row new-post">
                    <div class="col-md-6 col-md-offset-3">
                        <?php if(Storage::disk('local')->has($user->username . '-'.$user->id.'\\'.'profile.jpg')): ?>
                            <img src="<?php echo e(route('account.image', ['filename' => $user->username . '-'.$user->id.'\\'.'profile.jpg'])); ?>" alt="Profile image" class="img-responsive">
                        <?php else: ?>
                            <img src="<?php echo e(route('account.image', ['filename' => 'default_profile_img.jpg'])); ?>" alt="Profile image" class="img-responsive">
                        <?php endif; ?>

                    </div>
                </section>

    </div>

</body>
</html>