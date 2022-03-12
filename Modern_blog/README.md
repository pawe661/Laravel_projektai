1. Sukurti naują Laravel projektą. Įtraukti autentifikacijos modulį.
2. Sukurti modelius:
   Article
   ID
   title
   description
   type_id

   Type
   ID
   title
   description

Turi būti sudarytas ryšys.
3. Tiek Article, tiek Type reikalingas tik index.blade.php failas.
4. Visos CRUD operacijos turi būti suprogramuotos taip:
    + Naujų įrašų pridėjimas vykdomas per iššokantį langą su AJAX. Įrašai prisideda realiu laiku.
    Įrašų redagavimas vykdomas per iššokantį langą su AJAX.
    + Įrašų trynimas vykdomas su Ajax. Įrašai išsitrina realiu laiku.
    'Show' mygtukas atvaizduoja informaciją apie įrašą iššokančiame lange su AJAX.

1. Patobulinti įrašų redagavimą: įrašų redagavimas turi atsinaujinti realiu laiku.
2. Tiek Article, tiek Type, sukurti Ajax paiešką, lentelė atsinaujina realiu laiku, jei nerasta įrašų, turi iššokti pranešimas, kad įrašų nėra.
3. Tiek Article, tiek Type, sukurti Ajax rikiavimą.
4. Prie Article rikiavimo prijungti Ajax filtravimą pagal Type.
5. Patobulinti įrašų pridėjimą taip, kad jeigu tuo metu yra rikiuojama lentelė, įrašas atsirastų ne lentelės pabaigoje, o pagal esamą rikiavimą.
6. Įtraukti AJAX validacijas. Validacijos taisyklės taikomos savo nuožiūra
7. Suprogramuoti kelių įrašų ištrynimą vienu metu.