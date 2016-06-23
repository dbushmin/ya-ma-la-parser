<?php
/**
 * Created by PhpStorm.
 * User: dbushmin
 * Date: 23.06.16
 * Time: 17:10
 */

namespace YaMaLaParser\Models\YML\Offer;


use YaMaLaParser\Models\YML\Offer;

class VendorModelOffer extends Offer {

    /**
     * Тип описания предложения. 
     * Значение должно быть vendor.model.
     * В YML является атрибутом для offer.
     * Обязательный элемент.
     * 
     * @var string
     */
    protected $type;
    
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
     * Тип / категория товара (например, «мобильный телефон», «стиральная машина», «угловой диван»).
     * Необязательный элемент.
     * 
     * @var string
     */
    protected $typePrefix;

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

    
    /**
     * @return string
     */
    public function getTypePrefix()
    {
        return $this->typePrefix;
    }

    /**
     * @param string $typePrefix
     */
    public function setTypePrefix($typePrefix)
    {
        $this->typePrefix = $typePrefix;
    }
    
}