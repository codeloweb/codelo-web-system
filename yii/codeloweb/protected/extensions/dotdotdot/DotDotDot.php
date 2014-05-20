<?php

/**
 * DotDotDot Class
 * @author Gia Duy (admin@giaduy.info)
 * @usage $this->widget('plugins.dotdotdot.DotDotDot', array());
 */
class DotDotDot extends CWidget {
    
    const PACKAGE_ID = __CLASS__;

    public $selector = '.dot3';
    public $options = array();
    protected $package = array();    

    public function init() {
        parent::init();
        $this->package = array(
            'baseUrl' => $this->assetsUrl,
            'js' => array(                
                YII_DEBUG ? 'jquery.dotdotdot-1.5.7.js' : 'jquery.dotdotdot-1.5.7-packed.js',
            ),
            'depends' => array(
                'jquery',
            ),
        );
        Yii::app()->clientScript->addPackage(self::PACKAGE_ID, $this->package)->registerPackage(self::PACKAGE_ID);
    }

    public function run() {
        parent::run();        
        $options = CJavaScript::encode($this->options);
        $script = '$("' . $this->selector . '").dotdotdot(' . $options . ');';
        Yii::app()->clientScript->registerScript(__CLASS__.$this->selector, $script, CClientScript::POS_READY);
    }

    /**
     * Get the assets path.
     * @return string
     */
    public function getAssetsPath() {
        return dirname(__FILE__) . '/assets';
    }

    /**
     * Publish assets and return url.
     * @return string
     */
    public function getAssetsUrl() {
        return Yii::app()->assetManager->publish($this->assetsPath);
    }

}
