<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email</title>
</head>
<body>
    
    <div style="text-align:center;">
        <h1>Ciao Admin</h1>
        <h2>È stato creato un nuovo post</h2>
        <hr style="width:300px">
        <div>
            <h3>{{$post->title}}</h3>
            <p>{{$post->content}}</p>
            <a href="{{route("admin.posts.show", ["post" => $post->id])}}">Vai al post</a>
        </div>
    </div>

</body>
</html>