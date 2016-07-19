<?php
/**
 * Created by PhpStorm.
 * User: dbushmin
 * Date: 23.06.16
 * Time: 12:49
 */

namespace YaMaLaParser\Models;


use YaMaLaParser\Models\YML\Category;
use YaMaLaParser\Models\YML\Currency;
use YaMaLaParser\Models\YML\DeliveryOption;
use YaMaLaParser\Models\YML\Offer;
use YaMaLaParser\Models\YML\Shop;
use Sabre\Xml\Service;

class YML {

    private $reader;

    public function __construct() {
        $this->reader = new Service();
    }

    /**
     * @param string $yml
     * @return Shop $shop
     */
    public function yml_parser($yml) {

        $shop = new Shop();
        $data = $this->reader->parse($yml)[0];
        foreach ($data['value'] as $item) {
            $field = preg_replace('/[\{\}]+/', '', $item['name']);
            $value = $item['value'];
            $attributes = $item['attributes'];
            if (!is_array($value)) {
                $method = 'set'.self::camelize($field);
                if (method_exists($shop, $method)) {
                    call_user_func([$shop, $method], $value);
                }
            } else {
                 switch ($field) {
                     case 'categories':
                         $this->fill_categories($shop, $value);
                         break;
                     case 'currencies':
                         $this->fill_currencies($shop, $value);
                         break;
                     case 'delivery-options':
                         $this->fill_delivery_options($shop, $value);
                         break;
                     case 'offers':
                         $this->fill_offers($shop, $value);
                         break;
                     default:
                 }
            }

            // if (count($attributes) > 0) // ToDo: придумать что делать в случае, когда имеются атрибуты
        }
        return $shop;
    }

    /**
     * @param Shop $shop
     * @param array $list
     */
    public function fill_categories(Shop $shop, $list = []) {
        if (is_array($list)) {
            foreach ($list as $item) {
                /** @var Category $category */
                $category = new Category();
                $category->setName($item['value']);
                foreach ($item['attributes'] as $attr_name => $attr_value) {
                    $method = 'set'.self::camelize($attr_name);
                    if (method_exists($category, $method)) {
                        call_user_func([$category, $method], $attr_value);
                    }
                }
                $shop->addCategory($category);
            }
        }
    }

    /**
     * @param Shop $shop
     * @param array $list
     */
    public function fill_currencies(Shop $shop, $list = []) {
        if (is_array($list)) {
            foreach ($list as $item) {
                /** @var Currency $currency */
                $currency = new Currency();
                foreach ($item['attributes'] as $attr_name => $attr_value) {
                    if ($attr_name === 'id')
                        $attr_value = self::fixCurrency($attr_value);
                    $method = 'set'.self::camelize($attr_name);
                    if (method_exists($currency, $method)) {
                        call_user_func([$currency, $method], $attr_value);
                    }
                }
                $shop->addCurrency($currency);
            }
        }
    }

    /**
     * @param Shop $shop
     * @param array $list
     */
    public function fill_delivery_options(Shop $shop, $list = []) {
        if (is_array($list)) {
            foreach ($list as $item) {
                $delivery_option = new DeliveryOption();
                foreach ($item['attributes'] as $attr_name => $attr_value) {
                    $method = 'set'.self::camelize($attr_name);
                    if (method_exists($delivery_option, $method)) {
                        call_user_func([$delivery_option, $method], $attr_value);
                    }
                }
                $shop->addDeliveryOption($delivery_option);
            }
        }
    }

    /**
     * @param Shop $shop
     * @param array $list
     */
    public function fill_offers(Shop $shop, $list = []) {
        if (is_array($list)) {
            foreach ($list as $item) {
                /**
                 * Проверяем и выбираем требуемый тип offer
                 */
                $offer_type = 'simple';
                foreach ($item['attributes'] as $attr_name => $attr_value) {
                    if ($attr_name === 'type') {
                        $offer_type = $attr_value;
                        break;
                    }
                }

                $offer = null;
                switch ($offer_type) {
                    case 'simple':
                        $offer = new Offer\SimpleOffer();
                        break;
                    case Offer::YML_TYPE_OFFER_ARTIST_TITLE:
                        $offer = new Offer\ArtistTitleOffer();
                        break;
                    case Offer::YML_TYPE_OFFER_AUDIOBOOK:
                        $offer = new Offer\AudiobookOffer();
                        break;
                    case Offer::YML_TYPE_OFFER_BOOK:
                        $offer = new Offer\BookOffer();
                        break;                       
                    case Offer::YML_TYPE_OFFER_EVENT_TICKET:
                        $offer = new Offer\EventTicketOffer();
                        break;
                    case Offer::YML_TYPE_OFFER_MEDICINE:
                        $offer = new Offer\MedicineOffer();
                        break;
                    case Offer::YML_TYPE_OFFER_TOUR:
                        $offer = new Offer\TourOffer();
                        break;
                    case Offer::YML_TYPE_OFFER_VENDOR_MODEL:
                        $offer = new Offer\VendorModelOffer();
                        break;
                    default:                        
                }

                /**
                 * проставляем атрибуты
                 */
                foreach ($item['attributes'] as $attr_name => $attr_value) {
                    $method = 'set'.self::camelize($attr_name);
                    if (method_exists($offer, $method)) {
                        call_user_func([$offer, $method], $attr_value);
                    }
                }

                /**
                 * проставляем свойства
                 */
                foreach ($item['value'] as $sub_item) {
                    $field = preg_replace('/[\{\}]+/', '', $sub_item['name']);
                    $value = $sub_item['value'];
                    $attributes = $sub_item['attributes'];
                    if (!is_array($value) && !in_array($field, Offer::$offer_properties_as_array)) {
                        $method = 'set' . self::camelize($field);
                        if (method_exists($offer, $method)) {
                            call_user_func([$offer, $method], $value);
                        }
                    } else {
                        switch ($field) {
                            case 'picture':
                                /** @var Offer\Picture $picture */
                                $picture = new Offer\Picture();
                                $picture->setUrl($value);
                                $offer->addPicture($picture);
                                break;
                            case 'param':
                                /** @var Offer\Attribute $param */
                                $param = new Offer\Attribute();
                                if (isset($attributes['name'])) $param->setName(preg_replace('/[\{\}]+/', '', $attributes['name']));
                                if (isset($attributes['unit'])) $param->setUnit($attributes['unit']);
                                $param->setValue($value);
                                $offer->addParam($param);
                                break;
                            case 'delivery-options':
                                foreach ($value[0]['attributes'] as $attr_name => $attr_value) {
                                    /** @var DeliveryOption $delivery_option */
                                    $delivery_option = new DeliveryOption();
                                    $method = 'set'.self::camelize($attr_name);
                                    if (method_exists($delivery_option, $method)) {
                                        call_user_func([$delivery_option, $method], $attr_value);
                                    }
                                    $offer->addDeliveryOption($delivery_option);
                                }
                                break;
                            case 'outlets':
                                foreach ($value[0]['attributes'] as $attr_name => $attr_value) {
                                    /** @var Offer\Outlet $outlet */
                                    $outlet = new Offer\Outlet();
                                    $method = 'set'.self::camelize($attr_name);
                                    if (method_exists($outlet, $method)) {
                                        call_user_func([$outlet, $method], $attr_value);
                                    }
                                    $offer->addOutlet($outlet);
                                }
                                break;
                            default:
                        }
                    }
                }
                
                $shop->addOffer($offer);
            }
        }
    }
    
    /**
     * @param $field
     * @return string
     */
    public static function camelize($field) {
        return strtr(ucwords(strtr($field, array('_' => ' ', '-' => ' ', '.' => '_ '))), array(' ' => ''));
    }

    /**
     * @param $id
     * @return string
     */
    public static function fixCurrency($id) {
        $id = strtoupper($id);
        if ('RUR' === $id) {
            $id = 'RUB';
        }
        return $id;
    }
}