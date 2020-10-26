<?php

declare(strict_types=1);

namespace App\Models;

class Comment
{
    private int $id;
    private string $article_id;
    private string $name;
    private string $content;
    private string $createdAt;

    public function __construct(
        int $id,
        string $article_id,
        string $name,
        string $content,
        string $createdAt
    ) {
        $this->id = $id;
        $this->article_id = $article_id;
        $this->name = $name;
        $this->content = $content;
        $this->createdAt = $createdAt;
    }

    public function id(): int
    {
        return $this->id;
    }

    public function article_id(): string
    {
        return $this->article_id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function content(): string
    {
        return $this->content;
    }

    public function createdAt(): string
    {
        return $this->createdAt;
    }
}
