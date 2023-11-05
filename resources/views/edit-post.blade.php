<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <title>Edit</title>
</head>
<body>
    <div style="background-image: url('{{ asset('images/que-es-un-blog.png') }}'); background-size: cover;" class="flex bg-primary align-items-center flex-column" style="height: 100vh;">
        <div class="d-flex p-2        justify-content-between" style="height: 100%">

        <div class="container p-4 align-self-center bg-white" style="height: 55%">
            <h1 class="text-primary">Edit Note</h1>
            <form action="/edit-post/{{$post->id}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="title" class="">Post Title</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{$post->title}}">
                </div>
                <div class="form-group">
                    <label for="body" class="">Post Body</label>
                    <textarea name="body" id="body" class="form-control" rows="4">{{$post->body}}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Save Changes</button>
                <button class="btn btn-danger" onclick="location.href='{{ url('/') }}'">Cancel</button>

            </form>
        </div>
    </div>
</body>

</html>