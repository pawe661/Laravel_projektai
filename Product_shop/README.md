022-02-05 Laravel užduotis

Sukurti naują Laravel projektą.
Įtraukti autentifikacijos modulį.
Sukurti modelį Product id title(string) description(longText) price(float). Nustatyti kodu $table->float('price', 8, 2) category_id(unsignedBigInteger) image_url(string)
Sukurti modelį ProductCategory id title(string) description(longText)
Sudaryti ryšį: Product.category_id -> ProductCategory.id(Produktas priklauso kategorijai)
Užpildyti kategorijas 3 netikromis kategorijomis.
Užpildyti 150 netikrų produktų. Paveiksliukams naudoti $this->faker->imageUrl().
Produktams sukurti index.blade.php, create.blade.php, edit.blade.php ir sukurti pagal šiuos vaizdus CRUD operacijas. Turi būti galimybė įkelti paveiksliuką.
Kategorijoms sukurti index.blade.php, create.blade.php, edit.blade.php ir sukurti pagal šiuos vaizdus CRUD operacijas.
Produktams sukurti rikiavimą TIK pagal kategorijos pavadinimą.
Produktams sukurti filtravimą pagal kategoriją.
Sukurti kategorijų rikiavimą pagal visus stulpelius(id, title, description)