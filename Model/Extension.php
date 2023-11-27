<?php
namespace Jawhara\Story\Model;

use Jawhara\Story\Api\Data\ExtensionInterface;

class Extension extends \Magento\Framework\Model\AbstractModel implements ExtensionInterface
{
    /**
     * CMS page cache tag.
     */
    const CACHE_TAG = 'jawhara_story';

    /**
     * @var string
     */
    protected $_cacheTag = 'jawhara_story';

    /**
     * Prefix of model events names.
     *
     * @var string
     */
    protected $_eventPrefix = 'jawhara_story';

    /**
     * Initialize resource model.
     */
    protected function _construct()
    {
        $this->_init(\Jawhara\Story\Model\ResourceModel\Extension::class);
    }
    
    /**
     * Get EntityId.
     *
     * @return int
     */
    public function getEntityId()
    {
        return $this->getData(self::ENTITY_ID);
    }

    /**
     * Set EntityId.
     */
    public function setEntityId($entityId)
    {
        return $this->setData(self::ENTITY_ID, $entityId);
    }

    /**
     * Get Title.
     *
     * @return varchar
     */
    public function getTitle()
    {
        return $this->getData(self::TITLE);
    }

    /**
     * Set Title.
     */
    public function setTitle($title)
    {
        return $this->setData(self::TITLE, $title);
    }

    /**
     * Get Description.
     *
     * @return varchar
     */
    public function getDescription()
    {
        return $this->getData(self::DESCRIPTION);
    }

    /**
     * Set Description.
     */
    public function setDescription($description)
    {
        return $this->setData(self::DESCRIPTION, $description);
    }

    /**
     * Get CreatedAt.
     *
     * @return varchar
     */
    public function getCreatedAt()
    {
        return $this->getData(self::CREATED_AT);
    }

    /**
     * Set CreatedAt.
     */
    public function setCreatedAt($createdAt)
    {
        return $this->setData(self::CREATED_AT, $createdAt);
    }

    /**
     * Get UpdateTime.
     *
     * @return varchar
     */
    public function getUpdatedAt()
    {
        return $this->getData(self::UPDATED_AT);
    }

    /**
     * Set UpdateTime.
     */
    public function setUpdatedAt($updatedAt)
    {
        return $this->setData(self::UPDATED_AT, $updatedAt);
    }

    /**
     * Get Status.
     *
     * @return varchar
     */
    public function getStatus()
    {
        return $this->getData(self::STATUS);
    }

    /**
     * Set Status.
     */
    public function setStatus($status)
    {
        return $this->setData(self::STATUS, $status);
    }

    
    public function getFileupload()
    {
        return $this->getData(self::FILEUPLOAD);
    }

    
    public function setFileupload($fileupload)
    {
        return $this->setData(self::FILEUPLOAD, $fileupload);
    }


    public function getType()
    {
        return $this->getData(self::TYPE);
    }

    public function setType($type)
    {
        return $this->setData(self::TYPE, $type);
    }

    public function getVideotype()
    {
        return $this->getData(self::VIDEOTYPE);
    }

    public function setVideotype($videotype)
    {
        return $this->setData(self::VIDEOTYPE, $videotype);
    }

    public function getPosition()
    {
        return $this->getData(self::POSITION);
    }

    public function setPosition($position)
    {
        return $this->setData(self::POSITION, $position);
    }

    public function getVideolink()
    {
        return $this->getData(self::VIDEOLINK);
    }

    public function setVideolink($videolink)
    {
        return $this->setData(self::VIDEOLINK, $videolink);
    }

}