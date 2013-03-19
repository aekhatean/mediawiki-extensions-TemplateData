<?php
$messages = array();

/** English
 * @author Timo Tijhof
 */
$messages['en'] = array(

	// Special:Version
	'templatedata-desc' => 'Implement data storage for template parameters (using JSON)',

	// Page output for <templatedata>
	'templatedata-doc-params' => 'Template parameters',
	'templatedata-doc-param-name' => 'Name',
	'templatedata-doc-param-desc' => 'Description',
	'templatedata-doc-param-default' => 'Default',
	'templatedata-doc-param-status' => 'Status',

	// Error message for edit page
	'templatedata-invalid-parse' => 'Syntax error in JSON.',
	'templatedata-invalid-type' => 'Property "$1" is expected to be of type "$2".',
	'templatedata-invalid-missing' => 'Required property "$1" not found.',
	'templatedata-invalid-unknown' => 'Unexpected property "$1".',
	'templatedata-invalid-value' => 'Invalid value for property "$1".',
);

/** Message documentation (Message documentation)
 * @author Shirayuki
 * @author Timo Tijhof
 */
$messages['qqq'] = array(
	'templatedata-desc' => '{{desc}}',
	'templatedata-doc-params' => '{{Identical|Template parameter}}',
	'templatedata-doc-param-name' => '{{Identical|Name}}',
	'templatedata-doc-param-desc' => '{{Identical|Description}}',
	'templatedata-doc-param-default' => '{{Identical|Default}}',
	'templatedata-doc-param-status' => '{{Identical|Status}}',
	'templatedata-invalid-type' => 'Error message when a property is of the wrong type.
* $1: Name of property
* $2: Expected type of property',
	'templatedata-invalid-missing' => 'Error message when a required property is not found.
* $1 - Name of name
* $2 - (Unused) Type of property',
	'templatedata-invalid-unknown' => 'Error message when an unknown property is found.
* $1: Name of property',
	'templatedata-invalid-value' => 'Error message when a property that cannot contain free-form text has an invalid value.
* $1: Name of property',
);

/** Bengali (বাংলা)
 * @author Leemon2010
 */
$messages['bn'] = array(
	'templatedata-doc-params' => 'টেমপ্লেট পরামিতি',
	'templatedata-doc-param-name' => 'নাম',
	'templatedata-doc-param-desc' => 'বিবরণ',
	'templatedata-doc-param-default' => 'ডিফল্ট',
	'templatedata-doc-param-status' => 'অবস্থা',
);

/** German (Deutsch)
 * @author Metalhead64
 */
$messages['de'] = array(
	'templatedata-desc' => 'Ermöglicht mithilfe von JSON die Implementierung der Datenspeicherung für Vorlagenparameter',
	'templatedata-doc-params' => 'Vorlagenparameter',
	'templatedata-doc-param-name' => 'Name',
	'templatedata-doc-param-desc' => 'Beschreibung',
	'templatedata-doc-param-default' => 'Standard',
	'templatedata-doc-param-status' => 'Status',
	'templatedata-invalid-parse' => 'Syntaxfehler in JSON.',
	'templatedata-invalid-type' => 'Für den Typ „$2” wird die Eigenschaft „$1” erwartet.',
	'templatedata-invalid-missing' => 'Die erforderliche Eigenschaft „$1” wurde nicht gefunden.',
	'templatedata-invalid-unknown' => 'Unerwartete Eigenschaft „$1”.',
	'templatedata-invalid-value' => 'Ungültiger Wert für die Eigenschaft „$1”.',
);

/** Lower Sorbian (dolnoserbski)
 * @author Michawiki
 */
$messages['dsb'] = array(
	'templatedata-desc' => 'Datowe składowanje za pśedłogowe parametry implementěrowaś (z pomocu JSON)',
	'templatedata-doc-params' => 'Pśedłogowe parametry',
	'templatedata-doc-param-name' => 'Mě',
	'templatedata-doc-param-desc' => 'Wopisanje',
	'templatedata-doc-param-default' => 'Standard',
	'templatedata-doc-param-status' => 'Status',
	'templatedata-invalid-parse' => 'Syntaksowa zmólka w JSON.',
	'templatedata-invalid-type' => 'Za kakosć "$1" se typ "$2" wótcakujo.',
	'templatedata-invalid-missing' => 'Trěbna kakosć "$1" njejo se namakała.',
	'templatedata-invalid-unknown' => 'Njewótcakana kakosć "$1".',
	'templatedata-invalid-value' => 'Njepłaśiwa gódnota za kakosć "$1".',
);

/** French (français)
 * @author Gomoko
 */
$messages['fr'] = array(
	'templatedata-desc' => 'Implémenter un stockage de données pour les paramètres du modèle (en utilisant JSON)',
	'templatedata-doc-params' => 'Paramètres du modèle',
	'templatedata-doc-param-name' => 'Nom',
	'templatedata-doc-param-desc' => 'Description',
	'templatedata-doc-param-default' => 'Par défaut',
	'templatedata-doc-param-status' => 'Statut',
	'templatedata-invalid-parse' => 'Erreur de syntaxe dans JSON.',
	'templatedata-invalid-type' => 'La propriété "$1" doit être de type "$2".',
	'templatedata-invalid-missing' => 'Propriété "$1" obligatoire non trouvée.',
	'templatedata-invalid-unknown' => 'Propriété "$1" non attendue.',
	'templatedata-invalid-value' => 'Valeur non valide pour la propriété $1".',
);

/** Upper Sorbian (hornjoserbsce)
 * @author Michawiki
 */
$messages['hsb'] = array(
	'templatedata-desc' => 'Datowe składowanje za předłohowe parametry implementować (z pomocu JSON)',
	'templatedata-doc-params' => 'Předłohowe parametry',
	'templatedata-doc-param-name' => 'Mjeno',
	'templatedata-doc-param-desc' => 'Wopisanje',
	'templatedata-doc-param-default' => 'Standard',
	'templatedata-doc-param-status' => 'Status',
	'templatedata-invalid-parse' => 'Syntaksowy zmylk w JSON.',
	'templatedata-invalid-type' => 'Za kajkosć "$1" so typ "$2" wočakuje.',
	'templatedata-invalid-missing' => 'Trěbna kajkosć "$1" njeje so namakała.',
	'templatedata-invalid-unknown' => 'Njewočakowana kajkosć "$1".',
	'templatedata-invalid-value' => 'Njepłaćiwa hódnota za kajkosć "$1".',
);

/** Japanese (日本語)
 * @author Shirayuki
 */
$messages['ja'] = array(
	'templatedata-desc' => 'テンプレート引数のデータストレージを実装する (JSON を使用)',
	'templatedata-doc-params' => 'テンプレート引数',
	'templatedata-doc-param-name' => '名前',
	'templatedata-doc-param-desc' => '説明',
	'templatedata-doc-param-default' => '既定',
	'templatedata-doc-param-status' => '状態',
	'templatedata-invalid-parse' => 'JSON の構文エラーです。',
	'templatedata-invalid-type' => 'プロパティ「$1」の値が予期しない型「$2」です。',
	'templatedata-invalid-missing' => '必須のプロパティ「$1」がありません。',
	'templatedata-invalid-unknown' => '予期しないプロパティ「$1」です。',
	'templatedata-invalid-value' => 'プロパティ「$1」の値が無効です。',
);

/** Luxembourgish (Lëtzebuergesch)
 * @author Robby
 */
$messages['lb'] = array(
	'templatedata-doc-params' => 'Parameter vun der Schabloun',
	'templatedata-doc-param-name' => 'Numm',
	'templatedata-doc-param-desc' => 'Beschreiwung',
	'templatedata-doc-param-default' => 'Standard',
	'templatedata-doc-param-status' => 'Status',
	'templatedata-invalid-parse' => 'Syntaxfeeler am JSON.',
);

/** Macedonian (македонски)
 * @author Bjankuloski06
 */
$messages['mk'] = array(
	'templatedata-desc' => 'Овозможува складирање на податоци за шаблонски параметри (користејќи JSON)',
	'templatedata-doc-params' => 'Шаблонски параметри',
	'templatedata-doc-param-name' => 'Име',
	'templatedata-doc-param-desc' => 'Опис',
	'templatedata-doc-param-default' => 'По основно',
	'templatedata-doc-param-status' => 'Статус',
	'templatedata-invalid-parse' => 'Синтаксна грешка во JSON.',
	'templatedata-invalid-type' => 'Се очекува својството „$1“ да биде од типот „$2“.',
	'templatedata-invalid-missing' => 'Бараното својство „$1“ не е пронајдено.',
	'templatedata-invalid-unknown' => 'Неочекувано својство „$1“.',
	'templatedata-invalid-value' => 'Неисправна вредност за својството „$1“.',
);

/** Dutch (Nederlands)
 * @author Konovalov
 * @author Siebrand
 */
$messages['nl'] = array(
	'templatedata-desc' => 'Implementeer data-opslag voor sjabloonparameters (met behulp van JSON)',
	'templatedata-doc-params' => 'Sjabloonparameters',
	'templatedata-doc-param-name' => 'Naam',
	'templatedata-doc-param-desc' => 'Beschrijving',
	'templatedata-doc-param-default' => 'Standaard',
	'templatedata-doc-param-status' => 'Status',
	'templatedata-invalid-parse' => 'Syntaxisfout in JSON.',
	'templatedata-invalid-type' => 'Eigenschap "$1" zou moeten zijn van het type "$2".',
	'templatedata-invalid-missing' => 'Vereiste eigenschap "$1" niet gevonden.',
	'templatedata-invalid-unknown' => 'Onverwachte eigenschap "$1".',
	'templatedata-invalid-value' => 'Ongeldige waarde voor de eigenschap "$1".',
);

/** Serbian (Cyrillic script) (српски (ћирилица)‎)
 * @author Милан Јелисавчић
 */
$messages['sr-ec'] = array(
	'templatedata-doc-params' => 'Параметри шаблона',
	'templatedata-doc-param-name' => 'Име',
	'templatedata-doc-param-default' => 'Подразумевано',
	'templatedata-doc-param-status' => 'Статус',
);

/** Telugu (తెలుగు)
 * @author Veeven
 */
$messages['te'] = array(
	'templatedata-doc-params' => 'మూస పరామితులు',
	'templatedata-doc-param-name' => 'పేరు',
	'templatedata-doc-param-desc' => 'వివరణ',
	'templatedata-doc-param-default' => 'అప్రమేయం',
	'templatedata-doc-param-status' => 'స్థితి',
);
