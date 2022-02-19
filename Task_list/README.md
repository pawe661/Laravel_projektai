1. Sukurti naują Laravel projektą.
2. Įtraukti autentifikacijos modulį.
3. Sukurti modelį TaskStatus:
   id
   title(string)
4. Sukurti modelį Task:
   id
   title(string)
   description(longText)
   status_id(unsignedBigInteger)
5. Sukurtį modelį PaginationSetting:
   id
   title(string)
   value(bigInteger)
   visible(tinyInteger)
6. Sudaryti ryšį Task.status_id -> TaskStatus.id
7. Sukurti 3 TaskStatus seeder dokumente:
   id    title    
   1     Completed
   2     On Hold
   3     Started
8. Sukurti 200 netikrų Task
9. PaginationSetting užpildyti tokiais duomenimis:
   id     title    value    visible
   1       15        15        1
   2       20        20        0
   3       30        30        1
   4       All       1         1

10. Sukurti tik Task index.blade.php. Jame sukurti formą, kurioje galima pasirinkti rikiavimo stulpelį, rikiavimo tvarką,
filtruoti pagal užduoties statusą ir pasirinkti, kiek įrašų rodyti per puslapį.(Tokia pati forma, kokią sukūrėme paskaitų metu)

P.S Visų CRUD operacijų kurti nereikia, reikalingas tik Task index.blade.php dokumentas    

+++

1. PaginationSetting modelį papildyti stulpeliu "default_value". Stulpelio tipas - tinyInteger. Galimos reikšmės 1 arba 0.
2. Tik vienas iš visų įrašų gali turėti reikšmę 1, kiti turi būti 0. Tai surašyti tiesiog ranka, arba sukurti CRUD operacijas
PaginationSettings, kur galima nustatyti, kuris parametras numatytasis.
3. Task index.blade.php, pagal tai, kurio įrašo iš PaginationSetting "default_value" vertė yra 1,
atvaizduoti įrašus. Pvz.: nustatymas,kuris rodo 30 įrašų, turi default_value = 1, jis yra numatytasis, ir užkrovus Task index.blade.php turi būti pažymėta 30, ir 30 įrašų rodyti puslapyje
4. Sukurti Task index.blade.php kopiją indexsortable.blade.php
5. Instaliuoti rikiavimo modulį. Instaliavimo intstrukcija šeštadienio paskaitos įrašas.
6. Task indexsortable.blade.php turi veikti identiškai kaip ir index.blade.php(rikiavimas, filtravimas, puslapiavimas, įrašų pus
lapyje pasirinkimas), tačiau rikiavimo veiksmą turi atlikti rikiavimo modulis.