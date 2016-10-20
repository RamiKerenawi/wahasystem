<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Session;

use Illuminate\Http\Requests\RegisterRequest;
 
use App\Http\Requests;
use App\Orphan;
use View;


class OrphanController extends Controller {
    

	
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //

        $orphans = Orphan::all();

        // load the view and pass the nerds
        return View('orphans.view_all')->with('orphans', $orphans)->with('page_title','عرض بيانات الأيتام');
		
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {	
        //
		$orphan = new Orphan;

        // load the view and pass the nerds
        return View('orphans.form')->with('page_title', "إضافة يتيم")->with('orphan',$orphan);
		
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    //public function store(RegisterRequest $request)
    public function store(Request $request)
    {
        //
		
		$orphan = new Orphan;
		
		$new = $request->all();

		if ($orphan->validate($new)) {
			
			// Success Code
			$orphan->fill($request->all());
			//dump($request);//->first_name);
			$orphan->save();			
			Session::flash('message', 'Successfully saved orphan!');
			return Redirect::to('orphans');
		} else {
				
			// Failure
			$errors = $orphan->errors();
			
			//redirect()->back()->withErrors($errors)->withInput();
			//Session::flash('message', $errors);			
			//return back()->withInputs(['msg', 'The Message']);
			//return Redirect::to('orphans/create')->with($errors);
			return redirect()->back()->withErrors($errors)->withInput();
		}
		

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id=0){
    	
		// View Only Data, No edits
		////$orphan = Orphan::find($id);
		//return $orphan;
        // load the view and pass the nerds
        ///return View('orphans.single_report')->with('orphan', $orphan)->with('page_title','عرض بيانات يتيم');
		
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
		

		$orphan = Orphan::find($id);
		//return $orphan;
		//$live_with = Live_with::all();
         
        return View('orphans.form')->with('orphan', $orphan)->with('page_title','تحرير بيانات يتيم');		
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
	 
	 // crud(model)/list 
	 //class CrudController extends AdminController {
			///index () {
			///	view($model."index");
				
				
			///	$model="oneController";
			///	view($model."index");
			///}
	 //}
	 //$model ="";
	 
	 // Events 
	 /*
	 $user = new User();
	 $user->name = "Test user";
	 event(new UserRegistered($user));
	 */
	 
    public function update($id, Request $request)
    {
        //
		$Orphan = new Orphan;
		$orphan = $Orphan::find($id);
		
		$data = $request->all();

		if ($orphan->validate($data)) {
			
			// Success Code
			$orphan->fill($request->all());
			//dump($request);//->first_name);
			$orphan->save();
			Session::flash('message', 'Successfully updated orphan!');
			return Redirect::to('orphans');
		} else {
				
			// Failure
			$errors = $orphan->errors();
			Session::flash('message', 'Validation Error!');
			return Redirect::to('orphans');
		}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
		// delete
		 
		$orphan = Orphan::find($id);
		 
		if ($orphan) 
			$orphan->delete();

		// redirect
		Session::flash('message', 'Successfully deleted the orphan!');
		return Redirect::to('orphans');		
    }
// ajaxForm	
}
