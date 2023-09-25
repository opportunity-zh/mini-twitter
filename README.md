# Mini Twitter
Laravel Mini Twitter Vorlage, zum vereinfachten Einstieg ins Projekt.

[Dokumentation](https://laravel.com/docs)  
[Installationsanleitung](https://laravel.com/docs/#getting-started-on-linux)  
[Laravel-Bootcamp](https://bootcamp.laravel.com/)

## Installation

### 1. Framework herunterladen und in VS-Code öffnen
1. im Terminal mit dem Befehl **cd** in den **Documents** Ordner navigieren
2. folgenden Befehl kopieren, einfügen und mit Enter bestätigen

```bash
curl -s "https://laravel.build/mini-twitter" | bash
```

3. In den Projekt-Ordner navigieren
```bash
cd mini-twitter
```

4. Projekt öffnen und Struktur anschauen
```bash
code .
```

### 2. VS Code vorbereiten
Zu den Extensions navigieren (Ctrl + Shift + X)
1. Live Server Extension **deaktivieren**
2. PHP Server Extension **deaktivieren**


### 3. Docker vorbereiten
1. In VS-Code zu **Terminal - New Terminal** navigieren
2. Folgenden Befehl eingeben, um laufende Prozesse anzuschauen (docker process status)
```bash
docker ps
```
3. Wenn laufende Prozesse angezeigt werden, mit folgendem Befehl stoppen (containerId1 durch die angezeigte ID ersetzen)
```bash
docker stop <containerId1> <containerId2>
```
4. Wenn Du alle Container auf einmal stoppen möchtest:
```bash
docker stop $(docker ps -a -q) 
```

### 4. Projekt um PHP My Admin erweitern
1. Im Projekt das File **docker-compose.yml** öffnen
2. Folgende Zeilen hinzufügen unter **selenium**
3. WICHTIG: phpmyadmin muss auf derselben Höhe sein wie selenium, die Zeilen müssen genau so eingerückt sein, wie hier zu sehen
```yaml
phpmyadmin:
    image: phpmyadmin/phpmyadmin:5
    ports:
        - 8080:80
    links:
        - mysql
    environment:
        PMA_HOST: mysql
        PMA_PORT: 3306
    depends_on:
        mysql:
            condition: service_healthy
    networks:
        - sail
```

### 5. Projekt aufstarten
1. Im VS-Code Terminal öffnen
2. Folgenden Befehl kopieren und einfügen
```bash
./vendor/bin/sail up
```
3. Bei Error hier klicken:[Fehlerbehebungen](#Fehlerbehebungen)


### 6. WebApp in Browser öffnen
Kopiere folgende Zeile in die URL-Bar im Browser
```bash
localhost
```

### 7. Vite verwenden
Vite ist ein **Buildtool**, dass Dir dabei hilft, mit Frontendservices zu arbeiten. Laravel verwendet Vite standardmässig. Mit vite können beispielsweise PostCSS oder SASS/SCSS nahtlos integriert werden.

1. Installiere die Node-Packages
```bash
npm install
```
2. Um Deine CSS Datei zu verlinken, kannst Du folgende Directive in den **head-Tag** in Dein HTML File kopieren:  
```html
@vite('resources/css/app.css')
```
3. Öffne ein neues Terminalfenster
4. Starte vite mit folgendem Befehl
```bash
npm run dev
```
5. Öffne die Datei /resources/css/app.css füge folgende Zeile hinzu
```css
body{
    background-color: yellow;
}
```
6. Öffne Dein Projekt im Browser und schaue, ob der Hintergrund gelb ist


    
#### 7.1 SASS/SCSS mit Vite verwenden
SASS ist eine **Preprocessor** für CSS und ermöglicht es Dir diverse Funktionen zu integrieren, die Dir CSS nicht zur Verfügung stellt. Du kannst SASS folgendermassen in Deinem Projekt verwenden:

1. Navigiere mit dem Terminal in Dein Projekt
2. Beende den Docker-Process
```bash
sail down
```
3. Installiere den SASS Compiler mit Hilfe von node.js
```bash
npm add -D sass
```
4. Erstelle einen neuen Unterordner im Ordner recources und nenne ihn **scss**
5. Füge eine Datei hinzu und nenne diese **app.scss**
6. Öffne die Datei **vite.config.js** und ersetze die Zeile **input** mit folgender Zeile
```js
input: ['resources/scss/app.scss', 'resources/js/app.js'],
```
7. Ändere das im head hinzugefügte Snippet in
```html
@vite('resources/scss/app.scss')
```
8. Starte Deinen Docker-Container (sail up)
9. Öffne die Datei /resources/scss/app.scss und teste ob es funktioniert, indem Du folgende Zeile hinzufügst
```css
body{
    background-color: yellow;
}
```
10. Starte vite mit folgendem Befehl
```bash
npm run dev
```


Weitere Features findest Du [hier](https://vitejs.dev/guide/features.html)


### 8. Laravel Breeze installieren
Breeze ist ein Laravel Starter-Kit, das Dir eine Loginfunktionalität zur Verfügung stellt. Breeze kann mit verschiedenen FrontEnd Frameworks verwendet werden. Wir verwenden Breeze mit Blade.
1. Applikation stoppen
```code
sail down
```
2. Breeze herunterladen
```bash
composer require laravel/breeze --dev
```
2. Breeze installieren
```bash
php artisan breeze:install
```
3. Migriere
```code
php artisan migrate
```
4. NPM Packges installieren
```bash
npm install
npm run dev
```

[Mehr lesen](https://laravel.com/docs/10.x/starter-kits#breeze-and-blade)

## Sail als Alias in .bashrc speichern
Die .bashrc-Datei ist eine Skriptdatei, die ausgeführt wird, wenn sich ein Benutzer anmeldet. Die Datei selbst enthält eine Reihe von Konfigurationen für Terminalsessions.

1. Befehl kopieren und eingeben - es öffnet sich das .bashrc-File
```bash
code ~/.bashrc
```
2. Nach unten scrollen und folgende Zeilen in das File kopieren. Damit kann man von überall im Terminal mit der Eingabe von **sail** das von Laravel zur Verfügung gestellte Skript ausführen.
```bash
alias sail='bash vendor/bin/sail'
```
3. File speichern und schliessen
4. Folgenden Befehl im Terminal eingeben und mit Enter bestätigen. Damit werden die Änderungen im .bashrc File übernommen.
```bash
source ~/.bashrc
```


## Artisan Console
Laravel hilft Dir als Entwickler in vielen Bereichen. Es bietet Dir eine CLI (Commanline Interface), damit Du gewisse Tasks schneller und einfacher ausführen kannst. Beispielsweise Projektdateien erzeugen, die Datenbank aufzubauen, usw.  

Mit folgendem Befehl, kannst Du Dir die Liste aller möglichen Befehle / Hilfestellungen, die Dir die Artisan Console zur Verfügung stellt, anzeigen lassen:

```bash
sail artisan list
```

## PHP My Admin
PHP My Admin ist ein GUI für die Datenbank. Es zeigt Dir gespeicherte Daten visuell an.

1. Öffne PHP My Admin im Browser, indem Du folgende Zeilen in die URL-Bar kopierst
```bash
localhost:8080/
```
2. Logge Dich ein. Du findest die Zugangsdaten in Deiner **.env** Datei unter **DB_USERNAME** und **DB_PASSWORD**
   

## Simple Debugging
Es gibt verschiedene Möglichkeiten, Fehler in Deiner Applikation zu finden. Hier eine der einfachsten, die dem **console.log()** von Javascript entspricht:
```php
dd();
```

## Model
Das Model ist die Abbildung eines einzelnen Tweets in der Datenbank als PHP-Klasse / Objekt.

Mit folgendem Befehl kannst Du ein Model erstellen:
```bash
sail artisan make:model Tweet
```

### Daten lesen
Die Model Klasse bietet Dir verschiedene Methoden, die Daten aus der Datenbank zu holen. Du kannst entweder viele Daten oder eine einzelne Zeile aus der Datenbank laden. Hier findest Du mehr Informationen:  

[Mehr lesen](https://laravel.com/docs/10.x/eloquent#retrieving-single-models)  


### Daten schreiben
Auch hier bietet die von Laravel zur Verfügung gestellte Model Klasse einige Methoden an. Schau hier, was Du brauchst, um einen Eintrag in der Datenbank zu machen:  

[Mehr lesen](https://laravel.com/docs/eloquent#inserts)


## Blade Template Engine (Views)
Mit **Blade** kannst Du Daten in der View auf einfache Weise darstellen. Dabei helfen die Blade Directives, die Mustache-Syntax, das Layouting und die Components.

[Mehr lesen](https://laravel.com/docs/blade#displaying-data)


## Formular Handling Basics
Um korrekt mit Formularen umzugehen sind folgende Dinge wichtig:

### Form Tag
Alle Inputfelder müssen sich **innerhalb eines Form-Tags <form></form>** befinden.

### Action Attribut im Form Tag
Hier wird bestimmt, an welche Route in Deiner Applikation die Formulardaten gesendet werden.

### Method Attribut im Form Tag
Bei Formularübertragungen ist es ratsam, dass die **POST** Methode verwendet wird.

### CSRF-Token
Laravel bietet die automatische Sicherheitsfunktion mit einem CSRF-Token. Dieser **muss** mit **@csrf** im Formular integriert werden.

### Inputfelder
Alle Inputfelder müssen einen eindeutigen (uniquen) Namen haben. Dieses Attribut fügst Du mit **name="xyz"** hinzu. Dies kannst Du Dir dann als Key für die Daten, die Du eingibst vorstellen.

### Button
Der Button muss vom Type Submit sein, sonst wird das Formular nicht abgeschickt. Das kann mit **type="submit"** definiert werden.

## Form Validation Basics
Laravel bietet Dir einen **Validator** und die passende **Blade Directive** zur Anzeige von Fehlermeldungen an. Eine Validation dient dazu,
**leeren bzw. falschen Inhalte** zu erkennen.

Eine Validation funktioniert folgendermassen:
1. **Request** mit den Daten kommt vom Formular und trifft auf die **store** Methode im Controller
3. Die Daten im Request werden überprüft (validiert)
4. Sind die Daten korrekt, werden die Daten in der Datenbank gespeichert
5. Sind die Daten nicht korrekt, speichert Laravel die geeigneten Fehlermeldungen in der Variabel **$message**
6. Und sendet diese Variabel **automatisch an die View zurück**
7. In der View kann dieser Fehler dann mit der Blade Directive **@error()** angezeigt werden

[Mehr lesen](https://laravel.com/docs/10.x/validation#quick-writing-the-validation-logic)


## Success Messages
Wenn ein Tweet erstellt wurde, soll das dem User mitgeteilt werden. Dazu verwenden wir sogenannte **Flashed Session Data**. 

[Mehr lesen](https://laravel.com/docs/10.x/redirects#redirecting-with-flashed-session-data)

# Zusatzaufgaben

## Design
Setze das Design mit CSS um: [Figma-Link](https://www.figma.com/file/3AO216bDpIIubHvfAtRqCI/Mini-Twitter?type=design&node-id=0%3A1&mode=design&t=K50G3jKewPXp1oC5-1)


## Users
1. Erstelle einen User in der User Tabelle. Nutze dazu **sail artisan tinker**. Wie Tinker funktioniert kannst Du [hier](https://laravel.com/docs/10.x/artisan#usage) nachlesen
2. Erstelle eine neue Migration, um der Tabelle **tweets** einen [Foreign Key](https://laravel.com/docs/10.x/migrations#foreign-key-constraints) zu der User-Tabelle hinzuzufügen
3. Führe die Migration aus



# Fehlerbehebungen

## Docker daemon läuft nicht
Docker wurde nicht aufgestartet. Dann folgenden Befehl im Terminal eingeben

### Lösung
```bash
sudo systemctl start docker
```


## Ports besetzt
Wenn man mit Docker arbeitet, kann es vorkommen, dass gewisse Ports bereits von anderer Software besetzt ist.
Damit diese Ports von Docker verwendet werden können, müssen sie von Dir als Entwickler **freigegeben** werden.


```diff
! Error starting userland proxy: listen tcp4 0.0.0.0:3306: bind: address already in use
```
Dieser Error sagt Dir, dass der Port **3306** bereits verwendet wird.


```diff
! Error starting userland proxy: listen tcp4 0.0.0.0:80: bind: address already in use
```
Dieser Error sagt Dir, dass der Port **80** bereits verwendet wird.  


### Lösung
Damit das Problem nicht mehr eintritt, musst Du die **Ports wieder freigeben**:
1. Nachschauen, welcher Service auf den Port benutzt. Folgende Zeile ins Terminal kopieren und **PORT** durch die Portnummer ersetzen.
```bash
sudo netstat -laputen | grep ':PORT'
```
2. Dies gibt Dir eine "Tabelle" von Services aus, die den Port verwenden. An letzter Stelle steht dann etwas wie: **1010/mariadbd**
3. Dies ist der Service inkl. seiner **PROCESS-ID** (in diesem Fall 1010), welcher den Port besetzt
4. Diesen Service musst Du nun stoppen. Das machst Du mit folgendem Befehl (PROCESS-ID durch die Prozess ID ersetzen)
```bash
sudo kill PROCESS-ID
```

## Found orphan containers
Du erhältst den Fehler "Found orphan containers", weil mit dem Befehl docker-compose wurden container gefunden, die zu einem anderen Projekt mit demselben Namen gehören.

```diff
! WARN[0000] Found orphan containers ([first-laravel-phpmyadmin-1]) for this project. If you removed or renamed this service in your compose file, you can run this command with the --remove-orphans flag to clean it up. 
```
### Lösung
Kopiere folgenden Befehl in Dein Terminal
```bash
./vendor/bin/sail down --remove-orphans
```

## Probleme mit Ordner-Permission
Wenn Dein Projektordner ein rotes Schlösschen besitzt, wurde dieser als root User erstellt und nicht als Deinen User. Du hast deshalb keine Berechtigung Änderungen darin vorzunehmen. Damit Du diese Berechtigung erhältst, muss Du folgendes machen:

### Lösung
1. Öffne das Terminal und navigiere in den Projektordner
2. Gib folgende Zeile ein, um die Permissions zu ändern
```bash
sudo chmod 777 -R .
```









