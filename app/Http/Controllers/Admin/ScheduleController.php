<?php

namespace App\Http\Controllers\Admin;

use Validator;
use Illuminate\Http\Request;
use App\Base\Controllers\AdminController;
use App\Models\{Doctor, Patient, Schedule};
use App\Http\Controllers\Admin\DataTables\ScheduleDataTable;

class ScheduleController extends AdminController
{
    /**
     * @var array
     */
    protected $validation = [
        'patient_id' => 'required|exists:patients,id|max:200', 
        'doctor_id' => 'required|exists:doctors,id|max:160',
        'selected_date' => 'required|date',
        'selected_hour' => 'required|numeric',
    ];

    /**
     * @param \App\Http\Controllers\Admin\DataTables\ScheduleDataTable $dataTable
     *
     * @return mixed
     */
    public function index(ScheduleDataTable $dataTable)
    {
        return $dataTable->render('admin.table', ['link' => route('admin.schedule.create')]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|string
     */
    public function create()
    {
        $doctors = Doctor::select(['id', 'name'])->get()->pluck('name', 'id');
        $patients = Patient::all(['id', 'name', 'lastname'])->map(function($p){
            $p->name = "{$p->name} {$p->lastname}";
            return $p;
        })->pluck('name', 'id');

        return view('admin.forms.schedule', $this->formVariables('schedule', null, [
            'doctors' => $doctors,
            'patients' => $patients
        ]));
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function store(Request $request)
    {
        $v = Validator::make($request->all(), $this->validation);

        // Validate hour and date for selected doctor
        if(!$this->freeDoctor()){
            $v->errors()->add('selected_hour', 'Selected date and hour is not avalaible, please select another.');
            return redirect()->back()->withErrors($v->errors());
        }

        return $this->createFlashRedirect(Schedule::class, $request);
    }

    private function freeDoctor()
    {
        $hour = request()->selected_hour;
        $date = request()->selected_date;
        $doctorId = request()->doctor_id;

        $schedules = Schedule::whereDoctorId($doctorId)
                        ->whereSelectedDate($date)
                            ->whereSelectedHour($hour)->count();

        return ($schedules==0);
    }

    /**
     * @param \App\Models\Schedule $schedule
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|string
     */
    public function show(Schedule $schedule)
    {
        return view('admin.show', ['object' => $schedule]);
    }

    /**
     * @param \App\Models\Schedule $schedule
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|string
     */
    public function edit(Schedule $schedule)
    {
        $doctors = Doctor::select(['id', 'name'])->get()->pluck('name', 'id');
        $patients = Patient::all(['id', 'name', 'lastname'])->map(function($p){
            $p->name = "{$p->name} {$p->lastname}";
            return $p;
        })->pluck('name', 'id');
        return view('admin.forms.schedule', $this->formVariables('schedule', $schedule, [
            'doctors' => $doctors,
            'patients' => $patients
        ]));
    }

    /**
     * @param \App\Models\Schedule $schedule
     * @param \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function update(Schedule $schedule, Request $request)
    {
        return $this->saveFlashRedirect($schedule, $request);
    }

    /**
     * @param \App\Models\Schedule $schedule
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function destroy(Schedule $schedule)
    {
        return $this->destroyFlashRedirect($schedule);
    }
}
