<?php

declare(strict_types=1);

namespace App\Services\CommentServices;

use App\Database\DatabaseController;
use App\Models\Comment;

class ShowCommentsService
{
    public function execute(int $id): array
    {
        $comments = [];

        $commentQuery = DatabaseController::query()
            ->select('*')
            ->from('comments')
            ->where('article_id = :article_id')
            ->setParameter('article_id', $id)
            ->orderBy('created_at', 'desc')
            ->execute()
            ->fetchAllAssociative();

        foreach ($commentQuery as $comment) {
            $comments[] = new Comment(
                (int) $comment['id'],
                $comment['article_id'],
                $comment['name'],
                $comment['content'],
                $comment['created_at']
            );
        }

        return $comments;
    }
}
