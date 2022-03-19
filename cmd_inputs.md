<!-- Sukurti naują Laravel prijektą -->
composer create-project laravel/laravel Projekto_pavadinimas

<!-- Sukurti Modelius  -->
php artisan make:model Author --all

<!-- Kurti Modelius dalimis migration ir factory -->
php artisan make:model Client -m -f

<!-- API controler -->
php artisan make:controller ClientController --api

<!-- Migruoti DB strukturą  -->
php artisan migrate:fresh

<!-- uzpildyti duomenim DB -->
php artisan migrate:fresh --seed

<!-- paleisti local host -->
php artisan serve

<!-- Iš artisan prideda laravel ui -->
composer require laravel/ui

<!-- Iš artisan įrašo autorizacijos ui modulį -->
php artisan ui vue --auth

<!-- instaliuoja  -->
npm install

<!-- compiler -->
npm run dev

<!-- Jeigu Compiler meta error pakeisti package.json "vue-loader": "^15.9.8" 
ir ištrinti package-lock.json ir node_modules aplanką-->
npm install
npm run dev

<!-- Parodo visus routes ir jų metodus -->
php artisan route:list

<!-- Rušiavimo biblioteka -->
composer require kyslik/column-sortable
<!-- su juo reikia pridėti modulį prie config app.php -->
Kyslik\ColumnSortable\ColumnSortableServiceProvider::class
<!--  pagamina config aplanke nustatymų dokumentą-->
php artisan vendor:publish --provider="Kyslik\ColumnSortable\ColumnSortableServiceProvider" --tag="config"

<!-- Faker aprašas  -->
https://fakerphp.github.io/formatters/

<!-- jQuery biblioteka -->
<!-- Įdedamas į app.blade head, 13 eilutėje ištrinti defer <script src="{{ asset('js/app.js') }}" defer></script> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>




