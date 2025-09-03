<?php

namespace gipfl\Log;

use Composer\InstalledVersions;

class PsrVersion
{
    public static function isV3(): bool
    {
        return PHP_VERSION_ID >= 80000 && version_compare(InstalledVersions::getVersion('psr/log'), '3.0.0.0', '>=');
    }
}
