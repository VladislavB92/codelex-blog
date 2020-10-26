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

    <?= $comment->content(); ?>

    <form action="/articles/<?= $comment->id(); ?>" method="POST">
        <input type="text" name="name"><br>
        <textarea name="comment" id="comment" cols="30" rows="10"></textarea><br>
        <button type="submit">Comment</button>
    </form>

</body>

</html>