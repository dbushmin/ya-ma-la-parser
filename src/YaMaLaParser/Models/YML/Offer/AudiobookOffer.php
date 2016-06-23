<?php
/**
 * Created by PhpStorm.
 * User: dbushmin
 * Date: 23.06.16
 * Time: 17:57
 */

namespace YaMaLaParser\Models\YML\Offer;


use YaMaLaParser\Models\YML\Offer;

class AudiobookOffer extends BookOffer {

    /**
     * Исполнитель. Если их несколько, перечисляются через запятую.
     * Необязательный элемент.
     *
     * @var string
     */
    protected $performed_by;

    /**
     * Тип аудиокниги (радиоспектакль, «произведение начитано» и т.п.).
     * Необязательный элемент.
     *
     * @var string
     */
    protected $performance_type;

    /**
     * Носитель, на котором поставляется аудиокнига.
     * Необязательный элемент.
     *
     * @var string
     */
    protected $storage;

    /**
     * Формат аудиокниги.
     * Необязательный элемент.
     *
     * @var string
     */
    protected $format;

    /**
     * Время звучания задается в формате mm.ss (минуты.секунды).
     * Необязательный элемент.
     *
     * @var string
     */
    protected $recording_length;

    /**
     * @return string
     */
    public function getPerformedBy()
    {
        return $this->performed_by;
    }

    /**
     * @param string $performed_by
     */
    public function setPerformedBy($performed_by)
    {
        $this->performed_by = $performed_by;
    }

    /**
     * @return string
     */
    public function getPerformanceType()
    {
        return $this->performance_type;
    }

    /**
     * @param string $performance_type
     */
    public function setPerformanceType($performance_type)
    {
        $this->performance_type = $performance_type;
    }

    /**
     * @return string
     */
    public function getStorage()
    {
        return $this->storage;
    }

    /**
     * @param string $storage
     */
    public function setStorage($storage)
    {
        $this->storage = $storage;
    }

    /**
     * @return string
     */
    public function getFormat()
    {
        return $this->format;
    }

    /**
     * @param string $format
     */
    public function setFormat($format)
    {
        $this->format = $format;
    }

    /**
     * @return string
     */
    public function getRecordingLength()
    {
        return $this->recording_length;
    }

    /**
     * @param string $recording_length
     */
    public function setRecordingLength($recording_length)
    {
        $this->recording_length = $recording_length;
    }
    
}