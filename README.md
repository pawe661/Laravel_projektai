# Laravel_projektai

022-02-05 Laravel užduotis

1. Sukurti naują Laravel projektą.
2. Įtraukti autentifikacijos modulį.
3. Sukurti modelį Product
id
title(string)
description(longText)
price(float). Nustatyti kodu $table->float('price', 8, 2)
category_id(unsignedBigInteger)
image_url(string)
4. Sukurti modelį ProductCategory
id
title(string)
description(longText)
5. Sudaryti ryšį: Product.category_id -> ProductCategory.id(Produktas priklauso kategorijai)
6. Užpildyti kategorijas 3 netikromis kategorijomis.
7. Užpildyti 150 netikrų produktų. Paveiksliukams naudoti $this->faker->imageUrl().
8. Produktams sukurti index.blade.php, create.blade.php, edit.blade.php ir sukurti pagal šiuos vaizdus CRUD operacijas.
Turi būti galimybė įkelti paveiksliuką.
9. Kategorijoms sukurti index.blade.php, create.blade.php, edit.blade.php ir sukurti pagal šiuos vaizdus CRUD operacijas.
10. Produktams sukurti rikiavimą TIK pagal kategorijos pavadinimą.
11. Produktams sukurti filtravimą pagal kategoriją.
12. Sukurti kategorijų rikiavimą pagal visus stulpelius(id, title, description)
