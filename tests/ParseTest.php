<?php

/**
 * Created by PhpStorm.
 * User: dbushmin
 * Date: 24.06.16
 * Time: 0:23
 */

use YaMaLaParser\Models\YML;


class ParseTest extends PHPUnit_Framework_TestCase {

    public function testParse() {
        $yml = file_get_contents(__DIR__ . '/_assets/ya.xml');
        $parser = new YML();
        /** @var YML\Shop $shop */
        $shop = $parser->yml_parser($yml);

        $this->assertEquals('ABC inc.', $shop->getCompany(), 'Check parsed company');
        $this->assertClassHasAttribute('categories', YML\Shop::class, 'Check YML\Shop::class attribute');
        $this->assertCount(2, $shop->getOffers(), 'Check count of parsed offers');
    }
}
