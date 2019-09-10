## Local Development

- 
   ```bash
   $ git clone https://github.com/a-golosnyak/20blogvue.git
   ```

-
   ```bash
   $ cp .env.example .env
   ```
1. Create database.
1. Install the dependencies with [Composer](https://getcomposer.org/).

   ```bash
   $ composer install
   ```

1. Generate an `APP_KEY`.

   ```bash
   $ php artisan key:generate
   ```

1. Start the server.

   ```bash
   $ php artisan serve
   ```

