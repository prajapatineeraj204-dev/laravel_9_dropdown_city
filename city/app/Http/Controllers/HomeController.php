<?php
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Validator;
use Response;
use Redirect;
use App\Models\{Country, State, City,Register};
class HomeController extends Controller
{
    public function index()
    {
        $data['countries'] = Country::get(["name", "id"]);
        return view('welcome', $data);
    }
    public function fetchState(Request $request)
    {
        $data['states'] = State::where("country_id",$request->country_id)->get(["name", "id"]);
        return response()->json($data);
    }
    public function fetchCity(Request $request)
    {
        $data['cities'] = City::where("state_id",$request->state_id)->get(["name", "id"]);
        return response()->json($data);
    }


    public function register(Request $request)
    {
        $user=new Register;
        //image upload
        $image=$request->ifile;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->ifile->move('image',$imagename);
        $user->image=$imagename;
        //pdf upload
        $invoice=$request->pfile;
        $pdfname=time().'.'.$invoice->getClientOriginalExtension();
        $request->pfile->move('pdf',$pdfname);
        $user->invoice=$pdfname;
//user up
        $user->name=$request->name;
        $user->total=$request->total;
        $user->country=$request->country;
        $user->state=$request->state;
        $user->city=$request->city;
        $user->save();
        return redirect()->back()->with('message','Registration Added Successfully!!!');
    }

    public function list()
    {
        return view('list');
        
    }
}