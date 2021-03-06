<?php
/**
 * @copyright  Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
namespace Magento\Core\Filter;

class DateTest extends \PHPUnit_Framework_TestCase
{
    public function testFilter()
    {
        $localeMock = $this->getMock('\Magento\Core\Model\LocaleInterface');
        $localeMock->expects($this->once())
            ->method('getDateFormat')
            ->with(\Magento\Core\Model\LocaleInterface::FORMAT_TYPE_SHORT)
            ->will($this->returnValue('MM-dd-yyyy'));
        $model = new Date($localeMock);
        // Check that date is converted to 'yyyy-MM-dd' format
        $this->assertEquals('2241-12-31', $model->filter('12-31-2241'));
    }
}
