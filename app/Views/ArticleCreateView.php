<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create an article</title>
</head>

<body>
    <a href="/">Back</a>
    <h1>Create an article</h1>
    <div class="create">

        <form action="/articles" method="POST">

            <label for="title">Title:</label><br>
            <input type="text" name="title" id="title"><br><br>

            <label for="content">Content</label><br>
            <textarea name="content" cols="100" rows="30"></textarea>
            <br><br>

            <button type="submit">Create</button>
        </form>
    </div>
</body>

</html>