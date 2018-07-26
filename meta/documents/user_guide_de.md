
# User Guide für das ElasticExportSchuheDE Plugin

<div class="container-toc"></div>

## 1 Bei Schuhe.de registrieren

Schuhe.de ist eine Online-Plattform der ANWR Group, die Online-Shops und die realen Standorte des stationären Fachhandels verbindet.

## 2 Das Format SchuheDE-Plugin in plentymarkets einrichten

Mit der Installation dieses Plugins erhalten Sie das Exportformat **SchuheDE-Plugin**, mit dem Sie Daten über den elastischen Export zu Schuhe.de übertragen. Um dieses Format für den elastischen Export nutzen zu können, installieren Sie zunächst das Plugin **Elastic Export** aus dem plentyMarketplace, wenn noch nicht geschehen. 

Sobald beide Plugins in Ihrem System installiert sind, kann das Exportformat **SchuheDE-Plugin** erstellt werden. Mehr Informationen finden Sie auch auf der Handbuchseite [Datenformate für Preissuchmaschinen exportieren](https://knowledge.plentymarkets.com/basics/datenaustausch/export-import/daten-exportieren#30).

Neues Exportformat erstellen:

1. Öffnen Sie das Menü **Daten » Elastischer Export**.
2. Klicken Sie auf **Neuer Export**.
3. Nehmen Sie die Einstellungen vor. Beachten Sie dazu die Erläuterungen in Tabelle 1.
4. **Speichern** Sie die Einstellungen.
→ Eine ID für das Exportformat **SchuheDE-Plugin** wird vergeben und das Exportformat erscheint in der Übersicht **Exporte**.

In der folgenden Tabelle finden Sie Hinweise zu den einzelnen Formateinstellungen und empfohlenen Artikelfiltern für das Format **SchuheDE-Plugin**.

| **Einstellung**                                     | **Erläuterung** | 
| :---                                                | :--- |
| **Einstellungen**                                   | |
| **Name**                                            | Name eingeben. Unter diesem Namen erscheint das Exportformat in der Übersicht im Tab **Exporte**. |
| **Typ**                                             | Typ **Artikel** aus der Dropdown-Liste wählen. |
| **Format**                                          | **SchuheDE-Plugin** wählen. |
| **Limit**                                           | Zahl eingeben. Wenn mehr als 9999 Datensätze an die Preissuchmaschine übertragen werden sollen, wird die Ausgabedatei für 24 Stunden nicht noch einmal neu generiert, um Ressourcen zu sparen. Wenn mehr mehr als 9999 Datensätze benötigt werden, muss die Option **Cache-Datei generieren** aktiv sein. |
| **Cache-Datei generieren**                          | Häkchen setzen, wenn mehr als 9999 Datensätze an die Preissuchmaschine übertragen werden sollen. Um eine optimale Performance des elastischen Exports zu gewährleisten, darf diese Option bei maximal 20 Exportformaten aktiv sein. |
| **Bereitstellung**                                  | **URL** wählen. Mit dieser Option kann ein Token für die Authentifizierung generiert werden, damit ein externer Zugriff möglich ist. |
| **Dateiname**                                       | Der Dateiname muss auf **.csv** oder **.txt** enden, damit schuhe.de die Datei erfolgreich importieren kann. |
| **Token, URL**                                      | Wenn unter **Bereitstellung** die Option **URL** gewählt wurde, auf **Token generieren** klicken. Der Token wird dann automatisch eingetragen. Die URL wird automatisch eingetragen, wenn unter **Token** der Token generiert wurde. |
| **Artikelfilter**                                   | |
| **Artikelfilter hinzufügen**                        | Artikelfilter aus der Dropdown-Liste wählen und auf **Hinzufügen** klicken. Standardmäßig sind keine Filter voreingestellt. Es ist möglich, alle Artikelfilter aus der Dropdown-Liste nacheinander hinzuzufügen.<br/> **Varianten** = **Alle übertragen** oder **Nur Hauptvarianten übertragen** wählen.<br/> **Märkte** = Eine oder mehrere Auftragsherkünfte wählen. Die gewählten Auftragsherkünfte müssen an der Variante aktiviert sein, damit der Artikel exportiert wird.<br/> **Währung** = Währung wählen.<br/> **Kategorie** = Aktivieren, damit der Artikel mit Kategorieverknüpfung übertragen wird. Es werden nur Artikel, die dieser Kategorie zugehören, übertragen.<br/> **Bild** = Aktivieren, damit der Artikel mit Bild übertragen wird. Es werden nur Artikel mit Bildern übertragen.<br/> **Mandant** = Mandant wählen.<br/> **Bestand** = Wählen, welche Bestände exportiert werden sollen.<br/> **Markierung 1 - 2** = Markierung wählen.<br/> **Hersteller** = Einen, mehrere oder **ALLE** Hersteller wählen.<br/> **Aktiv** = Nur aktive Varianten werden übertragen. |
| **Formateinstellungen**                             | |
| **Produkt-URL**                                     | Wählen, ob die URL des Artikels oder der Variante an das Preisportal übertragen wird. Varianten URLs können nur in Kombination mit dem Ceres Webshop übertragen werden. |
| **Mandant**                                         | Mandant wählen. Diese Einstellung wird für den URL-Aufbau verwendet. |
| **URL-Parameter**                                   | Suffix für die Produkt-URL eingeben, wenn dies für den Export erforderlich ist. Die Produkt-URL wird dann um die eingegebene Zeichenkette erweitert, wenn weiter oben die Option **übertragen** für die Produkt-URL aktiviert wurde. |
| **Auftragsherkunft**                                | Aus der Dropdown-Liste die Auftragsherkunft wählen, die beim Auftragsimport zugeordnet werden soll. |
| **Marktplatzkonto**                                 | Marktplatzkonto aus der Dropdown-Liste wählen. Die Produkt-URL wird um die gewählte Auftragsherkunft erweitert, damit die Verkäufe später analysiert werden können. |
| **Sprache**                                         | Sprache aus der Dropdown-Liste wählen. |
| **Artikelname**                                     | **Name 1**, **Name 2** oder **Name 3** wählen. Die Namen sind im Tab **Texte** eines Artikels gespeichert. Im Feld **Maximale Zeichenlänge (def. Text)** optional eine Zahl eingeben, wenn die Preissuchmaschine eine Begrenzung der Länge des Artikelnamen beim Export vorgibt. |
| **Vorschautext**                                    | Diese Option ist für dieses Format nicht relevant. |
| **Beschreibung**                                    | Wählen, welcher Text als Beschreibungstext übertragen werden soll.<br/> Im Feld **Maximale Zeichenlänge (def. Text)** optional eine Zahl eingeben, wenn die Preissuchmaschine eine Begrenzung der Länge der Beschreibung beim Export vorgibt.<br/> Option **HTML-Tags entfernen** aktivieren, damit die HTML-Tags beim Export entfernt werden.<br/> Im Feld **Erlaubte HTML-Tags, kommagetrennt (def. Text)** optional die HTML-Tags eingeben, die beim Export erlaubt sind. Wenn mehrere Tags eingegeben werden, mit Komma trennen. |
| **Zielland**                                        | Zielland aus der Dropdown-Liste wählen. |
| **Barcode**                                         | ASIN, ISBN oder eine EAN aus der Dropdown-Liste wählen. Der gewählte Barcode muss mit der oben gewählten Auftragsherkunft verknüpft sein. Andernfalls wird der Barcode nicht exportiert. |
| **Bild**                                            | **Position 0** oder **Erstes Bild** wählen, um dieses Bild zu exportieren.<br/> **Position 0** = Ein Bild mit der Position 0 wird übertragen.<br/> **Erstes Bild** = Das erste Bild wird übertragen. |
| **Bildposition des Energieetiketts**                | Diese Option ist für dieses Format nicht relevant. |
| **Bestandspuffer**                                  | Der Bestandspuffer für Varianten mit der Beschränkung auf den Netto-Warenbestand. |
| **Bestand für Varianten ohne Bestandsbeschränkung** | Der Bestand für Varianten ohne Bestandsbeschränkung. |
| **Bestand für Varianten ohne Bestandsführung**      | Der Bestand für Varianten ohne Bestandsführung. |
| **Währung live umrechnen**                          | Aktivieren, damit der Preis je nach eingestelltem Lieferland in die Währung des Lieferlandes umgerechnet wird. Der Preis muss für die entsprechende Währung freigegeben sein. |
| **Verkaufspreis**                                   | Brutto- oder Nettopreis aus der Dropdown-Liste wählen. |
| **Angebotspreis**                                   | Diese Option ist für dieses Format nicht relevant. |
| **UVP**                                             | Aktivieren, um den UVP zu übertragen. |
| **Versandkosten**                                   | Aktivieren, damit die Versandkosten aus der Konfiguration übernommen werden. Wenn die Option aktiviert ist, stehen in den beiden Dropdown-Listen Optionen für die Konfiguration und die Zahlungsart zur Verfügung. Option **Pauschale Versandkosten übertragen** aktivieren, damit die pauschalen Versandkosten übertragen werden. Wenn diese Option aktiviert ist, muss im Feld darunter ein Betrag eingegeben werden. |
| **MwSt.-Hinweis**                                   | Diese Option ist für dieses Format nicht relevant. |
| **Artikelverfügbarkeit**                            | Option **überschreiben** aktivieren und in die Felder **1** bis **10**, die die ID der Verfügbarkeit darstellen, Artikelverfügbarkeiten eintragen. Somit werden die Artikelverfügbarkeiten, die im Menü **System » Artikel » Verfügbarkeit** eingestellt wurden, überschrieben. |
       
_Tab. 1: Einstellungen für das Datenformat **SchuheDE-Plugin**_

## 3 Verfügbare Spalten der Exportdatei

| **Spaltenbezeichnung**     | **Erläuterung** |
| :---                       | :--- |
| Identnummer                | **Pflichtfeld**<br/> Die Varianten-ID der Variante. |
| Artikelnummer              | **Pflichtfeld**<br/> **Beschränkung**: max. 50 Zeichen<br/> Die Variantennummer der Variante. |
| Herstellerartikelnummer    | **Pflichtfeld**<br/> **Beschränkung**: max. 50 Zeichen<br/> Das Modell der Variante. |
| Artikelname                | **Pflichtfeld**<br/> **Beschränkung**: max. 255 Zeichen<br/> Entsprechend der Formateinstellung **Beschreibung**. |
| Bild(er)                   | **Pflichtfeld**<br/> Liste der URLs der Bilder mit Semikolon getrennt. Variantenbilder werden vor Artikelbildern priorisiert. |
| 360 Grad                   | **Beschränkung**: max. 255 Zeichen<br/> Der Wert eines Merkmals vom Typ **Text** oder **Auswahl**, das mit **schuhe.de » 360 Grad** verknüpft wurde. |
| Bestand                    | **Pflichtfeld**<br/> Der Nettowarenbestand der Variante. Bei Artikeln, die nicht auf den Nettowarenbestand beschränkt sind, wird 999 übertragen. |
| Farbe                      | **Pflichtfeld**<br/> **Beschränkung**: max. 50 Zeichen<br/> Der Wert eines Attributs, bei dem die Attributverknüpfung für Amazon mit **Color** gesetzt wurde. Alternativ der Wert eines Merkmals vom Typ **Text** oder **Auswahl**, das mit **schuhe.de » Farbe** verknüpft wurde. |
| Farbe Suche I              | **Beschränkung**: max. 50 Zeichen<br/> Der Wert eines Merkmals vom Typ **Text** oder **Auswahl**, das mit **schuhe.de » Farbe Suche I** verknüpft wurde. |
| Farbe Suche II             | **Beschränkung**: max. 50 Zeichen<br/> Der Wert eines Merkmals vom Typ **Text** oder **Auswahl**, das mit **schuhe.de » Farbe Suche II** verknüpft wurde. |
| Hersteller Farbbezeichnung | **Beschränkung**: max. 50 Zeichen<br/> Der Wert eines Merkmals vom Typ **Text** oder **Auswahl**, das mit **schuhe.de » Hersteller Farbbezeichnung** verknüpft wurde. |
| GG Größengang              | **Beschränkung**: max. 50 Zeichen<br/> Der Wert eines Merkmals vom Typ **Text** oder **Auswahl**, das mit **schuhe.de » Hersteller GG Größengang** verknüpft wurde. |
| Größe                      | **Pflichtfeld**<br/> **Beschränkung**: max. 20 Zeichen<br/> Der Wert eines Attributs, bei dem die Attributverknüpfung  für Amazon mit **Size** gesetzt wurde. Alternativ der Wert eines Merkmals vom Typ **Text** oder **Auswahl**, das mit **schuhe.de » Größe** verknüpft wurde. |
| Marke                      | **Pflichtfeld**<br/> **Beschränkung**: max. 50 Zeichen<br/> Der **Name des Herstellers** des Artikels. Der **Externe Name** unter **Einstellungen » Artikel » Hersteller** wird bevorzugt, wenn vorhanden. |
| Saison                     | **Beschränkung**: max. 50 Zeichen<br/> Der Wert eines Merkmals vom Typ **Text** oder **Auswahl**, das mit **schuhe.de » Saison** verknüpft wurde. |
| EAN                        | Entsprechend der Formateinstellung **Barcode**. |
| Währung                    | **Pflichtfeld**<br/> Der ISO-Code der Währung des Preises. |
| Versandkosten              | **Pflichtfeld**<br/> Entsprechend der Formateinstellung **Versandkosten**. |
| Info Versandkosten         | **Beschränkung**: max. 255 Zeichen<br/> Der Wert eines Merkmals vom Typ **Text** oder **Auswahl**, das mit **schuhe.de » Info Versandkosten** verknüpft wurde. |
| Preis (UVP)                | **Pflichtfeld**<br/> **Beschränkung**: max. 6 Vorkommastellen<br/> Der Verkaufspreis der Variante. Wenn der UVP in den Formateinstellungen aktiviert wurde und höher ist als der Verkaufspreis, wird dieser hier eingetragen. |
| reduzierter Preis          | **Beschränkung**: max. 6 Vorkommastellen<br/>  Wenn die Formateinstellung UVP aktiviert wurde und höher ist als der Verkaufspreis, steht hier der Verkaufspreis. |
| Grundpreis                 | Der berechnete Grundpreis bezogen auf die Grundpreiseinheit. |
| Grundpreis Einheit         | Die Einheit, auf die sich der Grundpreis bezieht. |
| Kategorien                 | **Pflichtfeld**<br/> Die Namen der Kategorien getrennt durch Semikolon, die mit der Variante verknüpft sind. |
| Link                       | **Pflichtfeld**<br/> Der URL-Pfad des Artikels abhängig vom gewählten Mandanten in den Formateinstellungen. |
| Anzahl Verkäufe            | Der Wert eines Merkmals vom Typ **Text** oder **Auswahl**, das mit **schuhe.de » Anzahl Verkäufe** verknüpft wurde. |
| Schuhbreite                | **Beschränkung**: max. 50 Zeichen<br/> Erlaubte Werte: breit, normal, schmal<br/> Der Wert eines Merkmals vom Typ **Text** oder **Auswahl**, das mit **schuhe.de » Schuhbreite** verknüpft wurde. |
| Absatzhöhe                 | **Beschränkung**: max. 50 Zeichen<br/> Erlaubte Werte: bis 3 cm, 3-5 cm, 5-8 cm, 8-10 cm, über 10 cm<br/> Der Wert eines Merkmals vom Typ **Text** oder **Auswahl**, das mit **schuhe.de » Absatzhöhe** verknüpft wurde. |
| Absatzform                 | **Beschränkung**: max. 50 Zeichen<br/> Erlaubte Werte: Block, Keil, Pfennig, Trichter, flach<br/> Der Wert eines Merkmals vom Typ **Text** oder **Auswahl**, das mit **schuhe.de » Absatzform** verknüpft wurde. |
| Schuhspitze                | **Beschränkung**: max. 50 Zeichen<br/> Erlaubte Werte: Karree, offen, rund, spitz<br/> Der Wert eines Merkmals vom Typ **Text** oder **Auswahl**, das mit **schuhe.de » Schuhspitze** verknüpft wurde. |
| Obermaterial               | **Beschränkung**: max. 50 Zeichen<br/> Erlaubte Werte: Fell, Fettleder, Glattleder, Kunststoff/Synthetik, Lack, Lederimitat, Ledermix, Materialmix, Narbenleder, Rauhleder, Textil<br/> Der Wert eines Merkmals vom Typ **Text** oder **Auswahl**, das mit **schuhe.de » Obermaterial** verknüpft wurde. |
| Schaftweite                | **Beschränkung**: max. 50 Zeichen<br/> Erlaubte Werte: normal, schmal, verstellbar, weit<br/> Der Wert eines Merkmals vom Typ **Text** oder **Auswahl**, das mit **schuhe.de » Schaftweite** verknüpft wurde. |
| Schafthöhe                 | **Beschränkung**: max. 50 Zeichen<br/> Erlaubte Werte: unter 5 cm, 5-15 cm, 15-25 cm, 25-35 cm, 35-45 cm<br/> Der Wert eines Merkmals vom Typ **Text** oder **Auswahl**, das mit **schuhe.de » Schafthöhe** verknüpft wurde. |
| Materialzusammensetzung    | **Beschränkung**: max. 50 Zeichen<br/> Der Wert eines Merkmals vom Typ **Text** oder **Auswahl**, das mit **schuhe.de » Materialzusammensetzung** verknüpft wurde. |
| Besonderheiten             | **Beschränkung**: max. 255 Zeichen<br/> Der Wert eines Merkmals vom Typ **Text** oder **Auswahl**, das mit **schuhe.de » Besonderheiten** verknüpft wurde. |
| Verschluss                 | **Beschränkung**: max. 50 Zeichen<br/> Erlaubte Werte: Reißverschluss, Schnürung<br/> Der Wert eines Merkmals vom Typ **Text** oder **Auswahl**, das mit **schuhe.de » Verschluss** verknüpft wurde. |
| Innenmaterial              | **Beschränkung**: max. 50 Zeichen<br/> Der Wert eines Merkmals vom Typ **Text** oder **Auswahl**, das mit **schuhe.de » Innenmaterial** verknüpft wurde. |
| Sohle                      | **Beschränkung**: max. 50 Zeichen<br/> Erlaubte Werte: Kunststoff, Leder<br/> Der Wert eines Merkmals vom Typ **Text** oder **Auswahl**, das mit **schuhe.de » Sohle** verknüpft wurde. |
| Größenhinweis              | **Beschränkung**: max. 50 Zeichen<br/> Der Wert eines Merkmals vom Typ **Text** oder **Auswahl**, das mit **schuhe.de » Größenhinweis** verknüpft wurde. |
| Wechselfußbett             | **Beschränkung**: 0,1<br/> Der Wert eines Merkmals vom Typ **Text** oder **Auswahl**, das mit **schuhe.de » Wechselfußbett** verknüpft wurde. |
| Wasserdicht                | **Beschränkung**: 0,1<br/> Der Wert eines Merkmals vom Typ **Text** oder **Auswahl**, das mit **schuhe.de » Wasserdicht** verknüpft wurde. |
| Promotion                  | **Beschränkung**: 0,1<br/> Der Wert eines Merkmals vom Typ **Text** oder **Auswahl**, das mit **schuhe.de » Promotion** verknüpft wurde. |
| URL Video                  | **Beschränkung**: max. 255 Zeichen<br/> Der Wert eines Merkmals vom Typ **Text** oder **Auswahl**, das mit **schuhe.de » URL Video** verknüpft wurde. |
| Steuersatz                 | **Beschränkung**: max. 4 Vorkommastellen<br/> Der Wert eines Merkmals vom Typ **Text** oder **Auswahl**, das mit **schuhe.de » Steuersatz** verknüpft wurde. |
| ANWR schuh Trend           | **Beschränkung**: max. 50 Zeichen<br/> Der Wert eines Merkmals vom Typ **Text** oder **Auswahl**, das mit **schuhe.de » ANWR schuh Trend** verknüpft wurde. |

## 4 Lizenz

Das gesamte Projekt unterliegt der GNU AFFERO GENERAL PUBLIC LICENSE – weitere Informationen finden Sie in der [LICENSE.md](https://github.com/plentymarkets/plugin-elastic-export-schuhe-de/blob/master/LICENSE.md).
