<?php

namespace DesignPatterns\Creational\AbstractFactory\Tests;

use DesignPatterns\Creational\AbstractFactory\AbstractFactory;
use DesignPatterns\Creational\AbstractFactory\HtmlFactory;
use DesignPatterns\Creational\AbstractFactory\JsonFactory;

/**
 * AbstractFactoryTest ���ڲ��Ծ���Ĺ���
 */
class AbstractFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function getFactories()
    {
        return array(
            array(new JsonFactory()),
            array(new HtmlFactory())
        );
    }

    /**
     * �����ǹ����Ŀͻ��ˣ�����������Ĵ��ݹ�������ʲô�����࣬
     * ֻ����������Ҫ�ķ�ʽ��Ⱦ������Ҫ��������ɡ�
     *
     * @dataProvider getFactories
     */
    public function testComponentCreation(AbstractFactory $factory)
    {
        $article = array(
            $factory->createText('LaravelѧԺ'),
            $factory->createPicture('/image.jpg', 'laravel-academy'),
            $factory->createText('LaravelAcademy.org')
        );

        $this->assertContainsOnly('DesignPatterns\Creational\AbstractFactory\MediaInterface', $article);
    }
}