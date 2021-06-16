<?php

namespace App\Http\Controllers\Admin;

use App\Base\Controllers\AdminController;
use App\Http\Controllers\Admin\DataTables\DoctorDataTable;
use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends AdminController
{
    /**
     * @var array
     */
    protected $validation = [
        'name' => 'required|string|max:200', 
        'speciality' => 'required|string|max:160'
    ];

    /**
     * @param \App\Http\Controllers\Admin\DataTables\DoctorDataTable $dataTable
     *
     * @return mixed
     */
    public function index(DoctorDataTable $dataTable)
    {
        return $dataTable->render('admin.table', ['link' => route('admin.doctor.create')]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|string
     */
    public function create()
    {
        return view('admin.forms.doctor', $this->formVariables('doctor', null));
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function store(Request $request)
    {
        return $this->createFlashRedirect(Doctor::class, $request, 'picture');
    }

    /**
     * @param \App\Models\Doctor $doctor
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|string
     */
    public function show(Doctor $doctor)
    {
        return view('admin.show', ['object' => $doctor]);
    }

    /**
     * @param \App\Models\Doctor $doctor
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|string
     */
    public function edit(Doctor $doctor)
    {
        return view('admin.forms.doctor', $this->formVariables('doctor', $doctor));
    }

    /**
     * @param \App\Models\Doctor $doctor
     * @param \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function update(Doctor $doctor, Request $request)
    {
        return $this->saveFlashRedirect($doctor, $request, 'picture');
    }

    /**
     * @param \App\Models\Doctor $doctor
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function destroy(Doctor $doctor)
    {
        return $this->destroyFlashRedirect($doctor);
    }
}
