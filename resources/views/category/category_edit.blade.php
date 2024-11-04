<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
  
    <section id="img_crud">
        <div class="container">
            <div class="row mt-5">
                <div class="col-lg-6 m-auto">
                    <div class="card">
                        <div class="card-header">
                            <h4>Add Category</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{route('category.update')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                                <div class="mb-4">
                                    <label>Category Name</label>
                                    <input type="text" name="category" id="category" class="form-control" value="{{$select_category->category}}">
                                </div>
                                <div class="mb-3">
                                    <label>Category Image</label>
                                    <input type="file" name="image" id="image" class="form-control" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                                </div>
                                <div class="mb-4">
                                    <img width="100" id="blah" alt="" src="{{$select_category->image}}">
                                </div>
                                <div class="mb-4">
                                    <input type="hidden" name="id" value="{{$select_category->id}}">
                                    <button type="submit" class="btn btn-primary">update Category</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>



  </body>
</html>