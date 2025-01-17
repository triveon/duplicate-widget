<?php

declare(strict_types=1);

namespace Triveon\DuplicateWidget\Plugin\Controller\Adminhtml\Widget\Instance;

use Exception;
use Magento\Widget\Controller\Adminhtml\Widget\Instance\Save as MagentoSave;
use Magento\Widget\Model\Widget\Instance as WidgetInstance;

class Save extends MagentoSave
{
    /**
     * Function to duplicate the widget instance
     * @param MagentoSave $subject
     * @return void
     * @suppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function afterExecute(MagentoSave $subject): void
    {
        if ($this->getRequest()->getParam('back') !== 'duplicate') {
            return;
        }

        $widgetInstance = $this->_coreRegistry->registry('current_widget_instance');
        if (!$widgetInstance) {
            $this->messageManager->addErrorMessage(__('The widget instance cannot be duplicated.'));
            $this->_redirect('adminhtml/*/edit', ['_current' => true]);
            return;
        }

        try {
            $duplicatedWidgetInstance = $this->duplicateWidgetInstance($widgetInstance)->save();
            $this->messageManager->addSuccessMessage(__('The widget instance has been duplicated.'));
            $this->_redirect(
                'adminhtml/*/edit',
                ['instance_id' => $duplicatedWidgetInstance->getId(), '_current' => true]
            );
        } catch (Exception $exception) {
            $this->messageManager->addErrorMessage($exception->getMessage());
            $this->_logger->critical($exception);
            $this->_redirect('adminhtml/*/edit', ['_current' => true]);
            return;
        }
    }

    /**
     * @param WidgetInstance $widgetInstance
     * @return WidgetInstance
     */
    private function duplicateWidgetInstance(WidgetInstance $widgetInstance): WidgetInstance
    {
        $duplicatedWidget = $this->_widgetFactory->create(['data' => $widgetInstance->getData()]);

        $duplicatedWidget->setTitle(
            sprintf('%s (duplicated)', $this->getRequest()->getPost('title'))
        )->setStoreIds(
            $this->getRequest()->getPost('store_ids', [0])
        )->setSortOrder(
            $this->getRequest()->getPost('sort_order', 0)
        )->setPageGroups(
            $this->getRequest()->getPost('widget_instance')
        )->setWidgetParameters(
            $this->getRequest()->getPost('parameters')
        )->setId(
            null
        );

        return $duplicatedWidget;
    }
}
