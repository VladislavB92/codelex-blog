<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Services\CommentServices\DeleteCommentService;
use App\Services\CommentServices\PlaceCommentService;

class CommentsController
{
    public function comment(array $vars)
    {
        $id = (int) $vars['id'];
        $nickname = $_POST['nickname'];
        $comment = $_POST['comment'];

        $placeComment = new PlaceCommentService();
        $placeComment->execute($id, $nickname, $comment);

        header('Location: /articles/' . $id);
    }

    public function delete(array $vars)
    {
        $id = (int) $vars['id'];
        $commentId = (int) $_POST['commentId'];

        $deleteComment = new DeleteCommentService();
        $deleteComment->execute($commentId);

        header('Location: /articles/' . $id);
    }
}
