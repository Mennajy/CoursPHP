<?php

namespace Studio321\Entity;

class DefaultEntityClass
{
    public function __construct($data)
    {
        $props = get_object_vars($data);
        foreach ($props as $prop => $value) {
            $this->$prop = $value;
        }
    }

    /**
     * Mets à jour l'entité courante dans la base
     */
    public function update()
    {

    }

    /**
     * Supprime l'entité courante dans la base
     */
    public function delete()
    {

    }
}
