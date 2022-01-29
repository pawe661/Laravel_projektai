<!-- Sukurti naują Laravel prijektą -->
composer create-project laravel/laravel Projekto_pavadinimas

<!-- Sukurti Modelius  -->
php artisan make:model Author --all

<!-- Profilio ir profilio vaizdo moduliai -->
php artisan make:model Profile -- all
php artisan make:model ProfileImage -- all

<!-- Migruoti DB strukturą  -->
php artisan migrate:fresh

<!-- paleisti local host -->
php artisan serve

<!-- Iš artisan prideda laravel ui -->
composer require laravel/ui

<!-- Iš artisan įrašo autorizacijos ui modulį -->
php artisan ui vue --auth

<!-- instaliuoja  -->
npm install

<!-- compiler -->
<!-- Jeigu Compiler meta error pakeisti package.json ir ištrinti ... -->
npm run dev



