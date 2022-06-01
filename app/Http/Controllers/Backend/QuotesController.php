<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use DB;
use App\Models\Quotes;
use App\Models\Auth\User;
use Carbon\Carbon; 

/**
 * Class QuotesController.
 */
class QuotesController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('backend.quotes.index');
    }

    public function createQuote()
    {
        return view('backend.quotes.create');
    }

    public function storeQuote(Request $request)
    {
        $user_id = auth()->user()->id;

        $quote = new Quotes;

        $quote->user_id = $user_id;
        $quote->quote = $request->quote;
        $quote->status = 'Approved';

        $quote->save();

        
        return redirect()->route('admin.quotes.index')->withFlashSuccess('Created Successfully');                      
    }

    public function getQuotes(Request $request)
    {
        if($request->ajax())
        {
            $data = Quotes::get();

            return DataTables::of($data)

                ->addColumn('action', function($data){
                    
                    $button = '<a href="'.route('admin.quotes.edit_quote', $data->id).'" name="edit" id="'.$data->id.'" class="edit btn btn-secondary btn-sm ml-3" style="margin-right: 10px"><i class="fas fa-stamp"></i> Approval </a>';
                    $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Delete</button>';
                    return $button;
                })

                ->addColumn('name', function($data){
                    $name = User::where('id', $data->user_id)->first()->name;
                 
                    return $name;
                })

                ->addColumn('email', function($data){
                    $email = User::where('id', $data->user_id)->first()->email;
                 
                    return $email;
                })
                
                ->editColumn('status', function($data){
                    if($data->status == 'Approved'){
                        $status = '<div class="form-check form-switch"><input class="form-check-input status-check" type="checkbox" checked data-id='.$data->id.'></div>';
                    }else{
                        $status = '<div class="form-check form-switch"><input class="form-check-input status-check" type="checkbox" data-id='.$data->id.'></div>';
                    }   
                    return $status;
                })
                
                ->rawColumns(['action', 'name', 'email', 'status'])
                ->make(true);
        }
        return back();
    }


    public function editQuote($id)
    {

        $quote = Quotes::where('id',$id)->first();

        return view('backend.quotes.edit',['quote' => $quote]);
    }

    public function updateQuote(Request $request)
    {    
        
        $quote = DB::table('quotes') ->where('id', request('hidden_id'))->update(
            [
                'quote' => $request->quote,
                'status' => $request->status,
                'updated_at' => Carbon::now(),
            ]
        );
   
        return redirect()->route('admin.quotes.index')->withFlashSuccess('Updated Successfully');                      

    }

    public function deleteQuote($id)
    {

        $quote = Quotes::where('id', $id)->delete();

    }


    public function changeStatus ($id, $status) {

        if($status == 0) {
            $value = 'Pending';
        }
        else {
            $value = 'Approved';
        }

        $quote = DB::table('quotes')->where('id', request('id'))->update(
            [
                'status' => $value,
                'updated_at' => Carbon::now(),
            ]
        );
    }

}
