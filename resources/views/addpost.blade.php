<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Post Page</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Custom CSS -->
    <style>
        body {
            background: #37517e;
        }

        .fs-6 {
            display: flex;
        }

        #fs-5 {
            padding-top: 2px;
            font-size: 13px;
        }
    </style>
</head>

<body>
    <div>
        <!-- Form for adding a post -->
        <form action="{{ route('add_post') }}" method="POST" enctype="multipart/form-data">
            @if (Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif
            @if (Session::has('fail'))
            <div class="alert alert-danger">{{ Session::get('fail') }}</div>
            @endif
            @csrf
            <!-- CSRF Token -->

            <!-- Main content section -->
            <section class="vh-120 gradient-custom">
                <div class="container py-5 h-100">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                            <div class="card bg-dark text-white" style="border-radius: 1rem;">
                                <div class="card-body p-5 text-center" style="height: 632px;">
                                    <div class="mb-md-5 mt-md-4 pb-5">
                                        <!-- Title -->
                                        <h2 class="fw-bold mb-2 text-uppercase">ADD POST</h2>
                                        <p class="text-white-50 mb-3">Please Fill the details</p>

                                        <!-- Title input -->

                                        <div class="form-group">
                                            <label class="form-label fs-6 pl-2">Title :</label>
                                            <input type="text" class="form-control" placeholder="Enter Title"
                                                name="title" value="{{ old('title') }}">
                                            <!-- Error message for title validation -->
                                            <span class="text-danger">@error('title') {{ $message }} @enderror</span>
                                        </div>
                                        <br>


                                        <!-- Description input -->
                                        <div data-mdb-input-init class="form-outline form-white mb-1">
                                            <label class="form-label fs-6">Description :</label>
                                            <textarea type="text" name="description" placeholder="Enter Description"
                                                class="form-control" value="{{ old('description') }}"></textarea>
                                            <!-- Error message for description validation -->
                                            <span class="text-danger">@error('description') {{ $message }}
                                                @enderror</span>
                                        </div>
                                        <br>

                                        <!-- Image upload -->
                                        <div data-mdb-input-init class="form-outline form-white mb-4">
                                            <label class="form-label fs-6">Upload Image :</label>
                                            <input type="file" name="image" class="form-control"
                                                value="{{ old('image') }}">
                                            <!-- Helper text for file drop -->
                                            <label class="form-label" id="fs-5">drop PDFs, Docs, and Images here</label>
                                            <br>
                                            <!-- Error message for image validation -->
                                            <span class="text-danger">@error('image') {{ 'Invalid file type' }}
                                                @enderror</span>
                                        </div>

                                        <!-- Submit buttons -->
                                        <div>
                                            <input type="submit" value="Add Post" class="btn btn-primary px-5 mt-2">
                                            <a class="btn btn-danger px-5 mt-2" href="{{ route('view_posts') }}">View
                                                Post</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </form>
    </div>
</body>

</html>
