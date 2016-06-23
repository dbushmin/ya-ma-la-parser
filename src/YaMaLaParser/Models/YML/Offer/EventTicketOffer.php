<?php
/**
 * Created by PhpStorm.
 * User: dbushmin
 * Date: 23.06.16
 * Time: 18:25
 */

namespace YaMaLaParser\Models\YML\Offer;


use YaMaLaParser\Models\YML\Offer;

class EventTicketOffer extends Offer {

    /**
     * Тип описания предложения. Для описания билетов на мероприятие значение должно быть event-ticket.
     * В YML является атрибутом для offer.
     * Обязательный элемент.
     * 
     * @var string
     */
    protected $type;

    /**
     * Название мероприятия.
     * Обязательный элемент.
     * 
     * @var string
     */
    protected $name;

    /**
     * Место проведения.
     * Обязательный элемент.
     * 
     * @var string
     */
    protected $place;

    /**
     * Зал.
     * Необязательный элемент.
     * 
     * @var string
     */
    protected $hall;

    /**
     * Ряд и место в зале.
     * Необязательный элемент.
     * 
     * @var string
     */
    protected $hall_part;

    /**
     * Дата и время сеанса. Предпочтительный формат: YYYY-MM-DD hh:mm:ss.
     * Обязательный элемент.
     * 
     * @var string
     */
    protected $date;

    /**
     * Признак премьерности мероприятия.
     * Необязательный элемент.
     * 
     * @var bool
     */
    protected $is_premiere;

    /**
     * Признак детского мероприятия.
     * Необязательный элемент.
     * 
     * @var bool
     */
    protected $is_kids;

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
    public function getPlace()
    {
        return $this->place;
    }

    /**
     * @param string $place
     */
    public function setPlace($place)
    {
        $this->place = $place;
    }

    /**
     * @return string
     */
    public function getHall()
    {
        return $this->hall;
    }

    /**
     * @param string $hall
     */
    public function setHall($hall)
    {
        $this->hall = $hall;
    }

    /**
     * @return string
     */
    public function getHallPart()
    {
        return $this->hall_part;
    }

    /**
     * @param string $hall_part
     */
    public function setHallPart($hall_part)
    {
        $this->hall_part = $hall_part;
    }

    /**
     * @return string
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param string $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return boolean
     */
    public function isIsPremiere()
    {
        return $this->is_premiere;
    }

    /**
     * @param boolean $is_premiere
     */
    public function setIsPremiere($is_premiere)
    {
        $this->is_premiere = $is_premiere;
    }

    /**
     * @return boolean
     */
    public function isIsKids()
    {
        return $this->is_kids;
    }

    /**
     * @param boolean $is_kids
     */
    public function setIsKids($is_kids)
    {
        $this->is_kids = $is_kids;
    }

}