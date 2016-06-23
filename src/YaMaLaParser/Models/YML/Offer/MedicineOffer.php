<?php
/**
 * Created by PhpStorm.
 * User: dbushmin
 * Date: 23.06.16
 * Time: 18:55
 */

namespace YaMaLaParser\Models\YML\Offer;


use YaMaLaParser\Models\YML\Offer;

class MedicineOffer extends Offer {

    /** В документации Яндекса непонятный список свойств для данного вида офера
     * поэтому здесь оставлю только одно свойство, отличающее от родительского класса
     */
    
    /**
     * Тип описания предложения.
     * Внимание! Значение обязательно должно быть medicine.
     * В YML является атрибутом для offer.
     * Обязательный элемент.
     *
     * @var string
     */
    protected $type;

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
    
}