<?php
/**
 * Created by PhpStorm.
 * User: dbushmin
 * Date: 22.06.16
 * Time: 23:31
 */

namespace YaMaLaParser\Models\YML;



class Shop  {
    /**
     * Короткое название магазина — название, которое выводится в списке найденных на Яндекс.Маркете товаров.
     * Оно не должно содержать более 20 символов.
     * В названии нельзя использовать слова, не имеющие отношения к наименованию магазина (например: лучший, дешевый),
     * указывать номер телефона и т.п.
     * Название магазина должно совпадать с фактическим названием магазина, которое публикуется на сайте.
     * При несоблюдении данного требования наименование может быть изменено Яндексом самостоятельно без уведомления магазина.
     *
     * @var string
     */
    protected $name;

    /**
     * Полное наименование компании, владеющей магазином. Не публикуется, используется для внутренней идентификации.
     *
     * @var string
     */
    protected $company;

    /**
     * URL главной страницы магазина
     *
     * @var string
     */
    protected $url;

    /**
     * Система управления контентом, на основе которой работает магазин (CMS).
     *
     * @var string
     */
    protected $platform;

    /**
     * Версия CMS
     *
     * @var string
     */
    protected $version;

    /**
     * Наименование агентства, которое оказывает техническую поддержку магазину и отвечает за работоспособность сайта.
     *
     * @var string
     */
    protected $agency;

    /**
     * Контактный адрес разработчиков CMS или агентства, осуществляющего техподдержку.
     *
     * @var string
     */
    protected $email;

    /**
     * Список курсов валют магазина.
     * Обязательный элемент.
     *
     * @var Currency[]
     */
    protected $currencies;

    /**
     * Список категорий магазина.
     * Обязательный элемент.
     *
     * @var Category[]
     */
    protected $categories;

    /**
     * Стоимость и сроки курьерской доставки по своему региону.
     * Обязательный элемент, если все данные по доставке передаются в прайс-листе.
     *
     * @var DeliveryOption[]
     */
    protected $delivery_options;

    /**
     * Элемент предназначен для управления участием товарных предложений в программе «Заказ на Маркете».
     * Необязательный элемент.
     *
     * @var bool
     */
    protected $cpa;

    /**
     * Список предложений магазина. Каждое предложение описывается в отдельном элементе offer. Здесь не приводится список всех элементов, входящих в offer, так как он зависит от типа описания предложения. Для большинства категорий товаров подходят следующие типы описаний:
     * Упрощенный тип описания
     * Произвольный тип описания
     *
     * Для некоторых категорий товаров нужно использовать собственные типы описаний:
     * Лекарства
     * Книги
     * Аудиокниги
     * Билеты на мероприятие
     * Туры
     * Музыкальная и видеопродукция
     * Обязательный элемент.
     *
     * @var Offer[]
     */
    protected $offers;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @param string $company
     */
    public function setCompany($company)
    {
        $this->company = $company;
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
    public function getPlatform()
    {
        return $this->platform;
    }

    /**
     * @param string $platform
     */
    public function setPlatform($platform)
    {
        $this->platform = $platform;
    }

    /**
     * @return string
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * @param string $version
     */
    public function setVersion($version)
    {
        $this->version = $version;
    }

    /**
     * @return string
     */
    public function getAgency()
    {
        return $this->agency;
    }

    /**
     * @param string $agency
     */
    public function setAgency($agency)
    {
        $this->agency = $agency;
    }

    /**
     * @return boolean
     */
    public function isCpa()
    {
        return $this->cpa;
    }

    /**
     * @param boolean $cpa
     */
    public function setCpa($cpa)
    {
        $this->cpa = $cpa;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return Currency[]
     */
    public function getCurrencies()
    {
        return $this->currencies;
    }

    /**
     * @param Currency $currency
     * @return $this
     */
    public function addCurrency($currency)
    {
        $this->currencies[$currency->getId()] = $currency;
        return $this;
    }

    /**
     * @return Category[]
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * @param Category $category
     * @return $this
     */
    public function addCategory(Category $category)
    {
        $this->categories[$category->getId()] = $category;
        return $this;
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
     * @return Offer[]
     */
    public function getOffers()
    {
        return $this->offers;
    }

    /**
     * @param Offer $offer
     * @return $this
     */
    public function addOffer(Offer $offer)
    {
        $idx = !is_null($offer->getGroupId()) ? (string)$offer->getGroupId().":".(string)$offer->getId() : "0:".(string)$offer->getId();
        $this->offers[$idx] = $offer;
        return $this;
    }



}