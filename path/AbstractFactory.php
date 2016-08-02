<?php

namespace DesignPatterns\Creational\AbstractFactory;
/**
 * ���󹤳���
 *
 * �����ģʽʵ�������ģʽ����������ԭ����Ϊ�����ɾ������ഴ���������
 *
 * �ڱ����У����󹤳�Ϊ���� Web �������Ʒ���ṩ�˽ӿڣ�����������������ı���ͼƬ����������Ⱦ��ʽ��HTML
 * �� JSON����Ӧ�ĸ�����ʵ���ࡣ
 *
 * �������ĸ������࣬���ǿͻ���ֻ��Ҫ֪������ӿڿ������ڹ�����ȷ�� HTTP ��Ӧ���ɣ�������������ʵ�֡�
 */

abstract class AbstractFactory{
    abstract public function createText($content);

    abstract public function createPicture($path, $name='');
}