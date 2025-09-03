<?php

namespace gipfl\Log;

use Composer\InstalledVersions;
use gipfl\Log\PsrLogV1\AdditionalContextLoggerV1;
use gipfl\Log\PsrLogV3\AdditionalContextLoggerV3;

if (PHP_VERSION_ID >= 80000 && version_compare(InstalledVersions::getVersion('psr/log'), '3.0.0.0', '>=')) {
    // @codingStandardsIgnoreStart
    class AdditionalContextLogger extends AdditionalContextLoggerV3
    {
    }
} else {
    // @codingStandardsIgnoreStart
    class AdditionalContextLogger extends AdditionalContextLoggerV1
    {
    }
}
