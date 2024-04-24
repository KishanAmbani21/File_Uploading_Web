<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration Page</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>

body{
  background: #37517e;
}
    </style>
</head>

<body>
    <section class="vh-100 bg-image"
>
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body p-5">
                                <h2 class="text-uppercase text-center mb-5">Create an account</h2>

                                <form action="<?php echo e(route('registerUser')); ?>" method="POST" enctype="multipart/form-data">
                                    <?php if(Session::has('success')): ?>
                                    <div class="alert alert-success"><?php echo e(Session::get('success')); ?></div>
                                    <?php endif; ?>
                                    <?php if(Session::has('fail')): ?>
                                    <div class="alert alert-danger"><?php echo e(Session::get('fail')); ?></div>
                                    <?php endif; ?>
                                    <?php echo csrf_field(); ?>
                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <label for="form3Example1cg" style="padding-left: 18px; padding-bottom: 5px; font-size:20px;">UserName :</label>
                                        <input type="text" id="form3Example1cg" class="form-control form-control-lg" name="Name" placeholder="Enter UserName" value="<?php echo e(old('Name')); ?>"  >
                                        <span class="text-danger"><?php $__errorArgs = ['Name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                                    </div>

                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <label for="form3Example3cg" style="padding-left: 18px; padding-bottom: 5px; font-size:20px;">Email :</label>
                                        <input type="email" id="form3Example3cg" class="form-control form-control-lg" name="Email" placeholder="Enter Email" value="<?php echo e(old('Email')); ?>"  >
                                        <span class="text-danger"><?php $__errorArgs = ['Email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                                    </div>

                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <label for="form3Example4cg" style="padding-left: 18px; padding-bottom: 5px; font-size:20px;">Password :</label>
                                        <input type="password" id="form3Example4cg" class="form-control form-control-lg" name="Password" placeholder="Enter Password" value="<?php echo e(old('Password')); ?>"  >
                                        <span class="text-danger"><?php $__errorArgs = ['Password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                                        </div>

                                    <div class="d-flex justify-content-center">
                                        <input type="submit" data-mdb-button-init class="btn btn-danger px-5 mt-2" value="Register">
                                    </div>

                                    <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="login"
                                            class="fw-bold text-body"><u>Login here</u></a></p>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html><?php /**PATH C:\Users\amban\OneDrive\Desktop\File_Uploading_Website\File_Upload\resources\views/register.blade.php ENDPATH**/ ?>