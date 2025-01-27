<?php

declare(strict_types=1);

/*
 * This file is part of the Sonata Project package.
 *
 * (c) Thomas Rabaix <thomas.rabaix@sonata-project.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sonata\IntlBundle\Twig;

use Sonata\IntlBundle\Templating\Helper\DateTimeHelper;
use Twig\Extension\RuntimeExtensionInterface;

final class DateTimeRuntime implements RuntimeExtensionInterface
{
    /**
     * @var DateTimeHelper
     */
    private $helper;

    public function __construct(DateTimeHelper $helper)
    {
        $this->helper = $helper;
    }

    /**
     * @param \DateTime|string|int $date
     * @param string|null          $pattern
     * @param string|null          $locale
     * @param string|null          $timezone
     * @param int|null             $dateType
     *
     * @return string
     */
    public function formatDate($date, $pattern = null, $locale = null, $timezone = null, $dateType = null)
    {
        if (null !== $pattern) {
            return $this->helper->format($date, $pattern, $locale, $timezone);
        }

        return $this->helper->formatDate($date, $locale, $timezone, $dateType);
    }

    /**
     * @param \DateTime|string|int $time
     * @param string|null          $pattern
     * @param string|null          $locale
     * @param string|null          $timezone
     * @param int|null             $timeType
     *
     * @return string
     */
    public function formatTime($time, $pattern = null, $locale = null, $timezone = null, $timeType = null)
    {
        if (null !== $pattern) {
            return $this->helper->format($time, $pattern, $locale, $timezone);
        }

        return $this->helper->formatTime($time, $locale, $timezone, $timeType);
    }

    /**
     * @param \DateTime|string|int $time
     * @param string|null          $pattern
     * @param string|null          $locale
     * @param string|null          $timezone
     * @param int|null             $dateType
     * @param int|null             $timeType
     *
     * @return string
     */
    public function formatDatetime($time, $pattern = null, $locale = null, $timezone = null, $dateType = null, $timeType = null)
    {
        if (null !== $pattern) {
            return $this->helper->format($time, $pattern, $locale, $timezone);
        }

        return $this->helper->formatDateTime($time, $locale, $timezone, $dateType, $timeType);
    }
}
