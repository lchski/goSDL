<?php

declare(strict_types=1);

require(dirname(__FILE__).'/../include/lib_sdl.php');

use PHPUnit\Framework\TestCase;

final class HelperTest extends TestCase
{
    protected $list_with_both_modules = ["../www/sdl/modules/languages.json","../www/sdl/modules/languages.json13add3ace4d7ac08f0190cb68b6f71d6"];
    protected $list_with_just_submodule = ["../www/sdl/modules/languages.json13add3ace4d7ac08f0190cb68b6f71d6"];

    public function testParentModuleAddedIfOnlySubmodulePresent(): void {
        $this->assertEquals(
            sort(_sdl_add_parent_modules($this->list_with_just_submodule)),
            sort($this->list_with_both_modules)
        );
    }

    public function testPathReferencesSubmodule(): void {
        $this->assertTrue(_sdl_path_references_submodule("../www/sdl/modules/languages.json13add3ace4d7ac08f0190cb68b6f71d6"));
        $this->assertFalse(_sdl_path_references_submodule("../www/sdl/modules/languages.json"));
    }

    public function testIsModuleListMissingParentModule(): void {
        $this->assertTrue(_sdl_is_module_list_missing_parent_module($this->list_with_just_submodule));
        $this->assertFalse(_sdl_is_module_list_missing_parent_module($this->list_with_both_modules));
    }
}
