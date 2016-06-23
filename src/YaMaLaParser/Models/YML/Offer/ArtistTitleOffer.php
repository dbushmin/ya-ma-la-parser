<?php
/**
 * Created by PhpStorm.
 * User: dbushmin
 * Date: 23.06.16
 * Time: 18:20
 */

namespace YaMaLaParser\Models\YML\Offer;


use YaMaLaParser\Models\YML\Offer;

class ArtistTitleOffer extends Offer {

    /**
     * Тип описания предложения. Для описания музыкальной и видеопродукции значение должно быть artist.title.
     * В YML является атрибутом для offer.
     * Обязательный элемент.
     *
     * @var string
     */
    protected $type;

    /**
     * Исполнитель.
     * Необязательный элемент.
     *
     * @var string
     */
    protected $artist;

    /**
     * Название.
     * Обязательный элемент.
     *
     * @var string
     */
    protected $title;

    /**
     * Год выпуска.
     * Необязательный элемент.
     *
     * @var int
     */
    protected $year;

    /**
     * Носитель.
     * Необязательный элемент.
     *
     * @var string
     */
    protected $media;

    /**
     * Актеры.
     * Необязательный элемент.
     *
     * @var string
     */
    protected $starring;

    /**
     * Режиссер.
     * Необязательный элемент.
     *
     * @var string
     */
    protected $director;

    /**
     * Оригинальное название.
     * Необязательный элемент.
     *
     * @var string
     */
    protected $originalName;

    /**
     * Страна.
     * Необязательный элемент.
     *
     * @var string
     */
    protected $country;

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
    public function getArtist()
    {
        return $this->artist;
    }

    /**
     * @param string $artist
     */
    public function setArtist($artist)
    {
        $this->artist = $artist;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return int
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * @param int $year
     */
    public function setYear($year)
    {
        $this->year = $year;
    }

    /**
     * @return string
     */
    public function getMedia()
    {
        return $this->media;
    }

    /**
     * @param string $media
     */
    public function setMedia($media)
    {
        $this->media = $media;
    }

    /**
     * @return string
     */
    public function getStarring()
    {
        return $this->starring;
    }

    /**
     * @param string $starring
     */
    public function setStarring($starring)
    {
        $this->starring = $starring;
    }

    /**
     * @return string
     */
    public function getDirector()
    {
        return $this->director;
    }

    /**
     * @param string $director
     */
    public function setDirector($director)
    {
        $this->director = $director;
    }

    /**
     * @return string
     */
    public function getOriginalName()
    {
        return $this->originalName;
    }

    /**
     * @param string $originalName
     */
    public function setOriginalName($originalName)
    {
        $this->originalName = $originalName;
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
    
}