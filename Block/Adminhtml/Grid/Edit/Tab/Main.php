<?php

namespace Jawhara\Story\Block\Adminhtml\Grid\Edit\Tab;

class Main extends \Magento\Backend\Block\Widget\Form\Generic
{
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Data\FormFactory $formFactory,
        array $data = []
    ) {
        parent::__construct($context, $registry, $formFactory, $data);
    }

    protected function _prepareForm()
    {
        $model = $this->_coreRegistry->registry('row_data');
        $form = $this->_formFactory->create();

        $form->setHtmlIdPrefix('story_');
        if ($model->getEntityId()) {
            $fieldset = $form->addFieldset(
                'base_fieldset',
                ['legend' => __('Edit Story Content'), 'class' => 'fieldset-wide']
            );
            $fieldset->addField('entity_id', 'hidden', ['name' => 'entity_id']);
        } else {
            $fieldset = $form->addFieldset(
                'base_fieldset',
                ['legend' => __('Add Story Content'), 'class' => 'fieldset-wide']
            );
        }

        $fieldset->addField(
            'title',
            'text',
            [
                'name' => 'title',
                'label' => __('Title'),
                'id' => 'title',
                'title' => __('Title'),
                'class' => 'required-entry',
                'required' => true,
            ]
        );

        $fieldset->addField(
            'description',
            'textarea',
            [
                'name' => 'description',
                'label' => __('Description'),
                'id' => 'description',
                'title' => __('Description'),
                'class' => 'required-entry',
                'required' => true,
            ]
        );


        $fieldset->addField(
            'status',
            'select',
            [
                'name' => 'status',
                'label' => __('Status'),
                'id' => 'status',
                'title' => __('Status'),
                'options' => [0 => __('Disabled'), 1 => __('Enabled')],
                'class' => 'status',
                'required' => true,
            ]
        );

        $typeOfContent = $fieldset->addField(
            'type',
            'select',
            [
                'name' => 'type',
                'label' => __('Type Of Content'),
                'id' => 'type',
                'title' => __('Type Of Content'),
                'options' => [0 => __('Video'), 1 => __('Full Image'), 2 => __('Left Image & Right Content'), 3 => __('Right Image & Left Content')],
                'class' => 'type',
                'required' => true,
            ]
        );

        $typeOfVideo = $fieldset->addField(
            'videotype',
            'select',
            [
                'name' => 'videotype',
                'label' => __('Type Of Video'),
                'id' => 'videotype',
                'title' => __('Type Of Video'),
                'options' => [0 => __('Upload a video'), 1 => __('External Link')],
                'class' => 'type',
                'required' => true,
            ]
        );

        $fileupload = $fieldset->addField(
            'fileupload',
            'image',
            [
                'name' => 'fileupload',
                'id' => 'fileupload',
                'label' => __('Upload File'),
                'title' => __('File'),
                'note' => 'Allow file type: Image, Video',
                'required'  => true,
            ]
        );
        $videoLink = $fieldset->addField(
            'videolink',
            'text',
            [
                'name' => 'videolink',
                'label' => __('Video link'),
                'id' => 'videolink',
                'title' => __('Video link'),
                'class' => 'required-entry',
                'required' => true,
            ]
        );

        $fieldset->addField(
            'position',
            'text',
            [
                'name' => 'position',
                'label' => __('Position'),
                'id' => 'position',
                'title' => __('Position'),
                'class' => 'required-entry',
                'required' => true,
            ]
        );


        $form->setValues($model->getData());
        $this->setForm($form);

        $this->setChild(
            'form_after',
            $this->getLayout()->createBlock('\Magento\Backend\Block\Widget\Form\Element\Dependence')
                ->addFieldMap($typeOfContent->getHtmlId(), $typeOfContent->getName())
                ->addFieldMap($typeOfVideo->getHtmlId(), $typeOfVideo->getName())
                ->addFieldMap($videoLink->getHtmlId(), $videoLink->getName())
                // ->addFieldMap($fileupload->getHtmlId(), $fileupload->getName())
                ->addFieldDependence($typeOfVideo->getName(), $typeOfContent->getName(), 0)
                ->addFieldDependence($videoLink->getName(), $typeOfVideo->getName(), 1)
                // ->addFieldDependence($fileupload->getName(), $typeOfVideo->getName(), 0)
                // ->addFieldDependence($fileupload->getName(), $typeOfContent->getName(), ['1','2','3'])
                // ->addFieldDependence($fileupload->getName(), $typeOfContent->getName(), 2)
                // ->addFieldDependence($fileupload->getName(), $typeOfContent->getName(), 3)
                ->addFieldDependence($videoLink->getName(), $typeOfContent->getName(), 0)


        );

        return parent::_prepareForm();
    }
}
?>