<?php

declare(strict_types=1);

namespace App\Services\ArticleServices;

use App\Database\DatabaseController;
use App\Models\Article;

class ShowArticleService
{
    public function execute(int $id): Article
    {
        $articleQuery = DatabaseController::query()
            ->select('*')
            ->from('articles')
            ->where('id = :id')
            ->setParameter('id', $id)
            ->execute()
            ->fetchAssociative();

        return new Article(
            (int) $articleQuery['id'],
            $articleQuery['title'],
            $articleQuery['content'],
            $articleQuery['created_at']
        );
    }
}
