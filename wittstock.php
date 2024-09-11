<?php
// Wittstock extension, https://github.com/schulle4u/yellow-wittstock

class YellowWittstock {
    const VERSION = "0.9.3";
    public $yellow;         // access to API
    
    // Handle initialisation
    public function onLoad($yellow) {
        $this->yellow = $yellow;
    }
    
    // Handle update
    public function onUpdate($action) {
        $fileName = $this->yellow->system->get("coreExtensionDirectory").$this->yellow->system->get("coreSystemFile");
        if ($action=="install") {
            $this->yellow->system->save($fileName, array("theme" => "wittstock"));
        } elseif ($action=="uninstall" && $this->yellow->system->get("theme")=="wittstock") {
            $this->yellow->system->save($fileName, array("theme" => $this->yellow->system->getDifferent("theme")));
        }
    }
}
