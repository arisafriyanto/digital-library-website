<h1 align="center">Digital Library</h1>

Welcome to our Digital Library! Enjoy an enjoyable reading experience with our diverse and high-quality digital book collection. Here, you can explore and discover a wide range of books from various genres, from fiction to non-fiction, from children's books to scientific publications.

Start your journey through the world of words and knowledge with just one click! Discover new knowledge, compelling stories, and deep insights in the best books we have to offer. Take advantage of the convenience of our platform to access your favorite books anytime, anywhere.

Let's start reading! Choose from various book categories or use the buttons below to directly access shortcuts to books.

> Run the server with the command: `php artisan serve`

## Dependency

-   [Laravel 10](https://laravel.com)
-   [Bootstrap 5](https://getbootstrap.com)
-   [Gravatar](https://id.gravatar.com)
-   [MySQL](https://www.mysql.com)
-   [Laravel Debugbar](https://github.com/barryvdh/laravel-debugbar)
-   [Laravel Excel](https://laravel-excel.com)
-   [Laravel DomPdf](https://github.com/barryvdh/laravel-dompdf)

## Requirements

-   Composer
-   PHP : `^8.1.x`
-   Laravel : `10`
-   MySQL : `^8.0`
-   PHP extension `php_zip` enabled
-   PHP extension `php_xml` enabled
-   PHP extension `php_gd2` enabled
-   PHP extension `php_iconv` enabled
-   PHP extension `php_simplexml` enabled
-   PHP extension `php_xmlreader` enabled
-   PHP extension `php_zlib` enabled

## How to setup and run locally

1. Clone repository with the following command
 <pre>git clone https://github.com/arisafriyanto/digital-library-website.git</pre>
2. Move to the repository directory with the command
 <pre>cd digital-library-website/</pre>
3. Run the following command to install the depedency
 <pre>composer install</pre>
4. Copy the `.env.example` file to `.env`
5. Make sure to fill in the database information, such as database name, username, password and `FILESYSTEM_DISK=public` in the .env file.
   If in development enable `APP_DEBUG=true` and will enable the laravel debugbar
       <pre>
        APP_NAME="Digital Library"
        APP_DEBUG=false
         
        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=digital_library
        DB_USERNAME=root
        DB_PASSWORD=
       
        FILESYSTEM_DISK=public
       </pre>

6. Generate Key app
 <pre>php artisan key:generate</pre>
7. Run this command to create a symbolic link
 <pre>php artisan storage:link</pre>
8. Migrate database
 <pre>php artisan migrate --seed</pre>
9. Run app
 <pre>php artisan serve</pre>

## How do I login?

-   Login admin

    |       E-mail address        | Password |
    | :-------------------------: | :------: |
    | arisafriyanto1933@gmail.com | password |
    |    afriyanfast@gmail.com    | password |

-   Login user

    | E-mail address | Password |
    | :------------: | :------: |
    | user@gmail.com | password |

> Enjoy and bye-bye 🔥👋
