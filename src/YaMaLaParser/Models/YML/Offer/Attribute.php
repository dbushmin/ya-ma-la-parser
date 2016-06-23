<?php
/**
 * Created by PhpStorm.
 * User: dbushmin
 * Date: 23.06.16
 * Time: 16:56
 */

namespace YaMaLaParser\Models\YML\Offer;


class Attribute {

    /**
     * название параметра (обязательно)
     *
     * @var string
     */
    protected $name;

    /**
     * единица измерения (для числовых параметров, опционально)
     *
     * @var string
     */
    protected $unit;

    /**
     * значение параметра
     *
     * @var
     */
    protected $value;

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
    public function getUnit()
    {
        return $this->unit;
    }

    /**
     * @param string $unit
     */
    public function setUnit($unit)
    {
        $this->unit = $unit;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }
    
}