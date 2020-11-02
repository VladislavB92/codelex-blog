<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Services\ArticleServices\DeleteArticleService;
use App\Services\ArticleServices\IndexArticleService;
use App\Services\ArticleServices\ShowArticleService;
use App\Services\ArticleServices\CreateArticleService;
use App\Services\CommentServices\ShowCommentsService;

class ArticlesController
{
    public function index()
    {
        $indexArticles = new IndexArticleService();
        $articles = $indexArticles->execute();

        return require_once __DIR__  . '/../Views/ArticlesIndexView.php';
    }

    public function show(array $vars)
    {
        $showArticle = new ShowArticleService();
        $article = $showArticle->execute((int) $vars['id']);

        $showComments = new ShowCommentsService();
        $comments = $showComments->execute($article->id());

        return require_once __DIR__  . '/../Views/ArticlesShowView.php';
    }

    public function delete(array $vars)
    {
        $deleteArticle = new DeleteArticleService();
        $deleteArticle->execute((int)$vars['id']);

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

        $createArticle = new CreateArticleService();
        $createArticle->execute($title, $content);

        header('Location: /');
    }
}