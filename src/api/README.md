## Create New API

Create table

1. php artisan make:migration create_categories_table
2. php artisan migrate

3. php artisan make:model Category
4. php artisan make:controller CategoryController
5. php artisan make:resource CategoryResourse
6. php artisan ide:models
7. add route to api.php

Create Data Test

1. php artisan make:seeder CategorySeeder
2. php artisan make:factory CategoryFactory
3. php artisan db:seed --class=CategorySeeder

Remove data in DB

1. php artisan mgirate:fresh //do not do this on real DB

Check Route
php artisan route:list
