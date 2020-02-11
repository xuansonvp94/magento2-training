<?php

namespace Son\Office\Block\Adminhtml\Department\Edit;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

class SaveButton extends GenericButton implements ButtonProviderInterface
{
    public function getButtonData()
    {
        return [
            'label' => __('Save Department'),
            'class' => 'save primary',
            'data_attribute' => [
                'form-role' => 'save',
            ],
            'on_click' => sprintf("location.href= '%s';", $this->getSaveUrl()),
            'sort_order' => 90,
        ];
    }

    public function getSaveUrl()
    {
        return $this->getUrl('son/department/save') ;
    }
}
