<?php

declare(strict_types=1);

namespace App\Services\CommentServices;

use App\Database\DatabaseController;

class DeleteCommentService
{
    public function execute($id): void
    {
        DatabaseController::query()
            ->delete('comments')
            ->where('id = :id')
            ->setParameter('id', $id)
            ->execute();
    }
}
