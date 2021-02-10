## Installation

```bash
git clone git@github.com:zeshan77/square1-trial.git

cd square1-trial

composer install

cp .env.example .env # Set DB credentials

php artisan key:generate

php artisan migrate

php artisan db:seed # For creating system user

php artisan queue:listen # For importing blog posts

php artisan serve # Start browsing

```

### Further improvements

- Use rich text editor for storing/showing blog contents
- Validate and sanitize data coming from third party endpoints
- There should be a way to filter out duplicate blogs coming from third party endpoints, in order to avoid duplicates
- To efficiently use third party endpoint, there should be an ability to fetch only new blogs not the ones we already stored
- Use redis for cache, I used file based cache that laravel comes with by default


