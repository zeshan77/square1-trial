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

## To import blog posts
Posts can be imported in two ways:
#### Via UI
1. Add end point to your user profile by clicking on 'Profile' from the dropdown in top-right menu item.
2. Go to Posts section and click on 'Import Posts' link

_Queue needs to be running in order to process posts._

#### Via artisan command
1. Follow step 1 in 'Via UI'
2. Run this artisan command from the projects' root folder in terminal: ```php artisan import-posts {userID}```

Replace `{userID}` with id in `users` table of the user.

### Further improvements

- Use rich text editor for storing/showing blog contents
- Validate and sanitize data coming from third party endpoints
- There should be a way to filter out duplicate blogs coming from third party endpoints, in order to avoid duplicates
- To efficiently use third party endpoint, there should be an ability to fetch only new blogs not the ones we already stored
- Use redis for cache, I used file based cache that laravel comes with by default


