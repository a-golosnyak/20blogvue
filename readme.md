## Local Development

- 
   ```bash
   $ git clone https://github.com/a-golosnyak/20blogvue.git
   ```

-
   ```bash
   $ cp .env.example .env
   ```

1. Install the dependencies with [Composer](https://getcomposer.org/).

   ```bash
   $ composer install
   ```

1. Generate an `APP_KEY`.

   ```bash
   $ php artisan key:generate
   ```
1. Create database named as in .env.
1. Create tables and fill them.

   ```bash
   $ php artisan migrate:fresh --seed
   ```
1. Create encryption keys for Passport.
   
      ```bash
      $ php artisan passport:install
      ```
1. Start the server.

   ```bash
   $ php artisan serve
   ```

1. Start development server.

   ```bash
   $ yarn watch
   ```
