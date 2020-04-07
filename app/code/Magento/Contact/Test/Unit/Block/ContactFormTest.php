<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Magento\Contact\Test\Unit\Block;

use Magento\Contact\Block\ContactForm;
use Magento\Framework\TestFramework\Unit\Helper\ObjectManager as ObjectManagerHelper;
use Magento\Framework\UrlInterface;
use Magento\Framework\View\Element\Template\Context;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

/**
 * Test Covers Magento\Contact\Block\ContactForm
 */
class ContactFormTest extends TestCase
{
    /**
     * @var ContactForm
     */
    protected $contactForm;

    /**
     * @var Context|MockObject
     */
    protected $contextMock;

    /**
     * @var UrlInterface|MockObject
     */
    protected $urlBuilderMock;

    /**
     * {@inheritDoc}
     */
    protected function setUp(): void
    {
        $this->contextMock = $this->getMockBuilder(Context::class)
            ->disableOriginalConstructor()
            ->setMethods(['getUrlBuilder'])
            ->getMock();

        $this->urlBuilderMock = $this->getMockBuilder(UrlInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->contextMock->expects($this->any())
            ->method('getUrlBuilder')
            ->willReturn($this->urlBuilderMock);

        $this->contactForm = (new ObjectManagerHelper($this))->getObject(
            ContactForm::class,
            [
                'context' => $this->contextMock
            ]
        );
    }

    /**
     * Test isScopePrivate()
     */
    public function testScope(): void
    {
        $this->assertTrue($this->contactForm->isScopePrivate());
    }

    /**
     * Test get form action
     */
    public function testGetFormAction(): void
    {
        $this->urlBuilderMock->expects($this->once())
            ->method('getUrl')
            ->with('contact/index/post', ['_secure' => true]);
        $this->contactForm->getFormAction();
    }
}
