<?php

Yii::import('booster.widgets.TbExtendedGridView');

/**
 * Extends CGridView, adding drop down menu that controls the page size (number of items showed per page)
 */
class Tb_ExtendedGridView extends TbExtendedGridView {

        /**
         * @var string overides the parent default.
         */
        public $template = "{items}\n{limit}\n{pager}";

        /**
         * @var array the option values for use in the drop down
         */
        public $pageSizeOptions = array('10' => '10', '25' => '25', '50' => '50', '100' => '100');

        /**
         * @var integer the default page size (items per page shown)
         */
        protected $defaultPageSize;

        public function init() {
                //Yii::log(CVarDumper::dumpAsString($this->customHtml), 'debug');
                if(isset($_GET['pageSize']) && is_numeric($_GET['pageSize'])) {
                        Yii::app()->user->setState('pageSize', intval($_GET['pageSize']));
                }
                
                $pageSize = Yii::app()->user->getState('pageSize');
                $this->defaultPageSize = is_numeric($pageSize) ? $pageSize : $this->dataProvider->pagination->pageSize;
        
                $this->dataProvider->setPagination(array(
                        'pageSize' => intval($this->defaultPageSize)
                ));
                
                parent::init();
        }

        /**
         * Renders the Show X amount of items drop down.
         */
        public function renderLimit() {  
                $id = $this->getId();       
                echo CHtml::openTag('div', array('class' => 'grid-limit'));
                echo CHtml::label('Limit :', null);
                echo CHtml::dropDownList('pageSize', $this->defaultPageSize, $this->pageSizeOptions, array(
                        'class'=>'grid-limit-field',
                        'id'=>__CLASS__.$this->getId(),
                        'onchange' => "$.fn.yiiGridView.update('{$id}',{
                            data: {
                                pageSize:$(this).val()
                            }
                        }
                        );",
                ));
                echo CHtml::closeTag('div');
        }

        /**
         * Overides parent to add in jQuery for the changing of the drop down lists.
         */
        public function registerClientScript() {
                parent::registerClientScript();

                $id = $this->getId();
                Yii::app()->getClientScript()->registerScript(__CLASS__ . '#' . $id . '#limit-field', <<<___JS___
                $('#{$this->getId()} .grid-limit-field').live( 'change', function() { 
                        $.fn.yiiGridView.update('{$id}', { data: $(this).serialize() }); 
                        return false; 
                });
___JS___
                , CClientScript::POS_READY);
        }

}