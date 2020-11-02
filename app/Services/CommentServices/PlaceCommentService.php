<?php

declare(strict_types=1);

namespace App\Services\CommentServices;

use App\Database\DatabaseController;

class PlaceCommentService
{
    public function execute(
        int $id,
        string $nickname,
        string $comment
    ): void {
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
    }
}
