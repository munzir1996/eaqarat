<?php


namespace App\Http\Controllers;
use App\Property;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use Purifier; 
use Storage;
use Illuminate\Support\Facades\Input;
use File;
use App\Title;

class BlockController extends Controller
{
    public function create(){

        $title = Title::findOrFail(1);
        return view ('block')->withTitle($title);

    }
    public function store(Request $request){

        $title = Title::findOrFail(1);

        $this->validate($request, [
            'name' => 'required',
            'hire_date' => 'required|integer',
            'age' => 'required|integer',
            'salary_pdf' => 'required',
            'offical_pdf' => 'required',
        ]);

        $property = new Property();
        $property->name = $request->name;
        $property->hire_date = $request->hire_date;
        $property->age = $request->age;
    
        //Save salary_pdf
        $salary_pdf = $request->file('salary_pdf');
        $filename = time() . '.' . $salary_pdf->getClientOriginalExtension();
        $location = public_path('file/' . $filename);
        $salary_pdf->move(public_path('file/'), $filename);
        $property->salary_pdf = $filename;
        
        //Save offical_pdf
        $offical_pdf = $request->file('offical_pdf');
        $filename = time()+'1' . '.' . $offical_pdf->getClientOriginalExtension();
        $location = public_path('file/' . $filename);
        $offical_pdf->move(public_path('file/'), $filename);
        $property->offical_pdf = $filename;
        
        $property->property_type = $title->name;
        //dd($property);
        // Shows .toaster message
        if ($property->save()) {
            Session::flash('success', '!تمت أضافة التمليك بنجاح');
            //Redirect to another page
		    return redirect()->route('home');
        }

        Session::flash('error', 'حصل خطااثناء اضافة التمليك الرجاء اعادة المحاولة');
        //Redirect to another page
	    return redirect()->route('home');

    }
}
