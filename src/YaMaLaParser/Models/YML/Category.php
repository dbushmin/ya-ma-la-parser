<?php
/**
 * Created by PhpStorm.
 * User: dbushmin
 * Date: 22.06.16
 * Time: 23:31
 */

namespace YaMaLaParser\Models\YML;


class Category  {

    /**
     * @var int
     */
    protected $id;

    /** 
     * @var string 
     */
    protected $name;

    /**
     * @var int
     */
    protected $parentId;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
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
     * @return int
     */
    public function getParentId()
    {
        return $this->parentId;
    }

    /**
     * @param int $parentId
     */
    public function setParentId($parentId)
    {
        $this->parentId = $parentId;
    }   
    
}