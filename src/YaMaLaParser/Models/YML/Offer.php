<?php
/**
 * Created by PhpStorm.
 * User: dbushmin
 * Date: 23.06.16
 * Time: 14:56
 */

namespace YaMaLaParser\Models\YML;


use YaMaLaParser\Models\YML\Offer\Attribute;
use YaMaLaParser\Models\YML\Offer\Outlet;
use YaMaLaParser\Models\YML\Offer\Picture;

class Offer {

    /**
     * возможные типы offer
     */
    const YML_TYPE_OFFER_ARTIST_TITLE = 'artist.title';
    const YML_TYPE_OFFER_AUDIOBOOK = 'audiobook';
    const YML_TYPE_OFFER_BOOK = 'book';
    const YML_TYPE_OFFER_EVENT_TICKET = 'event-ticket';
    const YML_TYPE_OFFER_MEDICINE = 'medicine';
    const YML_TYPE_OFFER_TOUR = 'tour';
    const YML_TYPE_OFFER_VENDOR_MODEL = 'vendor.model';

    /**
     * свойства которые являются массивами
     */
    public static $offer_properties_as_array = ['param', 'picture', 'outlets', 'delivery-options'];

    /**
     * Идентификатор товарного предложения.
     * Может содержать только цифры и латинские буквы.
     * Максимальная длина — 20 символов.
     * В YML является атрибутом для offer.
     * Обязательный элемент.
     *
     * @var string
     */
    protected $id;

    /**
     * Внимание! Используется только в формате YML.
     * Размер основной ставки (на всех местах размещения кроме карточки модели).
     * Является атрибутом для offer.
     * В качестве значений указываются условные центы.
     * Значения должны быть целыми и положительными числами, например «80», что соответствует ставке 0,8 у. е.
     * Необязательный элемент.
     *
     * @var int
     */
    protected $bid;

    /**
     * Внимание! Используется только в формате YML.
     * Размер ставки для карточки модели.
     * Является атрибутом для offer.
     * Значения должны быть целыми и положительными числами, например «80», что соответствует ставке 0,8 у. е.
     * Необязательный элемент.
     *
     * @var int
     */
    protected $cbid;

    /**
     * URL страницы товара на сайте магазина. Максимальная длина URL — 512 символов.
     * Обязательный элемент для интернет-магазинов.
     *
     * @var string
     */
    protected $url;

    /**
     * Цена, по которой данный товар можно приобрести.
     * Цена товарного предложения округляется, формат, в котором она отображается, зависит от настроек пользователя.
     * Для следующих категорий, при условии, что прайс-лист передается в формате YML,
     * допускается указывать начальную цену «от» с помощью атрибута from="true":
     * «Банкетки и скамьи»; «Ванные комнаты»; «Гостиные»;
     * «Детские»; «Детские комоды»; «Диваны»; «Кабинеты»;
     * «Колыбели и люльки»; «Комоды»; «Компьютерные столы»;
     * «Кресла»; «Кровати»; «Кухонные гарнитуры»;
     * «Кухонные уголки» и объединенные группы;
     * «Манежи»; «Парты и стулья»; «Полки»; «Прихожие»;
     * «Пуфики»; «Спальни»; «Стеллажи»; «Столы и столики»;
     * «Стулья, табуретки»; «Тумбы»; «Шкафы».
     * Пример: <price from="true">2000</price>
     * Обязательный элемент.
     *
     * @var string
     */
    protected $price;

    /**
     * Старая цена на товар, которая обязательно должна быть выше новой цены (price).
     * Параметр oldprice необходим для автоматического расчета скидки на товар.
     * Примечание. Скидка обновляется на Маркете каждые 40 – 80 минут.
     * Необязательный элемент.
     *
     * @var string
     */
    protected $oldprice;

    /**
     * Идентификатор валюты товара (RUR, USD, UAH, KZT).
     * Для корректного отображения цены в национальной валюте необходимо использовать идентификатор
     * с соответствующим значением цены (например, UAH с ценой в гривнах).
     * Обязательный элемент.
     *
     * @var string
     */
    protected $currencyId;

    /**
     * Идентификатор категории товара, присвоенный магазином (целое число не более 18 знаков).
     * Товарное предложение может принадлежать только одной категории.
     * Обязательный элемент.
     *
     * @var int
     */
    protected $categoryId;

    /**
     * Категория товара, в которой он должен быть размещен на Яндекс.Маркете.
     * Допустимо указывать названия категорий только из товарного дерева категорий Яндекс.Маркета.
     * Необязательный элемент.
     *
     * @var string
     */
    protected $market_category;

    /**
     * Ссылка на картинку соответствующего товарного предложения.
     * Недопустимо давать ссылку на логотип магазина или «заглушку» — страницу, где написано «картинка отсутствует».
     * Максимальная длина URL — 512 символов.
     * Для части категорий является обязательным элементом.
     *
     * @var Picture[]
     */
    protected $picture;

    /**
     * Элемент позволяет указать возможность курьерской доставки соответствующего товара.
     * Возможные значения:
     * 1) false — товар не может быть доставлен курьером;
     * 2) true — товар может быть доставлен курьером.
     * Необязательный элемент.
     *
     * @var bool
     */
    protected $delivery;

    /**
     * Внимание! Используется только в формате YML.
     * Условия курьерской доставки товара по своему региону (виды доставки, сроки, стоимость).
     * Подробное описание элемента.
     * Обязательный элемент, если элемент delivery имеет значение true.
     *
     * @var DeliveryOption[]
     */
    protected $delivery_options;

    /**
     * Внимание! Используется только в форматах XLS, CSV.
     * Срок курьерской доставки товара в днях по своему региону.
     * Доставка в день заказа (сегодня) — значение 0,  доставка на следующий день (завтра) — значение 1 и т. д.
     * Также можно указать период «от — до» дней, например: 2-4.
     * Внимание! При указании периода «от — до» разброс минимального и максимального срока доставки должен составлять не более трех дней.
     * Максимальное значение, показываемое на Маркете — 31 день.
     * Значение 32 и больше (либо значение не указано вообще) — показывается надпись «под заказ».
     * Обязательный элемент, если элемент delivery имеет значение true.
     *
     * @var string
     */
    protected $local_delivery_days;

    /**
     * Внимание! Используется только в форматах XLS, CSV.
     * Стоимость курьерской доставки товара в своем регионе.
     * Примечание. Ранее local_delivery_cost использовался в формате YML.
     * В настоящее время элемент является устаревшим для этого формата.
     * Использование элемента в YML пока поддерживается Маркетом, однако рекомендуется перейти на элемент delivery-options.
     * Обязательный элемент, если элемент delivery имеет значение true.
     *
     * @var string
     */
    protected $local_delivery_cost;

    /**
     * Возможность самовывоза — зарезервировать выбранный товар и забрать его самостоятельно.
     * Возможные значения:
     * 1) false — возможность «самовывоза» отсутствует;
     * 2) true — товар можно забрать самостоятельно.
     * Необязательный элемент.
     *
     * @var bool
     */
    protected $pickup;

    /**
     * В форматах XLS, CSV:
     * Наличие товара для самовывоза.
     * В формате YML:
     * Если используется элемент local_delivery_cost, available передает сроки курьерской доставки и наличие товара для самовывоза.
     * 1) true — магазин готов доставить товар покупателю или в пункт самовывоза (либо отправить, если покупатель находится в другом регионе)
     * в течение 0-2 рабочих дней с момента оформления заказа.
     * 2) false — магазин готов доставить товар покупателю или в пункт самовывоза (либо отправить, если покупатель находится в другом регионе)
     * в срок от трех рабочих дней до двух месяцев.
     * Точный срок должен быть обязательно согласован с покупателем.
     *
     * Если используется элемент delivery-options, available передает только наличие товара для самовывоза.
     * 1) true — товар в наличии либо поступит в пункт самовывоза в течение двух рабочих дней с момента оформления заказа.
     * 2) false — товар поступит в пункт самовывоза в срок от трех рабочих дней до двух месяцев.
     * Точный срок должен быть обязательно согласован с покупателем.
     *
     * В YML является атрибутом для offer.
     *
     * Обязательный элемент, если элемент picukup имеет значение true.

     * @var bool
     */
    protected $available;

    /**
     * Возможность купить товар в розничном магазине.
     * Возможные значения:
     * 1) false — возможность покупки в розничном магазине отсутствует;
     * 2) true — товар можно купить в розничном магазине.
     * Необязательный элемент.
     *
     * @var bool
     */
    protected $store;

    /**
     * Внимание! Используется только в формате YML.
     * В элементе указывается:
     * количество товара в точке продаж (пункте выдачи или розничном магазине);
     * доступность товара для бронирования.
     * Необязательный элемент.
     * 
     * @var Outlet[]
     */
    protected $outlets;

    /**
     * Описание товарного предложения.
     * Длина текста не более 175 символов (не включая знаки препинания),
     * запрещено использовать HTML-теги (информация внутри тегов публиковаться не будет).
     * Необязательный элемент.
     *
     * @var string
     */
    protected $description;

    /**
     * Элемент используется для отражения информации о:
     * минимальной сумме заказа, минимальной партии товара, необходимости предоплаты (указание элемента обязательно);
     * вариантах оплаты, описания акций и распродаж (указание элемента необязательно).
     * Допустимая длина текста в элементе — 50 символов. .
     *
     * @var string
     */
    protected $sales_notes;

    /**
     * Элемент предназначен для отметки товаров, имеющих официальную гарантию производителя.
     * Возможные значения:
     * 1) false — товар не имеет официальной гарантии;
     * 2) true — товар имеет официальную гарантию.
     * Необязательный элемент.
     *
     * @var bool
     */
    protected $manufacturer_warranty;

    /**
     * Элемент предназначен для указания страны производства товара.
     * Список стран, которые могут быть указаны в этом элементе, доступен по адресу: http://partner.market.yandex.ru/pages/help/Countries.pdf.
     * Примечание. Если вы хотите участвовать в программе «Заказ на Маркете», то желательно указывать данный элемент.
     * Необязательный элемент.
     *
     * @var string
     */
    protected $country_of_origin;

    /**
     * Элемент обязателен для обозначения товара, имеющего отношение к удовлетворению сексуальных потребностей, либо иным образом эксплуатирующего интерес к сексу.
     * Необязательный элемент.
     *
     * @var bool
     */
    protected $adult;

    /**
     * Возрастная категория товара.
     * Годы задаются с помощью атрибута unit со значением year, месяцы — с помощью атрибута unit со значением month.
     * Допустимые значения параметра при unit="year": 0, 6, 12, 16, 18.
     * Допустимые значения параметра при unit="month": 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12.
     * Необязательный элемент.
     *
     * @var string
     */
    protected $age;

    /**
     * Штрихкод товара, указанный производителем.
     * В формате YML элемент offer может содержать несколько элементов barcode.
     * Необязательный элемент.
     *
     * @var string
     */
    protected $barcode;

    /**
     * Элемент предназначен для управления участием товарных предложений в программе «Заказ на Маркете».
     * Необязательный элемент.
     *
     * @var int
     */
    protected $cpa;

    /**
     * Внимание! Используется только в формате YML.
     * Элемент предназначен для указания характеристик товара. 
     * Для описания каждого параметра используется отдельный элемент param.
     * В формате YML элемент offer может содержать несколько элементов param.
     * Для части категорий является обязательным элементом.
     * 
     * По факту это список, хоть и в названии в единственном числе.
     * 
     * @var Attribute[]
     */
    protected $param;

    /**
     * Элемент предназначен для указания срока годности / срока службы либо для указания даты истечения срока годности / срока службы.
     * Значение элемента должно быть в формате ISO8601:
     * — для срока годности / срока службы: P1Y2M10DT2H30M. Расшифровка примера — 1 год, 2 месяца, 10 дней, 2 часа и 30 минут;
     * — для даты истечения срока годности / срока службы: YYYY-MM-DDThh:mm.
     * Необязательный элемент.
     * 
     * @var string
     */
    protected $expiry;

    /**
     * Элемент предназначен для указания веса товара. Вес указывается в килограммах с учетом упаковки.
     * Формат элемента: положительное число с точностью 0.001, разделитель целой и дробной части — точка.
     * При указании более высокой точности значение автоматически округляется следующим способом:
     * — если 4-ый знак после разделителя меньше 5, то 3-й знак сохраняется, а все последующие обнуляются;
     * — если 4-ый знак после разделителя больше или равен 5, то 3-й знак увеличивается на единицу, а все последующие обнуляются.
     * Необязательный элемент.
     * 
     * @var float
     */
    protected $weight;


    /**
     * Элемент предназначен для указания габаритов товара (длина, ширина, высота) в упаковке.
     * Размеры указываются в сантиметрах.
     * Формат элемента: три положительных числа с точностью 0.001, разделитель целой и дробной части — точка.
     * Числа должны быть разделены символом «/» без пробелов.
     * При указании более высокой точности значение автоматически округляется следующим способом:
     * — если 4-ый знак после разделителя меньше 5, то 3-й знак сохраняется, а все последующие обнуляются;
     * — если 4-ый знак после разделителя больше или равен 5, то 3-й знак увеличивается на единицу, а все последующие обнуляются.
     * Необязательный элемент.
     *
     * @var string
     */
    protected $dimensions;

    /**
     * Элемент предназначен для обозначения товара, который можно скачать.
     * Если указано значение параметра true, товарное предложение показывается во всех регионах независимо от регионов доставки,
     * указанных магазином на странице Параметры размещения.
     * Необязательный элемент.
     *
     * @var bool
     */
    protected $downloadable;

    /**
     * Внимание! Элемент используется только в формате YML и только в категориях
     * Одежда, обувь и аксессуары, Мебель, Косметика, Детские товары, Аксессуары для портативной электроники.
     * Элемент используется в описаниях всех предложений, которые являются вариациями одной модели,
     * при этом элемент должен иметь одинаковое значение.
     * Значение должно быть целым числом, максимум 9 разрядов.
     * Является атрибутом элемента offer.
     * Необязательный элемент.
     *
     * @var int
     */
    protected $group_id;

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getBid()
    {
        return $this->bid;
    }

    /**
     * @param int $bid
     */
    public function setBid($bid)
    {
        $this->bid = $bid;
    }

    /**
     * @return int
     */
    public function getCbid()
    {
        return $this->cbid;
    }

    /**
     * @param int $cbid
     */
    public function setCbid($cbid)
    {
        $this->cbid = $cbid;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @return string
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param string $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return string
     */
    public function getOldprice()
    {
        return $this->oldprice;
    }

    /**
     * @param string $oldprice
     */
    public function setOldprice($oldprice)
    {
        $this->oldprice = $oldprice;
    }

    /**
     * @return string
     */
    public function getCurrencyId()
    {
        return $this->currencyId;
    }

    /**
     * @param string $currencyId
     */
    public function setCurrencyId($currencyId)
    {
        $this->currencyId = $currencyId;
    }

    /**
     * @return int
     */
    public function getCategoryId()
    {
        return $this->categoryId;
    }

    /**
     * @param int $categoryId
     */
    public function setCategoryId($categoryId)
    {
        $this->categoryId = $categoryId;
    }

    /**
     * @return string
     */
    public function getMarketCategory()
    {
        return $this->market_category;
    }

    /**
     * @param string $market_category
     */
    public function setMarketCategory($market_category)
    {
        $this->market_category = $market_category;
    }

    /**
     * @return Picture[]
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * @param Picture $picture
     * @return $this
     */
    public function addPicture(Picture $picture)
    {
        if (count($this->picture) < 10)
            $this->picture[] = $picture;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isDelivery()
    {
        return $this->delivery;
    }

    /**
     * @param boolean $delivery
     */
    public function setDelivery($delivery)
    {
        $this->delivery = $delivery;
    }

    /**
     * @return string
     */
    public function getLocalDeliveryDays()
    {
        return $this->local_delivery_days;
    }

    /**
     * @param string $local_delivery_days
     */
    public function setLocalDeliveryDays($local_delivery_days)
    {
        $this->local_delivery_days = $local_delivery_days;
    }

    /**
     * @return string
     */
    public function getLocalDeliveryCost()
    {
        return $this->local_delivery_cost;
    }

    /**
     * @param string $local_delivery_cost
     */
    public function setLocalDeliveryCost($local_delivery_cost)
    {
        $this->local_delivery_cost = $local_delivery_cost;
    }

    /**
     * @return boolean
     */
    public function isPickup()
    {
        return $this->pickup;
    }

    /**
     * @param boolean $pickup
     */
    public function setPickup($pickup)
    {
        $this->pickup = $pickup;
    }

    /**
     * @return boolean
     */
    public function isAvailable()
    {
        return $this->available;
    }

    /**
     * @param boolean $available
     */
    public function setAvailable($available)
    {
        $this->available = $available;
    }

    /**
     * @return boolean
     */
    public function isStore()
    {
        return $this->store;
    }

    /**
     * @param boolean $store
     */
    public function setStore($store)
    {
        $this->store = $store;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getSalesNotes()
    {
        return $this->sales_notes;
    }

    /**
     * @param string $sales_notes
     */
    public function setSalesNotes($sales_notes)
    {
        $this->sales_notes = $sales_notes;
    }

    /**
     * @return boolean
     */
    public function isManufacturerWarranty()
    {
        return $this->manufacturer_warranty;
    }

    /**
     * @param boolean $manufacturer_warranty
     */
    public function setManufacturerWarranty($manufacturer_warranty)
    {
        $this->manufacturer_warranty = $manufacturer_warranty;
    }

    /**
     * @return string
     */
    public function getCountryOfOrigin()
    {
        return $this->country_of_origin;
    }

    /**
     * @param string $country_of_origin
     */
    public function setCountryOfOrigin($country_of_origin)
    {
        $this->country_of_origin = $country_of_origin;
    }

    /**
     * @return boolean
     */
    public function isAdult()
    {
        return $this->adult;
    }

    /**
     * @param boolean $adult
     */
    public function setAdult($adult)
    {
        $this->adult = $adult;
    }

    /**
     * @return string
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param string $age
     */
    public function setAge($age)
    {
        $this->age = $age;
    }

    /**
     * @return string
     */
    public function getBarcode()
    {
        return $this->barcode;
    }

    /**
     * @param string $barcode
     */
    public function setBarcode($barcode)
    {
        $this->barcode = $barcode;
    }

    /**
     * @return int
     */
    public function getCpa()
    {
        return $this->cpa;
    }

    /**
     * @param int $cpa
     */
    public function setCpa($cpa)
    {
        $this->cpa = $cpa;
    }

    /**
     * @return string
     */
    public function getExpiry()
    {
        return $this->expiry;
    }

    /**
     * @param string $expiry
     */
    public function setExpiry($expiry)
    {
        $this->expiry = $expiry;
    }

    /**
     * @return float
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @param float $weight
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;
    }

    /**
     * @return string
     */
    public function getDimensions()
    {
        return $this->dimensions;
    }

    /**
     * @param string $dimensions
     */
    public function setDimensions($dimensions)
    {
        $this->dimensions = $dimensions;
    }

    /**
     * @return boolean
     */
    public function isDownloadable()
    {
        return $this->downloadable;
    }

    /**
     * @param boolean $downloadable
     */
    public function setDownloadable($downloadable)
    {
        $this->downloadable = $downloadable;
    }

    /**
     * @return mixed
     */
    public function getGroupId()
    {
        return $this->group_id;
    }

    /**
     * @param mixed $group_id
     */
    public function setGroupId($group_id)
    {
        $this->group_id = $group_id;
    }

    /**
     * @return DeliveryOption[]
     */
    public function getDeliveryOptions()
    {
        return $this->delivery_options;
    }

    /**
     * @param DeliveryOption $delivery_option
     * @return $this
     */
    public function addDeliveryOption(DeliveryOption $delivery_option)
    {
        $this->delivery_options[] = $delivery_option;
        return $this;
    }

    /**
     * @return Outlet[]
     */
    public function getOutlets()
    {
        return $this->outlets;
    }

    /**
     * @param Outlet $outlet
     * @return $this
     */
    public function addOutlet(Outlet $outlet)
    {
        $this->outlets[] = $outlet;
        return $this;
    }

    /**
     * Внимание! Возвращает массив объектов Attribute
     * @return Offer\Attribute[]
     */
    public function getParam()
    {
        return $this->param;
    }

    /**
     * @param Offer\Attribute $attribute
     * @return $this
     */
    public function addParam(Attribute $attribute)
    {
        $this->param[] = $attribute;
        return $this;
    }


}