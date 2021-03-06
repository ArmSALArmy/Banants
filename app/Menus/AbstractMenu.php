<?php
/**
 * User: Arsen
 * Date: 03.10.14
 * Time: 0:52
 * Класс страницы
 * Употребляется в виде для отабражения элементов страницы
 * по средствам его методов
 */

namespace Menus;
restrictAccess();


abstract class AbstractMenu {

    const SUB_MENU_NAMESPACE = 'Menus\Menu\SubMenu\\';

    /**
     * Тип страницы
     */
    protected $_type;

    /**
     * Позиция
     */
    protected $_position;

    /**
     * Индекс сортировки
     */
    protected $_sort;

    /**
     * Шаблон
     */
    protected $_template;

    /**
     * Пункти суб-меню
     */
    protected $_subMenuItems;

    /**
     * Параметри в виде JSON-а
     */
    protected $_param;

    public function getPosition(){}
    public function getSorting(){}
    public function render(){}
    public function subMenuRender($children){}
    public function hasSubMenu($position){return false;}
    public function init($model){}
    public function initSubMenu($model){}


} 