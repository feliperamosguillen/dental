<?php

namespace App\Models;

use App\Base\SluggableModel;

class Schedule extends SluggableModel
{
    /**
     * @return string
     */
    public function getLinkAttribute(): string
    {
        return route('schedule', ['scheduleSlug' => $this->slug]);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function doctor(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Doctor::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function patient(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }
}
