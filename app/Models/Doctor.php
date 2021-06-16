<?php

namespace App\Models;

use App\Base\SluggableModel;

class Doctor extends SluggableModel
{
    protected $fillable = ['name', 'speciality', 'picture'];

    /**
     * @return string
     */
    public function getLinkAttribute(): string
    {
        return route('doctor', ['doctorSlug' => $this->slug]);
    }
}
