<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use DB;
use App\Models\Quotes; 

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
                
                ->editColumn('status', function($data){
                    if($data->status == 'Approved'){
                        $status = '<span class="badge bg-success">Approved</span>';
                    }else{
                        $status = '<span class="badge bg-warning text-dark">Pending</span>';
                    }   
                    return $status;
                })
                
                ->rawColumns(['action','status'])
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
                'status' => $request->status
            ]
        );
   
        return redirect()->route('admin.quotes.index')->withFlashSuccess('Updated Successfully');                      

    }

    public function deleteQuote($id)
    {

        $quote = Quotes::where('id', $id)->delete();

    }

}
