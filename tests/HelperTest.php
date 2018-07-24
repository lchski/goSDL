<?php

declare(strict_types=1);

require(dirname(__FILE__).'/../include/lib_sdl.php');

use PHPUnit\Framework\TestCase;

final class HelperTest extends TestCase
{
    public function testParentModuleAddedIfOnlySubmodulePresent(): void {
        $this->assertEquals(
            _sdl_add_parent_modules(["../www/sdl/modules/languages.json13add3ace4d7ac08f0190cb68b6f71d6"]),
            ["../www/sdl/modules/languages.json","../www/sdl/modules/languages.json13add3ace4d7ac08f0190cb68b6f71d6"]
        );
    }
}
