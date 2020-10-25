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
            <a href="/articles/<?php echo $article->id(); ?>">
                <?= $article->title(); ?>
            </a>
        </h3>
        <p><?= $article->content(); ?></p>
        <p>
            <small>
                <?= $article->createdAt(); ?>
            </small>
        </p>
    <?php endforeach; ?>

</body>

</html>