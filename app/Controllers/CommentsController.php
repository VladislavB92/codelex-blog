<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Database\DatabaseController;

class CommentsController
{
    public function comment(array $vars)
    {
        $nickname = $_POST['nickname'];
        $comment = $_POST['comment'];
        $id = (int) $vars['id'];

        DatabaseController::query()
            ->insert('comments')
            ->values([
                'article_id' => $id,
                'name' => ':nickname',
                'content' => ':comment'
            ])
            ->setParameters([
                'nickname' => $nickname,
                'comment' => $comment
            ])
            ->execute();

        header('Location: /articles/' . $id);
    }

    public function delete(array $vars)
    {
        $id = (int) $vars['id'];
        $commentId = (int) $_POST['commentId'];

        DatabaseController::query()
            ->delete('comments')
            ->where('id = :id')
            ->setParameter('id', $commentId)
            ->execute();

        header('Location: /articles/' . $id);
    }
}
