<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\Comment;
use App\Database\DatabaseController;

class CommentsController
{
    public function comment(array $vars)
    {
    }

    public function showComment(array $vars)
    {
        $commentQuery = DatabaseController::query()
            ->select('*')
            ->from('comments')
            ->where('id = :id')
            ->setParameter('id', (int) $vars['id'])
            ->execute()
            ->fetchAssociative();

        $comment = new Comment(
            (int) $commentQuery['id'],
            $commentQuery['article_id'],
            $commentQuery['name'],
            $commentQuery['content'],
            $commentQuery['created_at']
        );

        return require_once __DIR__  . '/../Views/ArticlesShowView.php';
    }
}
