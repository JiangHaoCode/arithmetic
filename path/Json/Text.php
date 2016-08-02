<?php

namespace DesignPatterns\Creational\AbstractFactory\Json;

use DesignPatterns\Creational\AbstractFactory\Text as BaseText;

/**
 * Class Text
 *
 * �������� JSON ��ʽ����ľ����ı������
 */
class Text extends BaseText
{
    /**
     * �� JSON ��ʽ�������Ⱦ
     *
     * @return string
     */
    public function render()
    {
        return json_encode(array('content' => $this->text));
    }
}