<?php

namespace DesignPatterns\Creational\AbstractFactory\Json;

use DesignPatterns\Creational\AbstractFactory\Picture as BasePicture;

/**
 * Picture��
 *
 * �������� JSON ��ʽ����ľ���ͼƬ�����
 */
class Picture extends BasePicture
{
    /**
     * JSON ��ʽ���
     *
     * @return string
     */
    public function render()
    {
        return json_encode(array('title' => $this->name, 'path' => $this->path));
    }
}