<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
Index page
<ol>
    @foreach($labels as $label)
        <li
            style="list-style: none"
        >
            Name:   {{ $label->name }}
        </li>
        <hr>
    @endforeach
</ol>
</div>
</body>
</html>
