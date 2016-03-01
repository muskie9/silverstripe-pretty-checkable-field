<?php

/**
 * Class PrettyCheckableBoxField
 */
class PrettyCheckableBoxField extends CheckboxField
{

    /**
     * @var bool
     */
    private static $require_css = true;

    /**
     * @var array
     */
    public $pretty_checkable_config = array();

    /**
     * @param array $properties
     * @return HTMLText
     */
    public function Field($properties = array())
    {
        $this->addExtraClass('prettycheckablefield')
            ->setAttribute('data-prettycheckableconfig', Convert::array2json($this->pretty_checkable_config));

        //allow for not including default styles
        if ($this->config()->get('require_css') == true) {
            Requirements::css(PRETTY_CHECKABLE_FIELD_THIRDPARTY . '/prettyCheckable-2.1.2/dist/prettyCheckable.css');
        }
        Requirements::javascript(PRETTY_CHECKABLE_FIELD_THIRDPARTY . '/prettyCheckable-2.1.2/dist/prettyCheckable.min.js');
        Requirements::javascript(PRETTY_CHECKABLE_FIELD_JAVASCRIPT . '/pretty.checkable.box.field.js');

        return parent::Field($properties);
    }

    /**
     * @param null $key
     * @param null $val
     * @return $this
     */
    public function setPrettyCheckableConfig($key = null, $val = null)
    {
        if($key === null || $val === null){
            user_error('Both $key and $val need to have non-null values in setPrettyCheckableConfig()', E_USER_ERROR);
        }
        $this->pretty_checkable_config[$key] = $val;
        return $this;
    }

    /**
     * @return array
     */
    public function getPrettyCheckableConfig()
    {
        return $this->pretty_checkable_config;
    }

}
