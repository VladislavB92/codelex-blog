# Codelex blog

A news/blog page with the following functionality:
- adding article;
- editing the article;
- deleting the article;
- comment article with the nickname;
- log in as an author.

All data is stored in a database.


Dev setup
```
git clone git@github.com:Kemito/codelex-blog.git
composer install
copy .env.example to .env
fill in .env with your configuration values
create new database
import sql/db.sql into your database
php -S localhost:8000
```
