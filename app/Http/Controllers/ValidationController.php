<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App;
use Validator;
use Config;
use App\Http\Controllers\Api\LoginController;
use App\Models\Student;
use App\Models\ValidationRequest;
use App\Models\PersonalSkill;
use App\Models\Institution;
use Carbon\Carbon;

class ValidationController extends Controller
{

    public function __construct()
    {
        if (!Auth::user() || !Auth::user()->isA('validator')) {
            App::abort(403, 'Unauthorized action.');
        }
    }

    public function index(Request $request)
    {
        return view('validator.students');
    }

    public function getValidate($id)
    {
        if (!Auth::user()->userable->canValidate()) {
            App::abort(403, 'Unauthorized action.');
        }

        $validation = \App\Models\ValidationRequest::with("student")->findOrFail($id);
        if ($validation->validator->id != Auth::user()->userable->id) {
            App::abort(403, 'Unauthorized action.');
        }
        $studentUser = $validation->student->user;
        $data = app('App\Http\Controllers\ProfileController')->getStudentPublicData($studentUser, false);
        $data['reasons'] = \App\Models\ValidationRequest::invalidReasons();
        $data['token'] = LoginController::userToken();
        $data['validation'] = $id;
        $data['personalSkills'] = PersonalSkill::getFormattedArray();
        return view('validator.validate', $data);
    }

    public function postValidate(Request $request, $id)
    {
        $validation = \App\Models\ValidationRequest::with("student")->findOrFail($id);
        $student = $validation->student;
        $studentUser = $validation->student->user;
        $studentName = $studentUser->fullName;

        if ($student->valid != ValidationRequest::$status[0]) {
            App::abort(403, 'Unauthorized action.');
        }

        if ($validation->validator != Auth::user()->userable) {
            App::abort(403, 'Unauthorized action.');
        }

        $v = Validator::make($request->all(), ValidationRequest::$rules);
        if ($v->passes()) {
            if ($v->valid()['status'] == 'valid') {
                $student->valid = ValidationRequest::$status[1];
                if (isset($v->valid()['comment'])) {
                    $student->validation_comment = $v->valid()['comment'];
                }
                $student->save();
                foreach ($v->valid()['personalSkills'] as $skillID) {
                    $skill = PersonalSkill::find($skillID);
                    $skillExists = $student->personalSkills()->wherePivot('validator', true)->where('id', $skillID)->first();

                    if ($skill && !$skillExists) {
                        $student->personalSkills()->attach($skill, ['validator' => true]);
                    }
                }
            } else {
                if ($v->valid()['reason'] == 'nocriteria') {
                    $student->valid = ValidationRequest::$status[2];
                    $student->save();
                } else {
                    $student->valid = ValidationRequest::$status[0];
                    $student->save();
                    $validation->delete();
                    $request->session()->flash('error_message', sprintf('The validation was removed because you indicated that %s wasn\'t a student from this institution', $studentName));
                }
            }
            $request->session()->flash('success_message', sprintf('%s validation complete', $studentName));
            return redirect()->action('ValidationController@index');
        } else {
            return back()->withInput()->withErrors($v->errors());
        }
    }

    public function getJSONStudentsValidation(Request $request)
    {
        $canValidate = Auth::user()->userable->canValidate();
        Carbon::setLocale(Config::get('app.locale'));
        $validations = ValidationRequest::with('student')->whereHas('student.user')->where("validator_id", Auth::user()->userable->id)->get();

        $res = array();
        foreach ($validations as $validation) {
            $val = array(
                'id' => $validation->id,
                'full_name' => $validation->student->user->fullName,
                'status' => $validation->student->valid,
                'validation_url' => route('get_validate_student', [$validation->id]),
                'can_validate' => $canValidate
            );
            if ($validation->created_at != null) {
                $val['date_of_request'] = $validation->created_at->diffForHumans();
            }
            $res[] = $val;
        }
        return $res;
    }
}
