
<!-- Sukurti naują Laravel prijektą -->
composer create-project laravel/laravel Projekto_pavadinimas

<!-- Sukurti Modelius  -->
php artisan make:model Author --all

<!-- Migruoti DB strukturą  -->
php artisan migrate:fresh

<!-- paleisti local host -->
php artisan serve

<!-- Seed the application's database.  komanda -->
php artisan migrate:fresh --seed


https://fakerphp.github.io/formatters/