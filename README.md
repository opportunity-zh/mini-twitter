# Mini Twitter
Laravel Mini Twitter Vorlage

[https://laravel.com/docs/10.x/sail](https://laravel.com/docs/10.x/installation#getting-started-on-macos)


## Installation

### 1. Framework herunterladen und in VS-Code öffnen
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


### 4. Projekt aufstarten
1. Im VS-Code Terminal öffnen
2. Folgenden Befehl kopieren und einfügen
```bash
./vendor/bin/sail up
```

### Fehlerbehebungen

#### Ports besetzt
Wenn man mit Docker arbeitet, kann es vorkommen, dass gewisse Ports (oft MySQL oder Apache) bereits von anderer Software besetzt ist.
Damit diese Ports von Docker verwendet werden können, müssen sie von Dir als Entwickler freigegeben werden.


```diff
! Error starting userland proxy: listen tcp4 0.0.0.0:3306: bind: address already in use
```
Dieser Error sagt Dir, dass der Port **3306** bereits verwendet wird.


```diff
! Error starting userland proxy: listen tcp4 0.0.0.0:80: bind: address already in use
```
Dieser Error sagt Dir, dass der Port **80** bereits verwendet wird.  


#### LÖSUNG
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

## Zusatzoptionen
### Sail als Alias in .bashrc speichern
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
source ~/. bashrc
```









