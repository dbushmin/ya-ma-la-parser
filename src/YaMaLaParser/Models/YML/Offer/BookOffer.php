<?php
/**
 * Created by PhpStorm.
 * User: dbushmin
 * Date: 23.06.16
 * Time: 17:15
 */

namespace YaMaLaParser\Models\YML\Offer;


use YaMaLaParser\Models\YML\Offer;

class BookOffer extends Offer {

    /**
     * Название товарного предложения.
     * Обязательный элемент.
     *
     * @var string
     */
    protected $name;

    /**
     * Автор произведения.
     * Необязательный элемент.
     *
     * @var string
     */
    protected $author;

    /**
     * Издательство.
     * Необязательный элемент.
     *
     * @var string
     */
    protected $publisher;

    /**
     * Серия.
     * Необязательный элемент.
     *
     * @var string
     */
    protected $series;

    /**
     * Год издания.
     * Необязательный элемент.
     *
     * @var int
     */
    protected $year;

    /**
     * International Standard Book Number — международный уникальный номер книжного издания, если их несколько, то указываются через запятую.
     * Форматы ISBN и SBN проверяются на корректность.
     * Валидация кодов происходит не только по длине, также проверяется контрольная цифра (check-digit)
     * — последняя цифра кода должна согласовываться с остальными цифрами по определенной формуле.
     * При разбиении ISBN на части при помощи дефиса (например, 978-5-94878-004-7)
     * код проверяется на соответствие дополнительным требованиям к количеству цифр в каждой из частей.
     * Обязателен для попадания на карточку книжного издания.
     *
     * @var string
     */
    protected $ISBN;

    /**
     * Количество томов.
     * Необязательный элемент.
     *
     * @var int
     */
    protected $volume;

    /**
     * Номер тома.
     * Необязательный элемент.
     *
     * @var int
     */
    protected $part;

    /**
     * Язык произведения.
     * Необязательный элемент.
     *
     * @var string
     */
    protected $language;

    /**
     * Оглавление. Выводится информация о названиях произведений, если это сборник рассказов или стихов.
     * Необязательный элемент.
     *
     * @var string
     */
    protected $table_of_contents;

    /**
     * Тип описания предложения. Для описания книг значение должно быть book.
     * В YML является атрибутом для offer.
     * Обязательный элемент.
     *
     * @var string
     */
    protected $type;

    /**
     * Переплет.
     * Необязательный элемент.
     *
     * @var string
     */
    protected $binding;

    /**
     * Количество страниц в книге, должно быть целым положительным числом.
     * Необязательный элемент.
     *
     * @var int
     */
    protected $page_extent;

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
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param string $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    /**
     * @return string
     */
    public function getPublisher()
    {
        return $this->publisher;
    }

    /**
     * @param string $publisher
     */
    public function setPublisher($publisher)
    {
        $this->publisher = $publisher;
    }

    /**
     * @return string
     */
    public function getSeries()
    {
        return $this->series;
    }

    /**
     * @param string $series
     */
    public function setSeries($series)
    {
        $this->series = $series;
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
    public function getISBN()
    {
        return $this->ISBN;
    }

    /**
     * @param string $ISBN
     */
    public function setISBN($ISBN)
    {
        $this->ISBN = $ISBN;
    }

    /**
     * @return int
     */
    public function getVolume()
    {
        return $this->volume;
    }

    /**
     * @param int $volume
     */
    public function setVolume($volume)
    {
        $this->volume = $volume;
    }

    /**
     * @return int
     */
    public function getPart()
    {
        return $this->part;
    }

    /**
     * @param int $part
     */
    public function setPart($part)
    {
        $this->part = $part;
    }

    /**
     * @return string
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * @param string $language
     */
    public function setLanguage($language)
    {
        $this->language = $language;
    }

    /**
     * @return string
     */
    public function getTableOfContents()
    {
        return $this->table_of_contents;
    }

    /**
     * @param string $table_of_contents
     */
    public function setTableOfContents($table_of_contents)
    {
        $this->table_of_contents = $table_of_contents;
    }

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
    public function getBinding()
    {
        return $this->binding;
    }

    /**
     * @param string $binding
     */
    public function setBinding($binding)
    {
        $this->binding = $binding;
    }

    /**
     * @return int
     */
    public function getPageExtent()
    {
        return $this->page_extent;
    }

    /**
     * @param int $page_extent
     */
    public function setPageExtent($page_extent)
    {
        $this->page_extent = $page_extent;
    }
    
}