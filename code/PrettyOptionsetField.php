<?php

/**
 * Class PrettyOptionsetField
 */
class PrettyOptionsetField extends OptionsetField
{

    /**
     * @var bool
     */
    private static $require_css = true;

    /**
     * @var array
     */
    protected $pretty_optionset_config = array();

    /**
     * @param array $properties
     * @return HTMLText
     */
    public function Field($properties = array())
    {
        $this->addExtraClass('prettyoptionsetfield')
            ->setAttribute('data-prettyoptionsetconfig', Convert::array2json($this->pretty_optionset_config));

        //allow for not including default styles
        if ($this->config()->get('require_css') == true) {
            Requirements::css(PRETTY_CHECKABLE_FIELD_THIRDPARTY . '/prettyCheckable-2.1.2/dist/prettyCheckable.css');
        }
        Requirements::javascript(PRETTY_CHECKABLE_FIELD_THIRDPARTY . '/prettyCheckable-2.1.2/dist/prettyCheckable.min.js');
        if(is_a($this->Form, 'BootstrapForm')){
            Requirements::javascript(PRETTY_CHECKABLE_FIELD_JAVASCRIPT . 'pretty.optionset.field.bootstrap.js');
        }else{
            Requirements::javascript(PRETTY_CHECKABLE_FIELD_JAVASCRIPT . 'pretty.optionset.field.js');
        }

        return parent::Field($properties);
    }

    /**
     * @param null $key
     * @param null $val
     * @return $this
     */
    public function setPrettyOptionsetConfig($key = null, $val = null)
    {
        if ($key === null || $val === null) {
            user_error('Both $key and $val need to have non-null values in setPrettyOptionsetConfig()', E_USER_ERROR);
        }
        $this->pretty_optionset_config[$key] = $val;
        return $this;
    }

    /**
     * @return array
     */
    public function getPrettyOptionsetConfig()
    {
        return $this->pretty_optionset_config;
    }

}
