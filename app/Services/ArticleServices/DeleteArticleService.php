<?php

declare(strict_types=1);

namespace App\Services\ArticleServices;
use App\Database\DatabaseController;

class DeleteArticleService
{
    public function execute(int $id): void
    {
        DatabaseController::query()
        ->delete('articles')
        ->from('articles')
        ->where('id = :id')
        ->setParameter('id', $id)
        ->execute();
    }
}