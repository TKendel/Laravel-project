<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$Post->title}}</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/css/frontEnd.css">   
</head>

<body>
    <header>
        <div class="jumbotron">
            <div class="container">
                <h2 class="display-2">{{$settings->name}}</h2>
                <nav>
                    <ul class="nav justify-content-center">
                        @foreach($categories as $category)
                        <li class="nav-item">
                            <a class="nav-link active" href="#">{{$category->type}}</a>
                        </li>
                        @endforeach
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    @yield("content")
  

@include("includes/footer")
<!--scripts-->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>
