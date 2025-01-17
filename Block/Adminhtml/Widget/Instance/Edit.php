<?php

declare(strict_types=1);

namespace Triveon\DuplicateWidget\Block\Adminhtml\Widget\Instance;

use Magento\Widget\Block\Adminhtml\Widget\Instance\Edit as MagentoEdit;

class Edit extends MagentoEdit
{
    /**
     * Function to add "Save and duplicate" button to the widget edit page
     * @return Edit
     * phpcs:disable PSR2.Methods.MethodDeclaration.Underscore
     */
    protected function _preparelayout(): Edit
    {
        $widgetInstance = $this->getWidgetInstance();
        if ($widgetInstance->isCompleteToCreate()) {
            $this->buttonList->add(
                'save_and_duplicate_button',
                [
                    'label' => __('Save and Duplicate'),
                    'class' => 'save',
                    'data_attribute' => [
                        'mage-init' => [
                            'button' => ['event' => 'saveAndDuplicate', 'target' => '#edit_form'],
                        ],
                    ]
                ],
                90
            );
        }
        return parent::_prepareLayout();
    }
}
