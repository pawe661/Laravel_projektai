1. + Sukurti naują Laravel projektą, pavadinti "blogosistema".
2. + Instaliuoti autentifikacijos modulį.
3. + Suprojektuoti du modelius patiems: Category ir Post, 
    + kiekvienas modelis turi tureti bent 3 sugalvotus laukus, 
    + ryšys: Category hasMany Post.
4. + Sukurti modeliams factory ir seeder savo nu0žiūra.
5. + Sukurti visas bazines CRUD operacijas tiek Category, tiek Post.
6. + Tiek Category, tiek Post turi būti rikiuojami su rikiavimo moduliu.
7. + Post turi būti galimybė filtruoti pagal kategoriją.
8. + Puslapiavimą suprogramuoti Post modeliui.
9. + Sukurti atskirą Post kūrimo formą, kurioje galima kartu sukurti ir tam Postui naują kategoriją.
10. + Sukurti atskirą Category kūrimo formą, kurioja galima sukurti naujų Post. Post turi būti galimybė pasirinkti n+1.
11. + Atsidarius Category per show, turi būti rodomi visi kategorijai priklausantys Post lentelėje.

+
1. + Sukurti modelį Owner:
    ID - BigInt
    name - string(255)
    surname - string (255)
    email - string(255)
    phone - string(255)
2. + Sukurti modelį Task:
    title - string
    description - string
    start_date - date
    end_date - date
    logo - string
    owner_id - unsignedBigInteger
3. + Task modelį papildyti laukeliu owner_id ir sukurti ryšį. Prie kiekvieno Task index.blade.php     lentelėje turi atvaizduoti Owner vardą ir pavardę. Pagal Owner turi būti galima rikiuoti Tasks.
4. Sukurti visas Owner CRUD operacijas.
5. Pridėti visų sukurtų laukelių validacijas:
    + tasks.title - privalomas, tik lotyniškos raidės, maksimalus simbolių kiekis 225, minimalus 6
    + tasks.description - privalomas, maksimalus simbolių kiekis 1500
    + tasks.start_date - privalomas, datos formatas
    tasks.end_date - privalomas, datos formatas, vėlesnė nei tasks.start_date
    ??? tasks.owner_id - skaičius daugiau už 0, privalomas
    tasks.logo - pavieksliukas
    + owners.name - privalomas, tik lotyniškos raidės, maksimalus simbolių kiekis 15, minimalus 2
    + owners.surname - privalomas, tik lotyniškos raidės, maksimalus simbolių kiekis 15, minimalus 2,
    +? owners.email - privalomas, patikrinti ar tai tikrai elektroninis paštas.
    +? owners.phone - privalomas, patikrinti ar numeris lietuviško formato, maksimalus simbolių kiekis - tiek, kiek lietuviško formato numeris gali turėti.