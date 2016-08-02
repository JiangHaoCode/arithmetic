<?php

namespace DesignPatterns\Creational\AbstractFactory\Html;

use DesignPatterns\Creational\AbstractFactory\Text as BaseText;

/**
 * Text ��
 *
 * �������� HTML ��Ⱦ�ľ����ı������
 */
class Text extends BaseText
{
    /**
     * HTML ��ʽ������ı�
     *
     * @return string
     */
    public function render()
    {
        return '<div>' . htmlspecialchars($this->text) . '</div>';
    }
}