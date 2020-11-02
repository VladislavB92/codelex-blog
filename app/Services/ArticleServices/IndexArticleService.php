<?php

declare(strict_types=1);

namespace App\Services\ArticleServices;

use App\Database\DatabaseController;
use App\Models\Article;

class IndexArticleService
{
    public function execute(): array
    {
        $articles = [];

        $articlesQuery = DatabaseController::query()
            ->select('*')
            ->from('articles')
            ->orderBy('created_at', 'desc')
            ->execute()
            ->fetchAllAssociative();

        foreach ($articlesQuery as $article) {
            $articles[] = new Article(
                (int) $article['id'],
                $article['title'],
                $article['content'],
                $article['created_at']
            );
        }

        return $articles;
    }
}
