<?php
namespace Jawhara\Story\Model\ResourceModel\Extension;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * @var string
     */
    protected $_idFieldName = 'entity_id';
    /**
     * Define resource model.
     */
    protected function _construct()
    {
        $this->_init(
            \Jawhara\Story\Model\Extension::class,
            \Jawhara\Story\Model\ResourceModel\Extension::class,
        );
        
        parent::_construct();
    }
}