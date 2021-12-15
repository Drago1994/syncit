
- frontend je radjen u Angularu i pokrece se lokalno na portu 4200 komandom (iz frontend direktorijuma):
	
	ng serve -o 

	sifra: admin
	lozinka: admin

	Sva polja forme moraju biti popunjena kako bi se otkjucalo dugme save.
	Pritiskom na dugme reset, vraca se stanje sa servera.


- backend je laravel api, komanda za pokretanje:
	
	php artisan serve --PORT=4000

	rute:

	GET /api/getContacts -->  ContactController@getContacts

	POST /api/login -->  AuthController@login

	POST /api/save -->  ContactController@save


- baza je MySQL server sa semom pod nazivom test. Tabele sam kreirao sa migracijama, a popunio sa DatabaseSeeder-om.

	php artisan migrate:reset

	php artisan migrate:refresh --seed



