<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\Article;
use App\Models\Comment;
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

        $commentQuery = DatabaseController::query()
            ->select('*')
            ->from('comments')
            ->where('article_id = :article_id')
            ->setParameter('article_id', (int) $vars['id'])
            ->orderBy('created_at', 'desc')
            ->execute()
            ->fetchAllAssociative();

        $article = new Article(
            (int) $articleQuery['id'],
            $articleQuery['title'],
            $articleQuery['content'],
            $articleQuery['created_at'],
        );

        $comments = [];

        foreach ($commentQuery as $comment) {
            $comments[] = new Comment(
                (int) $comment['id'],
                $comment['article_id'],
                $comment['name'],
                $comment['content'],
                $comment['created_at']
            );
        }

        return require_once __DIR__  . '/../Views/ArticlesShowView.php';
    }

    public function delete(array $vars)
    {
        $articlesQuery = DatabaseController::query()
            ->delete('articles')
            ->from('articles')
            ->where('id = :id')
            ->setParameter('id', (int) $vars['id'])
            ->execute();

        header('Location: /');
    }

    public function showCreate()
    {
        return require_once __DIR__  . '/../Views/ArticleCreateView.php';
    }

    public function create()
    {
        $title = $_POST['title'];
        $content = $_POST['content'];

        var_dump($title, $content);

        $articleQuery = DatabaseController::query()
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

        header('Location: /');
    }
}
