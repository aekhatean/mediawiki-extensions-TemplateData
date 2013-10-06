<?php
class TemplateDataBlobTest extends MediaWikiTestCase {

	protected function setUp() {
		parent::setUp();

		$this->setMwGlobals( array(
			'wgLanguageCode' => 'en',
			'wgContLang' => Language::factory( 'en' ),
		) );
	}

	/**
	 * Helper method to generate a string that gzip can't compress.
	 *
	 * Output is consistent when given the same seed.
	 */
	private static function generatePseudorandomString( $length, $seed ) {
		mt_srand( $seed );

		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$characters_max = strlen( $characters ) - 1;

		$string = '';

		for ( $i = 0; $i < $length; $i++ ) {
			$string .= $characters[mt_rand( 0, $characters_max )];
		}

		return $string;
	}

	public static function provideParse() {
		$cases = array(
			array(
				'input' => '[]
				',
				'status' => 'Property "templatedata" is expected to be of type "object".'
			),
			array(
				'input' => '{
					"params": {}
				}
				',
				'output' => '{
					"description": null,
					"params": {},
					"sets": []
				}
				',
				'status' => true,
				'msg' => 'Minimal valid blob'
			),
			array(
				'input' => '{
					"params": {},
					"foo": "bar"
				}
				',
				'status' => 'Unexpected property "foo".',
				'msg' => 'Unknown properties'
			),
			array(
				'input' => '{}',
				'status' => 'Required property "params" not found.',
				'msg' => 'Empty object'
			),
			array(
				'input' => '{
					"foo": "bar"
				}
				',
				'status' => 'Unexpected property "foo".',
				'msg' => 'Unknown properties invalidate the blob'
			),
			array(
				'input' => '{
					"params": {
						"foo": {}
					}
				}
				',
				'output' => '{
					"description": null,
					"params": {
						"foo": {
							"label": null,
							"description": null,
							"default": "",
							"required": false,
							"deprecated": false,
							"aliases": [],
							"type": "unknown"
						}
					},
					"sets": []
				}
				',
				'msg' => 'Optional properties are added if missing'
			),
			array(
				'input' => '{
					"description": "User badge MediaWiki developers.",
					"params": {
						"nickname": {
							"label": null,
							"description": "User name of user who owns the badge",
							"default": "Base page name of the host page",
							"required": false,
							"aliases": [
								"1"
							]
						}
					}
				}
				',
				'output' => '{
					"description": {
						"en": "User badge MediaWiki developers."
					},
					"params": {
						"nickname": {
							"label": null,
							"description": {
								"en": "User name of user who owns the badge"
							},
							"default": "Base page name of the host page",
							"required": false,
							"deprecated": false,
							"aliases": [
								"1"
							],
							"type": "unknown"
						}
					},
					"sets": []
				}
				',
				'msg' => 'InterfaceText is expanded to langcode-keyed object, assuming content language'
			),
			array(
				'input' => '{
					"description": {
						"en": "User badge MediaWiki developers."
					},
					"params": {
						"nickname": {
							"label": null,
							"description": {
								"en": "User name of user who owns the badge"
							},
							"default": "Base page name of the host page",
							"required": false,
							"deprecated": false,
							"aliases": [
								"1"
							],
							"type": "unknown"
						}
					},
					"sets": []
				}
				',
				'msg' => 'Fully normalised json should be valid input and stay unchanged'
			),
			array(
				'input' => '{
					"description": "Document the documenter.",
					"params": {
						"1d": {
							"description": "Description of the template parameter",
							"required": true,
							"default": "example"
						},
						"2d": {
							"inherits": "1d",
							"default": "overridden"
						}
					}
				}
				',
				'output' => '{
					"description": {
						"en": "Document the documenter."
					},
					"params": {
						"1d": {
							"label": null,
							"description": {
								"en": "Description of the template parameter"
							},
							"required": true,
							"default": "example",
							"deprecated": false,
							"aliases": [],
							"type": "unknown"
						},
						"2d": {
							"label": null,
							"description": {
								"en": "Description of the template parameter"
							},
							"required": true,
							"default": "overridden",
							"deprecated": false,
							"aliases": [],
							"type": "unknown"
						}
					},
					"sets": []
				}
				',
				'msg' => 'The inherits property copies over properties from another parameter '
					. '(preserving overides)'
			),
			array(
				'input' => '{
					"params": {},
					"sets": [
						{
							"label": "Example"
						}
					]
				}',
				'status' => 'Required property "sets.0.params" not found.'
			),
			array(
				'input' => '{
					"params": {
						"foo": {
						}
					},
					"sets": [
						{
							"params": ["foo"]
						}
					]
				}',
				'status' => 'Required property "sets.0.label" not found.'
			),
			array(
				'input' => '{
					"params": {
						"foo": {
						},
						"bar": {
						}
					},
					"sets": [
						{
							"label": "Foo with Quux",
							"params": ["foo", "quux"]
						}
					]
				}',
				'status' => 'Required property "params.quux" not found.'
			),
			array(
				'input' => '{
					"params": {
						"foo": {
						},
						"bar": {
						},
						"quux": {
						}
					},
					"sets": [
						{
							"label": "Foo with Quux",
							"params": ["foo", "quux"]
						},
						{
							"label": "Bar with Quux",
							"params": ["bar", "quux"]
						}
					]
				}',
				'output' => '{
					"description": null,
					"params": {
						"foo": {
							"label": null,
							"required": false,
							"description": null,
							"deprecated": false,
							"aliases": [],
							"default": "",
							"type": "unknown"
						},
						"bar": {
							"label": null,
							"required": false,
							"description": null,
							"deprecated": false,
							"aliases": [],
							"default": "",
							"type": "unknown"
						},
						"quux": {
							"label": null,
							"required": false,
							"description": null,
							"deprecated": false,
							"aliases": [],
							"default": "",
							"type": "unknown"
						}
					},
					"sets": [
						{
							"label": {
								"en": "Foo with Quux"
							},
							"params": ["foo", "quux"]
						},
						{
							"label": {
								"en": "Bar with Quux"
							},
							"params": ["bar", "quux"]
						}
					]
				}',
				'status' => true
			),
			array(
				// Should be long enough to trigger this condition after gzipping.
				'input' => '{
					"description": "' . self::generatePseudorandomString( 100000, 42 ) . '",
					"params": {}
				}',
				'status' => 'Data too large to save (75,195 bytes, limit is 65,535)'
			),
		);
		$calls = array();
		foreach ( $cases as $case ) {
			$calls[] = array( $case );
		}
		return $calls;
	}

	/**
	 * @dataProvider provideParse
	 */
	public function testParse( Array $cases ) {

		// Expand defaults
		if ( !isset( $cases['status'] ) ) {
			$cases['status'] = true;
		}
		if ( !isset( $cases['msg'] ) ) {
			$cases['msg'] = is_string( $cases['status'] ) ? $cases['status'] : 'TemplateData assertion';
		}
		if ( !isset( $cases['output'] ) ) {
			if ( is_string( $cases['status'] ) ) {
				$cases['output'] = '{}';
			} else {
				$cases['output'] = $cases['input'];
			}
		}

		$t = TemplateDataBlob::newFromJSON( $cases['input'] );
		$actual = $t->getJSON();
		$status = $t->getStatus();
		if ( !$status->isGood() ) {
			$this->assertEquals(
				$cases['status'],
				$status->getHtml(),
				'Status: ' . $cases['msg']
			);
		} else {
			$this->assertEquals(
				$cases['status'],
				$status->isGood(),
				'Status: ' . $cases['msg']
			);
		}
		$this->assertJsonStringEqualsJsonString(
			$cases['output'],
			$actual,
			$cases['msg']
		);
	}

	/**
	 * Verify we can gzdecode() which came in PHP 5.4.0. Mediawiki needs a
	 * fallback function for it.
	 * If this test fail, we are most probably attempting to use gzdecode()
	 * with PHP before 5.4.
	 *
	 * @see bug 54058
	 */
	public function testGetJsonForDatabase() {
		// Compress JSON to trigger the code pass in newFromDatabase that ends
		// up calling gzdecode().
		$gzJson = gzencode( '{}' );
		$templateData = TemplateDataBlob::newFromDatabase( $gzJson );
		$this->assertInstanceOf( 'TemplateDataBlob', $templateData );
	}

	public static function provideGetDataInLanguage() {
		$cases = array(
			array(
				'input' => '{
					"description": {
						"de": "German",
						"nl": "Dutch",
						"en": "English",
						"de-formal": "German (formal address)"
					},
					"params": {}
				}
				',
				'output' => '{
					"description": "German",
					"params": {},
					"sets": []
				}
				',
				'lang' => 'de',
				'msg' => 'Simple description'
			),
			array(
				'input' => '{
					"description": "Hi",
					"params": {}
				}
				',
				'output' => '{
					"description": "Hi",
					"params": {},
					"sets": []
				}
				',
				'lang' => 'fr',
				'msg' => 'Non multi-language value returned as is (expands to { "en": value } for' .
					' content-lang, "fr" falls back to "en")'
			),
			array(
				'input' => '{
					"description": {
						"nl": "Dutch",
						"de": "German"
					},
					"params": {}
				}
				',
				'output' => '{
					"description": "Dutch",
					"params": {},
					"sets": []
				}
				',
				'lang' => 'fr',
				'msg' => 'Try content language before giving up on user language and fallbacks'
			),
			array(
				'input' => '{
					"description": {
						"es": "Spanish",
						"de": "German"
					},
					"params": {}
				}
				',
				'output' => '{
					"description": null,
					"params": {},
					"sets": []
				}
				',
				'lang' => 'fr',
				'msg' => 'Description is optional, use null if no suitable fallback'
			),
			array(
				'input' => '{
					"description": {
						"de": "German",
						"nl": "Dutch",
						"en": "English"
					},
					"params": {}
				}
				',
				'output' => '{
					"description": "German",
					"params": {},
					"sets": []
				}
				',
				'lang' => 'de-formal',
				'msg' => '"de-formal" falls back to "de"'
			),
			array(
				'input' => '{
					"params": {
						"foo": {
							"label": {
								"fr": "French",
								"en": "English"
							}
						}
					}
				}
				',
				'output' => '{
					"description": null,
					"params": {
						"foo": {
							"label": "French",
							"required": false,
							"description": null,
							"deprecated": false,
							"aliases": [],
							"default": "",
							"type": "unknown"
						}
					},
					"sets": []
				}
				',
				'lang' => 'fr',
				'msg' => 'Simple parameter label'
			),
			array(
				'input' => '{
					"params": {
						"foo": {
							"label": {
								"es": "Spanish",
								"de": "German"
							}
						}
					}
				}
				',
				'output' => '{
					"description": null,
					"params": {
						"foo": {
							"label": null,
							"required": false,
							"description": null,
							"deprecated": false,
							"aliases": [],
							"default": "",
							"type": "unknown"
						}
					},
					"sets": []
				}
				',
				'lang' => 'fr',
				'msg' => 'Parameter label is optional, use null if no matching fallback'
			),
			array(
				'input' => '{
					"params": {},
					"sets": [
						{
							"label": {
								"es": "Spanish",
								"de": "German"
							},
							"params": []
						}
					]
				}
				',
				'output' => '{
					"description": null,
					"params": {},
					"sets": [
						{
							"label": "Spanish",
							"params": []
						}
					]
				}
				',
				'lang' => 'fr',
				'msg' => 'Set label is not optional, choose first available key as final fallback'
			),
		);
		$calls = array();
		foreach ( $cases as $case ) {
			$calls[] = array( $case );
		}
		return $calls;
	}

	/**
	 * @dataProvider provideGetDataInLanguage
	 */
	public function testGetDataInLanguage( Array $case ) {

		// Change content-language to be non-English so we can distinguish between the
		// last 'en' fallback and the content language in our tests
		$this->setMwGlobals( array(
			'wgLanguageCode' => 'nl',
			'wgContLang' => Language::factory( 'nl' ),
		) );

		if ( !isset( $case['msg'] ) ) {
			$case['msg'] = is_string( $case['status'] ) ? $case['status'] : 'TemplateData assertion';
		}

		$t = TemplateDataBlob::newFromJSON( $case['input'] );
		$status = $t->getStatus();

		$this->assertTrue( $status->isGood(), 'Status is good: ' . $case['msg'] );

		$actual = $t->getDataInLanguage( $case['lang'] );
		$this->assertJsonStringEqualsJsonString(
			$case['output'],
			json_encode( $actual ),
			$case['msg']
		);
	}
}
