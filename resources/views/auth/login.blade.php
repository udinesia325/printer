<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Printer Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5" style="height:50%">
        <div class="card mx-auto" style="max-width:400px;">
            <div class="card-body">
                <form method="POST" action="{{ route('login.process') }}">
                    <h1 class="text-center">Login</h1>
                    @csrf
                    @if(session("pesan"))
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <div class="btn-close" data-bs-dismiss="alert"></div>
                        {{ session("pesan") }}
                    </div> @endif

                    <div class="mb-3">
                        <input type="username" class="form-control @error('username') is-invalid @enderror" placeholder="username" name="username" value="{{@old('username')}}">
                        <div class="invalid-feedback">
                            @error("username")
                            {{$message}}
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="password" name="password">
                        <div class="invalid-feedback">
                            @error("password")
                            {{$message}}
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <input type="submit" class="form-control btn btn-primary" placeholder="password" value="Login">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>
