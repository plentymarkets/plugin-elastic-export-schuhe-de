
# ElasticExportSchuheDE plugin user guide

<div class="container-toc"></div>

## 1 Registering with Schuhe.de

Schuhe.de is an online platform by the ANWR Group that links online stores with stationary specialist shops. Please note that this website is currently only available in German.

## 2 Setting up the data format SchuheDE-Plugin in plentymarkets

By installing this plugin you will receive the export format **SchuheDE-Plugin**. Use this format to exchange data between plentymarkets and Schuhe.de. It is required to install the Plugin Elastic export from the plentyMarketplace first before you can use the format **SchuheDE-Plugin** in plentymarkets.

Once both plugins are installed, you can create the export format **SchuheDE-Plugin**. Refer to the [Exporting data formats for price search engines](https://knowledge.plentymarkets.com/en/basics/data-exchange/export-import/exporting-data#30) page of the manual for further details about the individual format settings.

Creating a new export format:

1. Go to **Data » Elastic export**.
2. Click on **New export**.
3. Carry out the settings as desired. Pay attention to the information given in table 1.
4. **Save** the settings.
→ The export format is given an ID and it appears in the overview within the **Exports** tab.

The following table lists details for settings, format settings and recommended item filters for the format **SchuheDE-Plugin**.

| **Setting**                                           | **Explanation** | 
| :---                                                  | :--- |
| **Settings**                                          | |
| **Name**                                              | Enter a name. The export format is listed by this name in the overview within the **Exports** tab. |
| **Type**                                              | Select the type **Item** from the drop-down list. |
| **Format**                                            | Select **SchuheDE-Plugin**. |
| **Limit**                                             | Enter a number. If you want to transfer more than 9,999 data records to the price search engine, then the output file will not be generated again for another 24 hours. This is to save resources. If more than 9,999 data records are necessary, the setting Generate cache file has to be active. |
| **Generate cache file**                               | Place a check mark if you want to transfer more than 9,999 data records to the price search engine. The output file will not be regenerated for another 24 hours. We recommend that you do not activate this setting for more than 20 export formats. This is to ensure a high performance of the elastic export. |
| **Provisioning**                                      | Select **URL**. This option generates a token for authentication in order to allow external access. |
| **File name**                                         | If you have selected the option **URL** under **Provisioning**, then click on **Generate token**. The token is entered automatically. When the token is generated under **Token**, the URL is entered automatically. |
| **Token, URL**                                        | The file name must have the ending **.csv** or **.txt** for schuhe.de to be able to import the file successfully. |
| **Item filters**                                      | |
| **Add item filters**                                  | Select an item filter from the drop-down list and click on **Add**. There are no filters set in default. It is possible to add multiple item filters from the drop-down list one after the other.<br/> **Variations** = Select **Transfer all** or **Only transfer main variations**.<br/> **Markets** = Select one or multiple markets. The chosen order referrer has to be active at the variation for the item to be exported.<br/> **Currency** = Select a currency.<br/> **Category** = Activate to transfer the item with its category link. Only items belonging to this category are exported.<br/> **Image** = Activate to transfer the item with its image. Only items with images are transferred.<br/> **Client** = Select a client.<br/> **Stock** = Select which stocks you want to export.<br/> **Flag 1 - 2** = Select the flag.<br/> **Manufacturer** = Select one, several or ALL manufacturers.<br/> **Active** = Select **Active**. Only active variations are exported. |
| **Format settings**                                   | |
| **Product URL**                                       | Choose the URL that you wish to transfer to the price comparison portal. You can choose between the item's URL and the variation's URL. Variation URLs can only be transferred in combination with the Ceres store. |
| **Client**                                            | Select a client. This setting is used for the URL structure. |
| **URL parameter**                                     | Enter a suffix for the product URL if this is required for the export. This character string will be added to the product URL if you have activated the transfer option for the product URL further up. |
| **Order referrer**                                    | Choose the order referrer that should be assigned during the order import from the drop-down list. |
| **Marketplace account**                               | Select the marketplace account from the drop-down list. The selected referrer is added to the product URL so that sales can be analysed later. |
| **Language**                                          | Select the language from the drop-down list. |
| **Item name**                                         | Select **Name 1**, **Name 2** or **Name 3**. These names are saved in the **Texts** tab of the item. Enter a number into the **Maximum number of characters (def. Text)** field if desired. This specifies how many characters should be exported for the item name. |
| **Preview text**                                      | This option does not affect this format. |
| **Description**                                       | Select the text that you want to transfer as description.<br/> Enter a number into the **Maximum number of characters (def. text)** field if desired. This specifies how many characters should be exported for the description.<br/> Activate the option **Remove HTML tags** if you want HTML tags to be removed during the export. If you only want to allow specific HTML tags to be exported, then enter these tags into the field **Permitted HTML tags, separated by comma (def. Text)**. Use commas to separate multiple tags. |
| **Target country**                                    | Select the target country from the drop-down list. |
| **Barcode**                                           | Select the ASIN, ISBN or an EAN from the drop-down list. The barcode has to be linked to the order referrer selected above. If the barcode is not linked to the order referrer, it will not be exported. |
| **Image**                                             | Select **Position 0** or **First image** to export this image.<br/> **Position 0** = An image with position 0 is transferred.<br/> **First image** = The first image is transferred. |
| **Image position of the energy label**                | This option does not affect this format. |
| **Stock buffer**                                      | The stock buffer for variations with limitation to the net stock. |
| **Stock for variations without stock limitation**     | The stock for variations without stock limitation. |
| **Stock for variations with no stock administration** | The stock for variations without stock administration. |
| **Live currency conversion**                          | Activate this option to convert the price into the currency of the selected country of delivery. The price has to be released for the corresponding currency. |
| **Retail price**                                      | Select the gross price or net price from the drop-down list. |
| **Offer price**                                       | This option does not affect this format. |
| **RRP**                                               | Activate to transfer the RRP. |
| **Shipping costs**                                    | Activate this option if you want to use the shipping costs that are saved in a configuration. If this option is activated, then you are able to select the configuration and the payment method from the drop-down lists.<br/> Activate the option **Transfer flat rate shipping charge** if you want to use a fixed shipping charge. If this option is activated, a value has to be entered in the line underneath. |
| **VAT note**                                          | This option does not affect this format. |
| **Item availability**                                 | Activate the **overwrite** option and enter item availabilities into the fields **1** to **10**. The fields represent the IDs of the availabilities. This overwrites the item availabilities that are saved in the menu **System » Item » Item availability**. |
       
_Tab. 1: Settings for the data format **SchuheDE-Plugin**_

## 3 Available columns of the export file

| **Column name**     | **Explanation** |
| :---                       | :--- |
| Identnummer                | **Required**<br/> The variation ID of the variation. |
| Artikelnummer              | **Required**<br/> **Limitation**: max. 50 characters<br/> The Variation No. within the **Basic settings** section in the **Item » Edit item » Open item » Open variation » Settings** menu. |
| Herstellerartikelnummer    | **Required**<br/> **Limitation**: max. 50 characters<br/> The model within the **Basic settings** section in the **Item » Edit item » Open item » Open variation » Settings** menu. |
| Artikelname                | **Required**<br/> **Limitation**: max. 255 characters<br/> According to the format setting **Item name**. |
| Bild(er)                   | **Required**<br/> A list of all image URLs separated with semicolon. Variation images are prioritised over item images. |
| 360 Grad                   | **Limitation**: max. 255 characters<br/> The value of a property of the type **Text** or **Selection** that is linked to **schuhe.de » 360 degrees**. |
| Bestand                    | **Required**<br/> The net stock of the variation. If a variation is not limited to its net stock, 999 is transferred. |
| Farbe                      | **Required**<br/> **Limitation**: max. 50 characters<br/> The value of an attribute with an attribute link for Amazon to **Color**. As an alternative, you can use the value of a property of the type **Text** or **Selection** that is linked to **schuhe.de » Colour**. |
| Farbe Suche I              | **Limitation**: max. 50 characters<br/> The value of a property of the type **Text** or **Selection** that is linked to **schuhe.de » Colour search I**. |
| Farbe Suche II             | **Limitation**: max. 50 characters<br/> The value of a property of the type **Text** or **Selection** that is linked to **schuhe.de » Colour search II**. |
| Hersteller Farbbezeichnung | **Limitation**: max. 50 characters<br/> The value of a property of the type **Text** or **Selection** that is linked to **schuhe.de » Manufacturer colour name**. |
| GG Größengang              | **Limitation**: max. 50 characters<br/> The value of a property of the type **Text** or **Selection** that is linked to **schuhe.de » GG size range**. |
| Größe                      | **Required**<br/> **Limitation**: max. 20 characters<br/> The value of an attribute with an attribute link for Amazon to **Size**. As an alternative, you can use the value of a property of the type **Text** or **Selection** that is linked to **schuhe.de » Size**. |
| Marke                      | **Required**<br/> **Limitation**: max. 50 characters<br/> The name of the manufacturer of the item. The **External name** within **Settings » Items » Manufacturer** is preferred if existing. |
| Saison                     | **Limitation**: max. 50 characters<br/> The value of a property of the type **Text** or **Selection** that is linked to **schuhe.de » Season**. |
| EAN                        | According to the format setting **Barcode**. |
| Währung                    | **Required**<br/> The ISO code of the currency of the price. |
| Versandkosten              | **Required**<br/> According to the format setting **Shipping costs**. |
| Info Versandkosten         | **Limitation**: max. 255 characters<br/> The value of a property of the type **Text** or **Selection** that is linked to **schuhe.de » Shipping costs info**. |
| Preis (UVP)                | **Required**<br/> **Limitation**: max. 6 pre-decimals<br/> The sales price of the variation. If the RRP is activated in the format settings and is higher than the sales price, the RRP is exported. |
| reduzierter Preis          | **Limitation**: max. 6 pre-decimals<br/>  If the RRP is activated in the in the format settings and is higher than the sales price, the sales price is exported. |
| Grundpreis                 | The base price based on the column Grundpreis Einheit. |
| Grundpreis Einheit         | The content and unit on which the base price is based. |
| Kategorien                 | **Required**<br/> The names of the categories that are linked to the variation, separated by semi-colon. |
| Link                       | **Required**<br/> The URL path of the item depending on the chosen client in the format settings. |
| Anzahl Verkäufe            | The value of a property of the type **Text** or **Selection** that is linked to **schuhe.de » Number of sales**. |
| Schuhbreite                | **Limitation**: max. 50 characters<br/> Allowed values: breit, normal, schmal<br/> The value of a property of the type **Text** or **Selection** that is linked to **schuhe.de » Shoe width**. |
| Absatzhöhe                 | **Limitation**: max. 50 characters<br/> Allowed values: bis 3 cm, 3-5 cm, 5-8 cm, 8-10 cm, über 10 cm<br/> The value of a property of the type **Text** or **Selection** that is linked to **schuhe.de » Heel height**. |
| Absatzform                 | **Limitation**: max. 50 characters<br/> Allowed values: Block, Keil, Pfennig, Trichter, flach<br/> The value of a property of the type **Text** or **Selection** that is linked to **schuhe.de » Heel shape**. |
| Schuhspitze                | **Limitation**: max. 50 characters<br/> Allowed values: Karree, offen, rund, spitz<br/> The value of a property of the type **Text** or **Selection** that is linked to **schuhe.de » Shoe point**. |
| Obermaterial               | **Limitation**: max. 50 characters<br/> Allowed values: Fell, Fettleder, Glattleder, Kunststoff/Synthetik, Lack, Lederimitat, Ledermix, Materialmix, Narbenleder, Rauhleder, Textil<br/> The value of a property of the type **Text** or **Selection** that is linked to **schuhe.de » Upper material**. |
| Schaftweite                | **Limitation**: max. 50 characters<br/> Allowed values: normal, schmal, verstellbar, weit<br/> The value of a property of the type **Text** or **Selection** that is linked to **schuhe.de » Shaft width**. |
| Schafthöhe                 | **Limitation**: max. 50 characters<br/> Allowed values: unter 5 cm, 5-15 cm, 15-25 cm, 25-35 cm, 35-45 cm<br/> The value of a property of the type **Text** or **Selection** that is linked to **schuhe.de » Shaft height**. |
| Materialzusammensetzung    | **Limitation**: max. 50 characters<br/> The value of a property of the type **Text** or **Selection** that is linked to **schuhe.de » Material composition**. |
| Besonderheiten             | **Limitation**: max. 255 characters<br/> The value of a property of the type **Text** or **Selection** that is linked to **schuhe.de » Particularities**. |
| Verschluss                 | **Limitation**: max. 50 characters<br/> Allowed values: Reißverschluss, Schnürung<br/> The value of a property of the type **Text** or **Selection** that is linked to **schuhe.de » Closure**. |
| Innenmaterial              | **Limitation**: max. 50 characters<br/> The value of a property of the type **Text** or **Selection** that is linked to **schuhe.de » Inner material**. |
| Sohle                      | **Limitation**: max. 50 characters<br/> Allowed values: Kunststoff, Leder<br/> The value of a property of the type **Text** or **Selection** that is linked to **schuhe.de » Sole**. |
| Größenhinweis              | **Limitation**: max. 50 characters<br/> The value of a property of the type **Text** or **Selection** that is linked to **schuhe.de » Size note**. |
| Wechselfußbett             | **Limitation**: 0.1<br/> The value of a property of the type **Text** or **Selection** that is linked to **schuhe.de » Removable insoles**. |
| Wasserdicht                | **Limitation**: 0.1<br/> The value of a property of the type **Text** or **Selection** that is linked to **schuhe.de » Watertight**. |
| Promotion                  | **Limitation**: 0.1<br/> The value of a property of the type **Text** or **Selection** that is linked to **schuhe.de » Promotion**. |
| URL Video                  | **Limitation**: max. 255 characters<br/> The value of a property of the type **Text** or **Selection** that is linked to **schuhe.de » URL video**. |
| Steuersatz                 | **Limitation**: max. 4 pre-decimals<br/> The value of a property of the type **Text** or **Selection** that is linked to **schuhe.de » Tax rate**. |
| ANWR schuh Trend           | **Limitation**: max. 50 characters<br/> The value of a property of the type **Text** or **Selection** that is linked to **schuhe.de » ANWR schuh Trend**. |

## 4 License

This project is licensed under the GNU AFFERO GENERAL PUBLIC LICENSE.- find further information in the [LICENSE.md](https://github.com/plentymarkets/plugin-elastic-export-schuhe-de/blob/master/LICENSE.md).
