<?php
namespace DesignPatterns\Creational\AbstractFactory;

class JsonFactory extends AbstractFactory{

    public function createPicture($path, $name = '')
    {
        return new Json\Picture($path, $name);
    }

    public function createText($content)
    {
        return new Json\Text($content);
    }
}