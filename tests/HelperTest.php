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
            sort($this->list_with_both_modules),
            sort(_sdl_add_missing_parent_modules($this->list_with_just_submodule))
        );
    }

    public function testPathReferencesSubmodule(): void {
        $this->assertTrue(_sdl_path_references_submodule("../www/sdl/modules/languages.json13add3ace4d7ac08f0190cb68b6f71d6"));
        $this->assertFalse(_sdl_path_references_submodule("../www/sdl/modules/languages.json"));
    }

    public function testModuleListContainsModule(): void {
        $this->assertFalse(_sdl_module_list_contains_module($this->list_with_just_submodule, "../www/sdl/modules/languages.json"));
        $this->assertTrue(_sdl_module_list_contains_module($this->list_with_both_modules, "../www/sdl/modules/languages.json"));
    }

    public function testGetSubmoduleParentModulePath(): void {
        $this->assertEquals(
            "../www/sdl/modules/languages.json",
            _sdl_get_submodule_parent_module_path("../www/sdl/modules/languages.json13add3ace4d7ac08f0190cb68b6f71d6")
        );

        $this->assertEquals(
            "../www/sdl/modules/languages.json",
            _sdl_get_submodule_parent_module_path("../www/sdl/modules/languages.json")
        );
    }
}
