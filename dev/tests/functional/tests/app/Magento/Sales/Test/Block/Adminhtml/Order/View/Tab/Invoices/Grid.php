<?php
/**
 * Copyright © 2016 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magento\Sales\Test\Block\Adminhtml\Order\View\Tab\Invoices;

/**
 * Invoices grid on order view page.
 */
class Grid extends \Magento\Ui\Test\Block\Adminhtml\DataGrid
{
    /**
     * Locator value for link in action column.
     *
     * @var string
     */
    protected $editLink = '[data-column="increment_id"]';

    /**
     * Locator for invoice ids
     *
     * @var string
     */
    protected $invoiceId = 'tbody td:nth-child(2)';

    /**
     * Invoices data grid loader locator.
     *
     * @var string
     */
    protected $loader = '[data-component="sales_order_view_invoice_grid"]';

    /**
     * Filters array mapping.
     *
     * @var array
     */
    protected $filters = [
        'id' => [
            'selector' => 'input[name="increment_id"]',
        ],
        'order_id' => [
            'selector' => 'input[name="order_increment_id"]',
        ],
        'status' => [
            'selector' => 'select[name="state"]',
            'input' => 'select',
        ],
        'amount_from' => [
            'selector' => 'input[name="grand_total[from]"]',
        ],
        'amount_to' => [
            'selector' => 'input[name="grand_total[to]"]',
        ],
    ];

    /**
     * Get invoice ids.
     *
     * @return array
     */
    public function getIds()
    {
        $result = [];
        $this->waitForElementNotVisible($this->loader);
        $invoiceIds = $this->_rootElement->getElements($this->invoiceId);
        foreach ($invoiceIds as $invoiceId) {
            $result[] = trim($invoiceId->getText());
        }

        return $result;
    }

    /**
     * Click the 'View' link for invoice in Invoices grid.
     *
     * @return void
     */
    public function viewInvoice()
    {
        $this->waitForElementNotVisible($this->loader);
        $this->_rootElement->find($this->invoiceId)->click();
    }
}
