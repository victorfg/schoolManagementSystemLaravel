<?php

namespace App\Http\Controllers;

use App\Events\NewSubject;
use App\Helpers\UserTypes;
use App\Http\Requests\SubjectStoreRequest;
use App\Http\Requests\SubjectUpdateRequest;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    protected $userTypes;
    /**
     * SubjectController constructor.
     */
    public function __construct()
    {
        $this->userTypes = new UserTypes();
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $subjects = Subject::all();

        return view('subject.index', compact('subjects'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $teachers = User::where('type',UserTypes::getIdUserTypesByName('teacher'))->get()->pluck('name','id');
        $colors = json_encode(config('colors'));
        return view('subject.create', compact('teachers', 'colors'));
    }

    /**
     * @param \App\Http\Requests\SubjectStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubjectStoreRequest $request)
    {
        $subject = Subject::create($request->validated());

        event(new NewSubject($subject));

        $request->session()->flash('subject.name', $subject->name);

        return redirect()->route('subject.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Subject $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Subject $subject)
    {
        $subjects = Subject::all();

        return view('subject.show', compact('subject'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Subject $subject
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Subject $subject)
    {
        $teachers = User::where('type',$this->userTypes->getIdUserTypesByName('teacher'))->get()->pluck('name','id');
        $colors = json_encode(config('colors'));
        return view('subject.edit', compact('subject','teachers','colors'));
    }

    /**
     * @param \App\Http\Requests\SubjectUpdateRequest $request
     * @param \App\Models\Subject $subject
     * @return \Illuminate\Http\Response
     */
    public function update(SubjectUpdateRequest $request, Subject $subject)
    {
        $subject->update($request->validated());

        $request->session()->flash('subject.id', $subject->id);

        return redirect()->route('subject.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Subject $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Subject $subject)
    {
        $subject->delete();

        return redirect()->route('subject.index');
    }
}
