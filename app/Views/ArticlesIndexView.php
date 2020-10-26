<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ziņas šodien</title>
</head>

<body>
    <h1>Aktuālākās ziņas</h1>

    <?php foreach ($articles as $article) : ?>
        <h3>
            <a href="/articles/<?= $article->id(); ?>">
                <?= $article->title(); ?>
            </a>
        </h3>
        <p><?= $article->content(); ?></p>
        <p>
            <small>
                <?= $article->createdAt(); ?>
            </small>
        </p>

        <form action="/articles/<?= $article->id(); ?>" method="POST">
            <button type='submit'>Delete</button>
            <input type="hidden" name="_method" value="DELETE" />
        </form>
    <?php endforeach; ?>

</body>

</html>