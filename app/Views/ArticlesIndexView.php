<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News Today</title>
</head>

<body>
    <a href="/account">Log in</a><br>
    Loged in as: <br>
    <a href="/articles/create/">Create new article</a>
    <h1>Latest news</h1>
    <div class="articles">
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
                <input type="hidden" name="_method" value="DELETE" />
                <button type='submit' onclick="return confirm('Are you sure?')">Delete</button>
            </form>

        <?php endforeach; ?>
    </div>


</body>

</html>