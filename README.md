Aby uruchomić projekt należy:
1. pobrać projekt z zdalnego repo
2. pobrać paczki i zależności komendą composer require install
3. wykonać migracje php bin/console doctrine:migrations:migrate
4. utworzyć użytkowników php bin/console doctrine:fixtures:load                                   
login i hasło uzytkownik1: admin@wp.pl, 1234456
login i hasło uzytkownik2: admintestowy@wp.pl, 1234456
5. aby uruchomić chat na 2 oknach uruchomić w tle  php bin/console run:websocket-server                                      
