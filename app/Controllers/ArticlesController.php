<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\Article;
use App\Database\DatabaseController;

class ArticlesController
{
    public function index()
    {
        $articlesQuery = DatabaseController::query()
            ->select('*')
            ->from('articles')
            ->orderBy('created_at', 'desc')
            ->execute()
            ->fetchAllAssociative();

        $articles = [];

        foreach ($articlesQuery as $article) {
            $articles[] = new Article(
                (int) $article['id'],
                $article['title'],
                $article['content'],
                $article['created_at']
            );
        }

        return require_once __DIR__  . '/../Views/ArticlesIndexView.php';
    }

    public function show(array $vars)
    {
        $articleQuery = DatabaseController::query()
            ->select('*')
            ->from('articles')
            ->where('id = :id')
            ->setParameter('id', (int) $vars['id'])
            ->execute()
            ->fetchAssociative();

        $article = new Article(
            (int) $articleQuery['id'],
            $articleQuery['title'],
            $articleQuery['content'],
            $articleQuery['created_at'],
        );

        return require_once __DIR__  . '/../Views/ArticlesShowView.php';
    }
}
