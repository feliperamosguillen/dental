<?php

namespace App\Models;

use App\Base\SluggableModel;

class Patient extends SluggableModel
{
    /**
     * @return string
     */
    public function getLinkAttribute(): string
    {
        return route('patient', ['patientSlug' => $this->slug]);
    }
}
