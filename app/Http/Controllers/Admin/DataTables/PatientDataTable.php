<?php

namespace App\Http\Controllers\Admin\DataTables;

use App\Base\Controllers\DataTableController;
use App\Models\Patient;

class PatientDataTable extends DataTableController
{
    /**
     * @var string
     */
    protected $model = Patient::class;

    /**
     * Columns to show
     *
     * @var array
     */
    protected $columns = ['name', 'lastname', 'ages'];
    protected $image_columns = ['picture'];

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
        return $this->applyScopes(Patient::query());
    }
}
