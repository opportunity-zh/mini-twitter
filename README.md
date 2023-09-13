# Mini Twitter
Laravel Mini Twitter Vorlage

[https://laravel.com/docs/10.x/sail](https://laravel.com/docs/10.x/installation#getting-started-on-macos)


## Installation

### Framework herunterladen und in VS-Code öffnen
1. im Terminal mit dem Befehl **cd** in den **Documents** Ordner navigieren
2. folgenden Befehl kopieren, einfügen und Enter drücken

```bash
curl -s "https://laravel.build/mini-twitter" | bash
```

3. In den Projekt-Ordner navigieren
```bash
cd mini-twitter
```

4. Projekt öffnen
```bash
code .
```

### VS Code vorbereiten
1. Live Server Extension **deaktivieren**
2. PHP Server Extension **deaktivieren**


### Docker vorbereiten
1. In VS-Code zu **Terminal - New Terminal** navigieren
2. Folgenden Befehl eingeben, um laufende Prozesse anzuschauen (docker process status)
```bash
docker ps
```
3. Wenn laufende Prozesse angezeigt werden, mit folgendem Befehl stoppen (containerId1 durch die angezeigte ID ersetzen)
```bash
docker stop <containerId1> <containerId2>
```

4. Folgenden Befehl kopieren und einfügen
```bash
./vendor/bin/sail up
```
