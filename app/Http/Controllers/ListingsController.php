<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Listing;
class ListingsController extends Controller
{
    public function __construct(){
    $this->middleware('auth', ['except' => ['index', 'show']]);
}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listings = Listing::orderBy('created_at', 'desc')->get();
        return view('listings')->with('listings', $listings);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'address' => 'required',
            'website' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'bio' => 'required',
            //set it to image and limit its size
            'picture' => 'image|nullable|max:1999',
            'docufile' => 'required|max:10000|mimes:doc,docx,txt,pdf,csv',
            'price' => 'required'
        ]);
        //hnadle file uplod
        if($request->hasFile('picture')){
            //get file with extension
            $fileNameWithExt = $request->file('picture')->getClientOriginalExtension();
            //get just file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //get just extension
            $extension = $request->file('picture')->getClientOriginalExtension();
            //filename to store
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            //upload image
            $path = $request->file('picture')->storeAs('public/pictures', $fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }





        if($request->hasFile('docufile')){
                //get file with extension
                $fileNameWithExt = $request->file('docufile')->getClientOriginalExtension();
                //get just file name
                $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                //get just extension
                $extension = $request->file('docufile')->getClientOriginalExtension();
                //filename to store
                $fileNameToStoreTwo = $fileName.'_'.time().'.'.$extension;
                //upload image
                $path = $request->file('docufile')->storeAs('public/documentation', $fileNameToStoreTwo);
            }else{
                $fileNameToStoreTwo = "nothing.txt";
            }











        $listing = new Listing;
        $listing->name = $request->input('name');
        $listing->address = $request->input('address');
        $listing->website = $request->input('website');
        $listing->email = $request->input('email');
        $listing->phone = $request->input('phone');
        $listing->picture = $fileNameToStore;
        $listing->docufile = $fileNameToStoreTwo;
        $listing->bio = $request->input('bio');
        $listing->price = $request->input('price');

        $listing->user_id = auth()->user()->id;

        $listing->save();

        return redirect('/dashboard')->with('success', 'Listing Created successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $listing = Listing::find($id);
        return view('showlisting')->with('listing', $listing);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $listing = Listing::find($id);
        return view('edit')->with('listing', $listing);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        //hnadle file uplod
        if($request->hasFile('picture')){
            //get file with extension
            $fileNameWithExt = $request->file('picture')->getClientOriginalExtension();
            //get just file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //get just extension
            $extension = $request->file('picture')->getClientOriginalExtension();
            //filename to store
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            //upload image
            $path = $request->file('picture')->storeAs('public/pictures', $fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }

        if($request->hasFile('docufile')){
            //get file with extension
            $fileNameWithExt = $request->file('docufile')->getClientOriginalExtension();
            //get just file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //get just extension
            $extension = $request->file('docufile')->getClientOriginalExtension();
            //filename to store
            $fileNameToStoreTwo = $fileName.'_'.time().'.'.$extension;
            //upload image
            $path = $request->file('docufile')->storeAs('public/documentation', $fileNameToStoreTwo);
        }else{
            $fileNameToStoreTwo = "nothing.txt";
        }



        $listing =  Listing::find($id);
        $listing->name = $request->input('name');
        $listing->address = $request->input('address');
        $listing->website = $request->input('website');
        $listing->email = $request->input('email');
        $listing->phone = $request->input('phone');
        $listing->picture = $fileNameToStore;
        $listing->docufile = $fileNameToStoreTwo;
        $listing->bio = $request->input('bio');
        $listing->price = $request->input('price');
        $listing->user_id = auth()->user()->id;

        $listing->save();

        return redirect('/dashboard')->with('success', 'Listing Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $listing = Listing::find($id);
        $listing->delete();
        return redirect('/dashboard')->with('success', 'Listing Deleted!');
    }
}
