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
3. Visos CRUD operacijos turi būti suprogramuotos taip:
    + Naujų įrašų pridėjimas vykdomas per iššokantį langą su AJAX. Įrašai prisideda realiu laiku.
    Įrašų redagavimas vykdomas per iššokantį langą su AJAX.
    + Įrašų trynimas vykdomas su Ajax. Įrašai išsitrina realiu laiku.
    'Show' mygtukas atvaizduoja informaciją apie įrašą iššokančiame lange su AJAX.
Papildoma:
 Suprogramuoti kelių įrašų ištrynimą vienu metu.