<?php

namespace gipfl\Log;

use Composer\InstalledVersions;
use gipfl\Log\PsrLogV1\LoggerV1;
use gipfl\Log\PsrLogV3\LoggerV3;

if (PHP_VERSION_ID >= 80000 && version_compare(InstalledVersions::getVersion('psr/log'), '3.0.0.0', '>=')) {
    // @codingStandardsIgnoreStart
    class Logger extends LoggerV3
    {
    }
} else {
    // @codingStandardsIgnoreStart
    class Logger extends LoggerV1
    {
    }
}
