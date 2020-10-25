<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $article->title(); ?></title>
</head>

<body>
    <a href="/">Atpakaļ</a>
    <h1><?= $article->title(); ?></h1>
    <p><?= $article->content(); ?></p>
    <p>
        <small>
            <b><?= $article->createdAt(); ?></b>
        </small>
    </p>
</body>

</html>