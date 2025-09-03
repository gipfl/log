<?php

namespace gipfl\Log;

use Composer\InstalledVersions;
use gipfl\Log\PsrLogV1\PrefixLoggerV1;
use gipfl\Log\PsrLogV3\PrefixLoggerV3;

if (PHP_VERSION_ID >= 80000 && version_compare(InstalledVersions::getVersion('psr/log'), '3.0.0.0', '>=')) {
    // @codingStandardsIgnoreStart
    class PrefixLogger extends PrefixLoggerV3
    {
    }
} else {
    // @codingStandardsIgnoreStart
    class PrefixLogger extends PrefixLoggerV1
    {
    }
}
