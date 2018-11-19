<?php

namespace pvsaintpe\behaviors;

use pvsaintpe\search\components\ActiveRecord;
use yii\behaviors\BlameableBehavior as BaseBlameableBehavior;

/**
 * Class BlameableBehavior
 * @package common\behaviors
 */
class BlameableBehavior extends BaseBlameableBehavior
{
    public function init()
    {
    }

    /**
     * @return array
     */
    public function events()
    {
        if ($this->owner->hasAttribute($this->updatedByAttribute)) {
            $this->attributes[ActiveRecord::EVENT_BEFORE_INSERT] = $this->updatedByAttribute;
            $this->attributes[ActiveRecord::EVENT_BEFORE_UPDATE] = $this->updatedByAttribute;
        }
        if ($this->owner->hasAttribute($this->createdByAttribute)) {
            $this->attributes[ActiveRecord::EVENT_BEFORE_INSERT] = $this->createdByAttribute;
        }
        return parent::events();
    }
}