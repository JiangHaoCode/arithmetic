<?php
namespace DesignPatterns\Creational\AbstractFactory;

/**
 * HtmlFactory��
 *
 * HtmlFactory �����ڴ��� HTML ����Ĺ���
 */
class HtmlFactory extends AbstractFactory
{
    /**
     * ����ͼƬ���
     *
     * @param string $path
     * @param string $name
     *
     * @return Html\Picture|Picture
     */
    public function createPicture($path, $name = '')
    {
        return new Html\Picture($path, $name);
    }

    /**
     * �����ı����
     *
     * @param string $content
     *
     * @return Html\Text|Text
     */
    public function createText($content)
    {
        return new Html\Text($content);
    }
}