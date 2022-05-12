<?php
/**
 * User: PaulTung
 * Date: 7/26/2020
 * Time: 3:49 PM
 */

namespace app\mvcCore\form;


/**
 * Class TextareaField
 *
 * @author  Paul Dong <paul@calgah.com>
 * @package app\mvcCore\form
 */
class TextareaField extends BaseField
{
  public function renderInput()
  {
    return sprintf('<textarea class="form-control%s" name="%s">%s</textarea>',
      $this->model->hasError($this->attribute) ? ' is-invalid' : '',
      $this->attribute,
      $this->model->{$this->attribute},
    );
  }
}