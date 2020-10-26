<?php


namespace app\core\form;

use app\core\Model;

class Field
{
    public string $type;
    public Model $model;
    public string $attribute;

    public function __construct(Model $model, $attribute, $type)
    {
        $this->model = $model;
        $this->attribute = $attribute;
        $this->type = $type;
    }

    //magic method - what ever is return from this it will be printed
    public function __toString()
    {
        return sprintf(
            '
        <div class="form-group">
            <label>%s</label>
            <input type="%s" name="%s" value="%s" class="form-control %s">
            <div class="invalid-feedback">%s</div>
        </div>
        ',
            $this->model->getLabel($this->attribute),
            $this->type,
            $this->attribute,
            $this->model->{$this->attribute},
            $this->model->hasError($this->attribute) ? 'is-invalid' : '',
            $this->model->getFirstError($this->attribute)
        );
    }
}