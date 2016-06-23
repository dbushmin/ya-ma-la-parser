<?php
/**
 * Created by PhpStorm.
 * User: dbushmin
 * Date: 23.06.16
 * Time: 20:07
 */

namespace YaMaLaParser\Models\YML\Offer;


class Picture {

    /**
     * Ссылка на картинку соответствующего товарного предложения.
     * Недопустимо давать ссылку на логотип магазина или «заглушку» — страницу, где написано «картинка отсутствует».
     * Максимальная длина URL — 512 символов.
     * 
     * @var string
     */
    protected $url;

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
    
}