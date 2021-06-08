<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\File;
use App\Models\Team;
use App\Models\Member;

class FileController extends Controller
{
    public function create() {
        return view('dashboard');
    }

    public function store(Request $request) {
        $request->validate([
            'file' => 'required|mimes:pdf,doc,docx,jpg,jpeg,png|max:2048',
        ]);
        
        $team = Team::find(Auth::user()->id);

        $fileName = time().'_'.$request->file->getClientOriginalName();

        if($request->type == 'submission') {
            $file = File::create([
                'name' => $fileName,
                'type' => $request->type,
                'file_path' => $request->file->move(public_path('storage/submissions'), $fileName),
            ]);
            $team->submission_file_path = $file->file_path;
            $team->save();

            return back()
            ->with('success','File has been uploaded.')
            ->with('file', $fileName);
        } else if($request->type == 'payment_proof') {
            $file = File::create([
                'name' => $fileName,
                'type' => $request->type,
                'file_path' => $request->file->move(public_path('storage/payment-proofs'), $fileName),
            ]);
            $team->payment_proof_file_path = $file->file_path;
            $team->payment_status = 'pending';
            $team->save();

            return back()
            ->with('success','File has been uploaded.')
            ->with('file', $fileName);
        } else if($request->type == 'student_card') {
            $file = File::create([
                'name' => $fileName,
                'type' => $request->type,
                'file_path' => $request->file->move(public_path('storage/student-cards'), $fileName),
            ]);
            $member = Member::find($request->id);
            $member->student_card_file_path = $file->file_path;
            $member->save();

            return app('App\Http\Controllers\TeamController')->create();
        } else {
            return back();
        }
    }

    public function download(Request $request) {
        
        if($request->type == 'submission') {
            $team = Team::find($request->teamid);
            $file = File::where('file_path', $team->submission_file_path)->first();
        } else if($request->type == 'payment_proof') {
            $team = Team::find($request->teamid);
            $file = File::where('file_path', $team->payment_proof_file_path)->first();
        } else {
            $member = Member::find($request->teamid);
            $file = File::where('file_path', $member->student_card_file_path)->first();
        }

        if($file){
            return response()->download($file->file_path, $file->name);
        }
        else{
            return back()->with('fail','There is no chosen file available yet!');
        }
    }
}
