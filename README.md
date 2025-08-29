## Installation

1. Clone the repository.
2. Enter docker folder `cd docker`
3. Run `docker compose up -d` to start the containers.
4. Run `docker compose exec -it php-fpm composer install` to install dependencies.
5. Run `docker compose exec -it php-fpm composer run-script post-root-package-install` and `docker compose exec -it php-fpm composer run-script post-create-project-cmd` to initialize a project.
6. Run `docker compose exec -it php-fpm php artisan migrate:fresh --seed` to run migrations.

## API Documentation

- **/src/docs**: Postman documentation