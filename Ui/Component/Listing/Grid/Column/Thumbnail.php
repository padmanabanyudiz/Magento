<?php
namespace Jawhara\Story\Ui\Component\Listing\Grid\Column;

use Magento\Catalog\Helper\Image;
use Magento\Framework\UrlInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Ui\Component\Listing\Columns\Column;
use Jawhara\Story\Helper\Data;

class Thumbnail extends Column
{
     const ALT_FIELD = 'fileupload';

     /**
     * @var \Magento\Store\Model\StoreManagerInterface
     */
     protected $storeManager;
     protected $helperData;

     /**
     * @param ContextInterface $context
     * @param UiComponentFactory $uiComponentFactory
     * @param Image $imageHelper
     * @param UrlInterface $urlBuilder
     * @param StoreManagerInterface $storeManager
     * @param array $components
     * @param array $data
     */
     public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        Image $imageHelper,
        UrlInterface $urlBuilder,
        StoreManagerInterface $storeManager,
        array $components = [],
        array $data = [],
          Data $helperData
        )
     {
          $this->storeManager = $storeManager;
          $this->imageHelper = $imageHelper;
          $this->urlBuilder = $urlBuilder;
          $this->helperData = $helperData;
          parent::__construct($context, $uiComponentFactory, $components, $data);
     }

     /**
      * Prepare Data Source
      *
      * @param array $dataSource
      *
      * @return array
      */
     public function prepareDataSource(array $dataSource)
     {
          if (isset($dataSource['data']['items'])) {
               $fieldName = $this->getData('name');
               foreach ($dataSource['data']['items'] as &$item) {
                    $filetype = explode(".",$item['fileupload']);
                    
                    if($item['fileupload'] != '') {
                         $url = '';
                         $url = $this->storeManager->getStore()->getBaseUrl(
                              UrlInterface::URL_TYPE_MEDIA
                              ) . '' . $item['fileupload'];
                              if ($item['videolink'] != '' && $item['videotype'] == '1') {
                                   $values = $this->helperData->getYoutubeId($item['videolink']);
                                   $url = "https://youtu.be/".$values;
                              }
                         if ($filetype[1] == "mp4" || $item['videotype'] == '1' && $item['videolink'] != '') {
                              $lable = 'Video';
                              if ($item['videotype'] == '1') {
                                   $lable = 'External Video';
                              }
                         }
                         else {
                              $lable = 'Image';
                         }
                         $item[$fieldName] = [
                              'fileupload' => [
                                   'href' => $url,
                                   'label' => $lable,
                                   'target' => '_blank'
                              ],
                         ];
                    
                    }
               }
          }

          return $dataSource;
     }
}