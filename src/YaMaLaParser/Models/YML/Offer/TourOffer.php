<?php
/**
 * Created by PhpStorm.
 * User: dbushmin
 * Date: 23.06.16
 * Time: 18:32
 */

namespace YaMaLaParser\Models\YML\Offer;


use YaMaLaParser\Models\YML\Offer;

class TourOffer extends Offer {

    /**
     * Тип описания предложения. 
     * Для описания туров значение должно быть tour.
     * В YML является атрибутом для offer.
     * Обязательный элемент.
     * 
     * @var string
     */
    protected $type;

    /**
     * Название отеля (в некоторых случаях название тура).
     * Обязательный элемент.
     * 
     * @var
     */
    protected $name;

    /**
     * Часть света.
     * Необязательный элемент.
     * 
     * @var string
     */
    protected $worldRegion;

    /**
     * Страна.
     * Необязательный элемент.
     * 
     * @var string
     */
    protected $country;

    /**
     * Курорт или город.
     * Необязательный элемент.
     * 
     * @var string
     */
    protected $region;

    /**
     * Количество дней тура.
     * Обязательный элемент.
     * 
     * @var string
     */
    protected $days;

    /**
     * Даты заездов. 
     * Предпочтительный формат: YYYY-MM-DD hh:mm:ss.
     * В формате YML элемент offer может содержать несколько элементов dataTour.
     * Необязательный элемент.
     * 
     * @var string
     */
    protected $dataTour;

    /**
     * Звезды отеля.
     * Необязательный элемент.
     * 
     * @var string
     */
    protected $hotel_stars;

    /**
     * Тип комнаты (SNG, DBL и т. п.).
     * Необязательный элемент.
     * 
     * @var string
     */
    protected $room;

    /**
     * Тип питания (All, HB и т. п.).
     * Необязательный элемент.
     * 
     * @var string
     */
    protected $meal;

    /**
     * Что включено в стоимость тура.
     * Обязательный элемент.
     * 
     * @var string
     */
    protected $included;

    /**
     * Транспорт.
     * Обязательный элемент.
     * 
     * @var string
     */
    protected $transport;

    /**
     * Минимальная цена, по которой данный товар можно приобрести. 
     * Минимальная цена товарного предложения округляется, формат, в котором она отображается, зависит от настроек пользователя.
     * Необязательный элемент.
     * 
     * @var string
     */
    protected $price_min;

    /**
     * Максимальная цена, по которой данный товар можно приобрести. 
     * Максимальная цена товарного предложения округляется, формат, в котором она отображается, зависит от настроек пользователя.
     * Необязательный элемент.
     * 
     * @var string
     */
    protected $price_max;

    /**
     * Опции.
     * Необязательный элемент.
     * 
     * @var string
     */
    protected $options;

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getWorldRegion()
    {
        return $this->worldRegion;
    }

    /**
     * @param string $worldRegion
     */
    public function setWorldRegion($worldRegion)
    {
        $this->worldRegion = $worldRegion;
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param string $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * @return string
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * @param string $region
     */
    public function setRegion($region)
    {
        $this->region = $region;
    }

    /**
     * @return string
     */
    public function getDays()
    {
        return $this->days;
    }

    /**
     * @param string $days
     */
    public function setDays($days)
    {
        $this->days = $days;
    }

    /**
     * @return string
     */
    public function getDataTour()
    {
        return $this->dataTour;
    }

    /**
     * @param string $dataTour
     */
    public function setDataTour($dataTour)
    {
        $this->dataTour = $dataTour;
    }

    /**
     * @return string
     */
    public function getHotelStars()
    {
        return $this->hotel_stars;
    }

    /**
     * @param string $hotel_stars
     */
    public function setHotelStars($hotel_stars)
    {
        $this->hotel_stars = $hotel_stars;
    }

    /**
     * @return string
     */
    public function getRoom()
    {
        return $this->room;
    }

    /**
     * @param string $room
     */
    public function setRoom($room)
    {
        $this->room = $room;
    }

    /**
     * @return string
     */
    public function getMeal()
    {
        return $this->meal;
    }

    /**
     * @param string $meal
     */
    public function setMeal($meal)
    {
        $this->meal = $meal;
    }

    /**
     * @return string
     */
    public function getIncluded()
    {
        return $this->included;
    }

    /**
     * @param string $included
     */
    public function setIncluded($included)
    {
        $this->included = $included;
    }

    /**
     * @return string
     */
    public function getTransport()
    {
        return $this->transport;
    }

    /**
     * @param string $transport
     */
    public function setTransport($transport)
    {
        $this->transport = $transport;
    }

    /**
     * @return string
     */
    public function getPriceMin()
    {
        return $this->price_min;
    }

    /**
     * @param string $price_min
     */
    public function setPriceMin($price_min)
    {
        $this->price_min = $price_min;
    }

    /**
     * @return string
     */
    public function getPriceMax()
    {
        return $this->price_max;
    }

    /**
     * @param string $price_max
     */
    public function setPriceMax($price_max)
    {
        $this->price_max = $price_max;
    }

    /**
     * @return string
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * @param string $options
     */
    public function setOptions($options)
    {
        $this->options = $options;
    }

}