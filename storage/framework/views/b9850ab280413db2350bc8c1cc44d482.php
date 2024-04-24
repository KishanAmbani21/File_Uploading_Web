
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Images Page</title>

    <style>
  /*--------------------------------------------------------------
# Header
--------------------------------------------------------------*/
#header {
  transition: all 0.5s;
  z-index: 997;
  padding: 15px 0;
  background: #37517e;
}

#header.header-scrolled,
#header.header-inner-pages {
  background: rgba(40, 58, 90, 0.9);
}


/*--------------------------------------------------------------
# Navigation Menu
--------------------------------------------------------------*/
/**
* Desktop Navigation 
*/
.navbar {
  padding: 0;
}

.navbar ul {
  margin: 0;
  padding: 0;
  display: flex;
  list-style: none;
  margin-left: 45%;
}

.navbar li {
  position: relative;
  margin-left: 30px;
}

.navbar a,
.navbar a:focus {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 10px 0 10px 30px;
  font-size: 15px;
  font-weight: 500;
  color: #fff;
  white-space: nowrap;
  transition: 0.3s;
}

.navbar a i,
.navbar a:focus i {
  font-size: 12px;
  line-height: 0;
  margin-left: 5px;
}

.navbar a:hover,
.navbar .active,
.navbar .active:focus,
.navbar li:hover>a {
  color: #47b2e4;
}

.navbar .getstarted,
.navbar .getstarted:focus {
  padding: 8px 20px;
  margin-left: 30px;
  border-radius: 50px;
  color: #fff;
  font-size: 14px;
  border: 2px solid #47b2e4;
  font-weight: 600;
}

.navbar .getstarted:hover,
.navbar .getstarted:focus:hover {
  color: #fff;
  background: #31a9e1;
}

@media (max-width: 1366px) {
  .navbar .dropdown .dropdown ul {
    left: -90%;
  }

  .navbar .dropdown .dropdown:hover>ul {
    left: -100%;
  }
}
        * {
            box-sizing: border-box;
            background: #37517e;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        .column {
            float: left;
            width: 25%;
            padding: 0 10px;
        }

        .row:after {
            content: "";
            display: table;
            clear: both;
        }


        @media screen and (max-width: 600px) {
            .column {
                width: 100%;
                display: block;
                margin-bottom: 20px;
            }
        }


        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            padding: 16px;
            text-align: center;
            background-color: #f1f1f1;
            margin: 10px;
        }
        img{
            border: 1px solid rgba(0, 0, 0, 0.2);
        }
    </style>
</head>

<body>

    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center">
    
          <nav id="navbar" class="navbar">
            <ul>
              <li><a class="nav-link scrollto" href="<?php echo e(route('home')); ?>">Home</a></li>
              <li><a class="nav-link scrollto" href="<?php echo e(route('view_posts')); ?>">View Post</a></li>
              <li><a class="nav-link scrollto active" href="<?php echo e(route('image')); ?>">Images</a></li>
              <li><a class="nav-link scrollto" href="<?php echo e(route('pdf')); ?>">PDFs</a></li>
              <li><a class="nav-link scrollto" href="<?php echo e(route('doc')); ?>">Docs</a></li>
              <li><a class="nav-link scrollto" href="<?php echo e(route('Upload_post')); ?>">Add Post</a></li>
    
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
          </nav>
          <!-- .navbar -->
    
        </div>
      </header>

    <div class="row" style="margin-top: 100px;">
        <?php $__currentLoopData = $post; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(Str::endsWith(strtolower($post->image), ['.jpg', '.jpeg','.png'])): ?>
                <div class="column">
                    <div class="card">
                        <img class="card-img-top" src="<?php echo e(file_exists(public_path('Images/'.$post->image)) ? asset('Images/'.$post->image) : asset('https://cdn.iconscout.com/icon/free/png-256/free-image-file-2014959-1700567.png')); ?>" alt="<?php echo e($post->Title); ?>" width="200px" height="300px">
                        <div class="card-body" style="background-color: burlywood">
                            <h5 class="card-title" style="background-color: burlywood"><?php echo e($post->Title); ?></h5>
                            <p class="card-text" style="background-color: burlywood"><?php echo e($post->Description); ?></p>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

</body>

</html><?php /**PATH C:\Users\amban\OneDrive\Desktop\File_Uploading_Website\File_Upload\resources\views/image.blade.php ENDPATH**/ ?>