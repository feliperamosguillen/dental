<?php

namespace App\Http\Controllers\Admin\DataTables;

use App\Base\Controllers\DataTableController;
use App\Models\Schedule;

class ScheduleDataTable extends DataTableController
{
    /**
     * @var string
     */
    protected $model = Schedule::class;

    /**
     * Columns to show
     *
     * @var array
     */
    protected $columns = ['id', 'doctor.name', 'patient.name', 'patient.lastname', 'patient.ages', 'selected_date', 'selected_hour'];

    protected $common_columns = ['created_at'];

    /**
     * @var bool
     */
    protected $ops = true;

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        return $this->applyScopes(Schedule::with('doctor')->with('patient'));
    }
}
