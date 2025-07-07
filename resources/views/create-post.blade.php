<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-xl-8 m-auto">

                <h3 class="title fw-bold border-bottom pb-3">Observer Laravel 11</h3>

                <form action="{{ route('post.store') }}" method="POST" class="mt-4">
                    @csrf

                    <div class="card sha">

                        <div class="card-header">
                            <h4 class="card-title fw-bold">Create Post</h4>
                        </div>

                        <div class="form-group mb-3">
                            <label class="label">Title</label>
                            <input class="form-control" type="text" name="title" placeholder="Post Title">

                            @error('title')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label class="label">Description</label>
                            <input class="form-control" type="text" name="description" placeholder="Description">

                            @error('description')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="card-footer">
                            <div class="pt-2 text-end">
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </div>

                    </div>
                </form>

            </div>
        </div>
    </div>
</body>
</html>