<?php

namespace App;

class Page {

    public ?string $title = null;

    public ?string $content = null;

    public string $structure = "structure.php";

    public function __construct(array $configOptions = null)
    {
        if ($configOptions) {
            $props = ["title", "content", "structure"];

            foreach ($props as $key) {
                if (isset($configOptions[$key])) {
                    $this->$key = $configOptions[$key];
                }
            }
        }
    }

    /**
     * Défini le contenu de la page depuis un fichier.
     */
    public function setContentFromFile(string $filename): self
    {
        $this->content = file_get_contents($filename);
        return $this;
    }

    /**
     * Affiche la page
     */
    public function render()
    {
        $page = $this;
        include(__DIR__ . "/../template/".$this->structure);
    }
}