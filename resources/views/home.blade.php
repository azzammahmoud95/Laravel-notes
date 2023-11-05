<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Laravel Blog App</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-image: url('{{ asset('images/que-es-un-blog.png') }}'); background-size: cover;">
    @auth
        <div style="background-image: url('{{ asset('images/que-es-un-blog.png') }}'); background-size: cover;" class="flex bg-primary align-items-center flex-column">
        <div class="container p-4">
            <div class="d-flex sticky-top flex-wrap rounded bg-white p-4 justify-content-between align-items-center">
                <h1 class="text-primary">Welcome, {{ auth()->user()->name }}</h1>
                <h5 class="text-primary">Email: {{ auth()->user()->email }}</h5>
                <form action="/logout" method="POST">
                    @csrf
                    <button class="btn btn-danger">Logout</button>
                </form>
            </div>
        </div>
    <div class="container p-4">
        <div class="     p-4 bg-white rounded">
            <h2 class="text-primary">Create New Note</h2>
            <form action="/create-post" method="POST">
                @csrf
                <div class="form-group">
                    <label for="title">Post Title</label>
                    <input type="text" name="title" id="title" class="form-control" placeholder="Enter post title">
                </div>
                <div class="form-group">
                    <label for="body">Post Body</label>
                    <textarea name="body" id="body" class="form-control" rows="4" placeholder="Enter post body content..."></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Save Post</button>
            </form>
        </div>
    </div>
    <div class="container p-4">
        <div class="  p-4     rounded" style="background-color: #f3f3f3">
            <div class="flex justify-content-center">
                <h3 class="text-primary">NOTES</h3>
                @foreach($posts as $post)
                <div class="bg-light p-4 my-4 shadow-sm">
                    <h3 class="text-dark">{{ $post->title }} by {{ $post->user->name }}</h3>
                    <p>{{ $post->body }}</p>
                    <div class="flex  btn-group" style="width: 100%">
                    <p class="mr-4"><a class="btn btn-primary " href="/edit-post/{{ $post->id }}">Edit</a></p>
                    <form  class="ml-2" action="/delete-post/{{ $post->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    </div>
    {{-- </div> --}}
    

    @else
    <div style="background-image: url('{{ asset('images/que-es-un-blog.png') }}'); background-size: cover; height: 100vh" class="flex flex-wrap align-items-center flex-column">

        <div class="p-2 d-flex flex-wrap flex-md-row justify-content-around" style="height: 100%;">
            <div class="col-md-5 col-12 bg-white p-5 align-self-center" >
                <h2 class="mb-4  text-primary">Register</h2>
                <form action="/register" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input name="name" type="text" id="name" placeholder="Name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input name="email" type="email" id="email" placeholder="Email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input name="password" type="password" id="password" placeholder="Password" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Register</button>
                </form>
            </div>
            <div class="col-md-5 col-12 bg-white p-5 align-self-center">
                <h2 class="text-primary mb-4">Login</h2>
                <form action="/login" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="loginname">Username </label>
                        <input name="loginname" type="text" id="loginname" placeholder="Username" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="loginpassword">Password</label>
                        <input name="loginpassword" type="password" id="loginpassword" placeholder="Password" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary ">Login</button>
                </form>
            </div>
        </div>
    </div>
    
    @endauth
   
</body>
</html>