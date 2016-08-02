<?php

namespace DesignPatterns\Creational\AbstractFactory;

/**
 * MediaInterface�ӿ�
 *
 * �ýӿڲ��ǳ��󹤳����ģʽ��һ����, һ�������, ÿ��������ǲ���ɵ�
 */
interface MediaInterface
{

    /**
     * JSON �� HTML��ȡ���ھ����ࣩ�����δ���������Ⱦ
     *
     * @return string
     */
    public function render();
}