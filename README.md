# Bayerische Ferien

Dies ist die Datengrundlage für https://projects.kkapsner.de/Kalender/BayerischeFerien/

## optionale Parameter

### type

Rückgabetyp der Feriendatei. Mögliche Werte:

* ics (Standardwert)
* txt: Rohdatendatei
* csv
* json

Beispiel: https://projects.kkapsner.de/Kalender/BayerischeFerien/?type=json

### noCache

Die reine Anwesenheit dieses Parameters schaltet den Cache aus

### separator

Separator der CSV-Datei. Sollte immer in Zusammenhang mit [noCache](#noCache) verwendet werden.

Beispiel: https://projects.kkapsner.de/Kalender/BayerischeFerien/?type=csv&noCache&separator=;

## Quellen

* [Kultusministerkonferenz](https://www.kmk.org/service/ferien.html)
* [Bayerisches Kultusministerium](https://www.km.bayern.de/ministerium/termine/ferientermine.html)