<?php
/**
 * Created by PhpStorm.
 * User: dbushmin
 * Date: 23.06.16
 * Time: 17:17
 */

namespace YaMaLaParser\Models\YML\Offer;


use YaMaLaParser\Models\YML\Offer;

class SimpleOffer extends Offer {

    /**
     * Название товарного предложения.
     * Обязательный элемент.
     *
     * @var string
     */
    protected $name;

    /**
     * Модель.
     * Необязательный элемент.
     *
     * @var string
     */
    protected $model;

    /**
     * Производитель.
     * Необязательный элемент.
     *
     * @var string
     */
    protected $vendor;

    /**
     * Код производителя для данного товара.
     * Необязательный элемент.
     *
     * @var string
     */
    protected $vendorCode;

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
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @param string $model
     */
    public function setModel($model)
    {
        $this->model = $model;
    }

    /**
     * @return string
     */
    public function getVendor()
    {
        return $this->vendor;
    }

    /**
     * @param string $vendor
     */
    public function setVendor($vendor)
    {
        $this->vendor = $vendor;
    }

    /**
     * @return string
     */
    public function getVendorCode()
    {
        return $this->vendorCode;
    }

    /**
     * @param string $vendorCode
     */
    public function setVendorCode($vendorCode)
    {
        $this->vendorCode = $vendorCode;
    }
    
}