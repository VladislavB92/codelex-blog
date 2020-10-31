<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $article->title(); ?></title>
</head>

<body>

    <div class="comment">
        <a href="/">Atpakaļ</a>
        <h1><?= $article->title(); ?></h1>
        <p><?= $article->content(); ?></p>
        <p>
            <small>
                <b><?= $article->createdAt(); ?></b>
            </small>
        </p>
    </div>

    <div class="commentEntryField">
        <form action="/articles/<?= $article->id(); ?>/comments" method="POST">

            <label>Nickname:</label><br>
            <input type="text" name="nickname"><br><br>

            <label>Your comment:</label><br>
            <textarea name="comment" id="comment" cols="30" rows="10"></textarea><br>
            <button type="submit">Leave a comment</button>
        </form>
    </div>

    <div class="comments">
        <?php if (!empty($comments)) : ?>

            <?php foreach ($comments as $comment) : ?>
                <?= $comment->getName(); ?>
                <small>
                    <b><?= $comment->createdAt(); ?></b>
                </small>
                <p><?= $comment->getContent(); ?>

                    <form action="/articles/<?= $article->id(); ?>/comments/delete" method="POST">
                        <input type="hidden" name="_method" value="DELETE" />
                        <input type="hidden" name="commentId" value="<?= $comment->getId(); ?>">
                        <button type="submit" type="submit" onclick="return confirm('Are you sure ?')" ;>X</button>
                    </form>
                </p>
            <?php endforeach; ?>

        <?php else : ?>
            No comments
        <?php endif; ?><br>
    </div>

</body>

</html>