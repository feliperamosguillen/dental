<?php

namespace App\Http\Controllers\Admin\DataTables;

use App\Base\Controllers\DataTableController;
use App\Models\Doctor;

class DoctorDataTable extends DataTableController
{
    /**
     * @var string
     */
    protected $model = Doctor::class;

    /**
     * Columns to show
     *
     * @var array
     */
    protected $columns = ['name', 'speciality'];

    /**
     * @var bool
     */
    protected $ops = true;

    protected $image_columns = ['picture'];

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        return $this->applyScopes(Doctor::query());
    }
}
