<?php

namespace App\Http\Controllers\Colorspace;

use App\Project;
use App\Hdd;
use App\Dit;
use App\Clip;
use App\Card;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProjectController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
      $projects = Project::count();
      $hdds = Hdd::count();
      $dit = Dit::count();

       return view('colorspace.dashboard', [
         'projects' => $projects,
         'hdds' => $hdds,
         'dits' => $dit

       ]);
    }

    public function index()
    {
      $projects = Project::get();

       return view('colorspace.index', ['projects' => $projects]);
    }

    public function projectStore(Request $request)
    {

      $project = new Project();
      $project->name = $request->project_name;
      $project->company_email = $request->company_email;
      $project->director_email = $request->director_email;
      $project->dop_email = $request->dop_email;
      $project->images = $request->project_image->store('project_image');
      $project->save();

      return back();

    }

    public function hddIndex(Project $project = null)
    {

       if ($project) {
         $hdds = $project->hdds;
         return view('colorspace.hdd', [
           'hdds' => $hdds,
           'project' => $project
          ]);

       } else {

         $hdds_all = Hdd::get();
         return view('colorspace.hdd', [
           'hdds' => $hdds_all
          ]);
       }


    }

    public function hddStore(Project $project, Request $request)
    {

      $hdd = new Hdd();
      $hdd->project_id = $project->id;
      $hdd->serial_no = $request->serial_no;
      $hdd->name = $request->hdd_name;
      $hdd->size = $request->hdd_size;
      $hdd->type = $request->hdd_type;
      $hdd->content = $request->hdd_content;
      $hdd->giver_name = $request->giver_name;
      $hdd->status = 'check_in';
      $hdd->check_in_date = $request->hdd_check_in;
      $hdd->save();

      return back();

    }

    public function hddEdit(Project $project, Hdd $hdd)
    {
      return view('colorspace.edithdd', [
        'hdd' => $hdd,
        'project' => $project
       ]);

    }

    public function hddUpdate(Hdd $hdd, Request $request)
    {
      $hdd->serial_no = $request->serial_no;
      $hdd->project_id = $hdd->project_id;
      $hdd->name = $request->hdd_name;
      $hdd->size = $request->hdd_size;
      $hdd->type = $request->hdd_type;
      $hdd->content = $request->hdd_content;
      $hdd->giver_name = $request->giver_name;
      $hdd->check_in_date = $request->hdd_check_in;
      $hdd->reciever_name = $request->reciever_name;
      $hdd->reciever_email = $request->reciever_email;
      $hdd->reciever_mobile = $request->reciever_mobile;
      $hdd->reciever_justify = $request->reciever_justify;
      $hdd->check_in_date = $request->hdd_check_out;
      $hdd->save();
      return back();

    }

    public function checkOut(Hdd $hdd, Request $request)
    {

      $hdd->reciever_name = $request->reciever_name;
      $hdd->reciever_email = $request->reciever_email;
      $hdd->reciever_mobile = $request->reciever_mobile;
      $hdd->reciever_justify = $request->reciever_justify;
      $hdd->status = 'check_out';
      $hdd->check_in_date = $request->hdd_check_out;
      $hdd->save();

      return back();

    }

    public function hddRemove(Hdd $hdd)
    {
      $hdd->delete();
      return back();
    }

    public function ditIndex(Hdd $hdd)
    {
      $dits = $hdd->dits;
      return view('colorspace.dit', [
        'hdd' => $hdd,
        'dits' => $dits
       ]);
    }

    public function ditCreate(Hdd $hdd)
    {
      return view('colorspace.create-dit', [
        'hdd' => $hdd
       ]);
    }

    public function ditStore(Hdd $hdd, Request $request)
    {
       $dit = new Dit;
       $dit->hdd_id = $hdd->id;
       $dit->day = $request->day_no;
       $dit->date_of_shoot = $request->date_of_shoot;
       $dit->giver_name = $request->giver_name;
       $dit->save();

       if ($request->card_details) {
         foreach ($request->card_details as $key => $card_detail) {
           $card = new Card;
           $card->dit_id = $dit->id;
           $card->details = $card_detail;
           $card->save();

         }
       }

       if ($request->clip_details) {
         foreach ($request->clip_details as $key => $clip_detail) {
           $clip = new Clip;
           $clip->dit_id = $dit->id;
           $clip->details = $clip_detail;
           $clip->save();

         }
       }

       return back();
    }

    public function ditEdit(Dit $dit)
    {
        return view('colorspace.editdit', [
          'dit' => $dit
         ]);
    }

    public function ditUpdate(Dit $dit, Request $request)
    {

        $dit->day = $request->day_no;
        $dit->date_of_shoot = $request->date_of_shoot;
        $dit->giver_name = $request->giver_name;
        $dit->save();

        if ($request->card_details) {

          $dit->cards()->delete();
          foreach ($request->card_details as $key => $card_detail) {
            $card = new Card;
            $card->dit_id = $dit->id;
            $card->details = $card_detail;
            $card->save();

          }
        }

        if ($request->clip_details) {
          $dit->clips()->delete();
          foreach ($request->clip_details as $key => $clip_detail) {
            $clip = new Clip;
            $clip->dit_id = $dit->id;
            $clip->details = $clip_detail;
            $clip->save();

          }
        }
        return back();
    }

    public function ditRemove(Dit $dit)
    {
      $dit->delete();
      return back('/');
    }

    public function users()
    {
      $users = User::get();
      return view('colorspace.users', ['users' => $users]);
    }

    public function userRemove(User $user)
    {
      $user->delete();
      return back();
    }



}
