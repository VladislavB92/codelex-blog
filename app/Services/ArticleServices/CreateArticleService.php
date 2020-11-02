<?php

declare(strict_types=1);

namespace App\Services\ArticleServices;

use App\Database\DatabaseController;

class CreateArticleService
{
    public function execute(string $title, string $content): void
    {
        DatabaseController::query()
            ->insert('articles')
            ->values([
                'title' => ':title',
                'content' => ':content'
            ])
            ->setParameters([
                'title' => $title,
                'content' => $content
            ])
            ->execute();
    }
}
