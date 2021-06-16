<?php

namespace App\Http\Controllers\Admin;

use App\Base\Controllers\AdminController;
use App\Http\Controllers\Admin\DataTables\PatientDataTable;
use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends AdminController
{
    /**
     * @var array
     */
    protected $validation = [
        'name' => 'required|string|max:200',
        'lastname' => 'required|string|max:200',
        'ages' => 'required|numeric|max:200',
        'picture' => 'required|image',
    ];

    /**
     * @param \App\Http\Controllers\Admin\DataTables\PatientDataTable $dataTable
     *
     * @return mixed
     */
    public function index(PatientDataTable $dataTable)
    {
        return $dataTable->render('admin.table', ['link' => route('admin.patient.create')]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|string
     */
    public function create()
    {
        return view('admin.forms.patient', $this->formVariables('patient', null));
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function store(Request $request)
    {
        return $this->createFlashRedirect(Patient::class, $request, 'picture');
    }

    /**
     * @param \App\Models\Patient $patient
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|string
     */
    public function show(Patient $patient)
    {
        return view('admin.show', ['object' => $patient]);
    }

    /**
     * @param \App\Models\Patient $patient
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|string
     */
    public function edit(Patient $patient)
    {
        return view('admin.forms.patient', $this->formVariables('patient', $patient));
    }

    /**
     * @param \App\Models\Patient $patient
     * @param \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function update(Patient $patient, Request $request)
    {
        return $this->saveFlashRedirect($patient, $request, 'picture');
    }

    /**
     * @param \App\Models\Patient $patient
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function destroy(Patient $patient)
    {
        return $this->destroyFlashRedirect($patient);
    }
}
