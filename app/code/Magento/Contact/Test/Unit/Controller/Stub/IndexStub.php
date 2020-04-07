<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Magento\Contact\Test\Unit\Controller\Stub;

use Magento\Contact\Controller\Index;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultInterface;

class IndexStub extends Index
{
    /**
     * @return ResponseInterface|ResultInterface|void
     */
    public function execute()
    {
        // Empty method stub for test
    }
}
