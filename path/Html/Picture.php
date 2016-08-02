<?php

namespace DesignPatterns\Creational\AbstractFactory\Html;

use DesignPatterns\Creational\AbstractFactory\Picture as BasePicture;

/**
 * Picture ��
 *
 * �������� HTML ��ʽ��Ⱦ�ľ���ͼƬ��
 */
class Picture extends BasePicture
{
    /**
     * HTML ��ʽ�����ͼƬ
     *
     * @return string
     */
    public function render()
    {
        return sprintf('<img src="%s" title="%s"/>', $this->path, $this->name);
    }
}