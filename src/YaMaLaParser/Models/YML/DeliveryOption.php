<?php
/**
 * Created by PhpStorm.
 * User: dbushmin
 * Date: 23.06.16
 * Time: 14:56
 */

namespace YaMaLaParser\Models\YML;


class DeliveryOption {

    /**
     * @var string
     */
    protected $cost;

    /**
     * @var string
     */
    protected $days;

    /**
     * @var string
     */
    protected $order_before;

    /**
     * @return string
     */
    public function getCost()
    {
        return $this->cost;
    }

    /**
     * @param string $cost
     */
    public function setCost($cost)
    {
        $this->cost = $cost;
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
    public function getOrderBefore()
    {
        return $this->order_before;
    }

    /**
     * @param string $order_before
     */
    public function setOrderBefore($order_before)
    {
        $this->order_before = $order_before;
    }
    
}