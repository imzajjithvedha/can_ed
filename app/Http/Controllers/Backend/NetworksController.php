<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use DB;
use App\Models\WorldWideNetwork;
use Carbon\Carbon;

/**
 * Class NetworksController.
 */
class NetworksController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('backend.networks.index');
    }

    public function createNetwork()
    {
        return view('backend.networks.create');
    }

    public function storeNetwork(Request $request)
    {
        $user_id = auth()->user()->id;

        if($request->file('image') != null) {
            $image = $request->file('image');
            $imageName = time().'_'.rand(1000,10000).'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images/world-wide-network'), $imageName);
        }
        else {
            $imageName = null;
        }

        $network = new WorldWideNetwork;

        $network->user_id = $user_id;
        $network->website_name = $request->website_name;
        $network->url = $request->website_url;
        $network->name = $request->name;
        $network->phone = $request->phone;
        $network->email = $request->email;
        $network->country = $request->country;
        $network->our_banner_url = 'admin added network';
        $network->image = $imageName;
        $network->status = 'Approved';

        $network->save();

        
        return redirect()->route('admin.networks.index')->withFlashSuccess('Created Successfully');                      
    }


    public function getNetworks(Request $request)
    {
        if($request->ajax())
        {
            $data = WorldWideNetwork::get();

            return DataTables::of($data)

                ->addColumn('action', function($data){
                    
                    $button = '<a href="'.route('admin.networks.edit_network', $data->id).'" name="edit" id="'.$data->id.'" class="edit btn btn-secondary btn-sm ml-3" style="margin-right: 10px"><i class="far fa-edit"></i> Approval </a>';
                    $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Delete</button>';
                    return $button;
                })

                // ->addColumn('image', function($data){
                //     $img = '<img src="'.url('images/world-wide-network',$data->image).'" style="width: 70%">';
                 
                //     return $img;
                // })

                ->editColumn('status', function($data){
                    if($data->status == 'Approved'){
                        $status = '<div class="form-check form-switch"><input class="form-check-input status-check" type="checkbox" checked data-id='.$data->id.'></div>';
                    }else{
                        $status = '<div class="form-check form-switch"><input class="form-check-input status-check" type="checkbox" data-id='.$data->id.'></div>';
                    }   
                    return $status;
                })
                
                ->rawColumns(['action','status', 'image'])
                ->make(true);
        }
        
        return back();
    }


    public function editNetwork($id)
    {
        $network = WorldWideNetwork::where('id',$id)->first();

        return view('backend.networks.edit',['network' => $network]);
    }

    public function updateNetwork(Request $request)
    {    
        $user_id = auth()->user()->id;

        $image = $request->file('new_image');

        if($image != null) {
            $imageName = time().'_'.rand(1000,10000).'.'.$image->getClientOriginalExtension();

            $image->move(public_path('images/world-wide-network'), $imageName);
        } 
        else {
            $imageName = $request->old_image;
        }
        
        $network = DB::table('world_wide_network') ->where('id', request('hidden_id'))->update(
            [
                'website_name' => $request->website_name,
                'url' => $request->website_url,
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'country' => $request->country,
                'our_banner_url' => $request->our_banner_url,
                'image' => $imageName,
                'status' => $request->status,
                'updated_at' => Carbon::now(),
            ]
        );
   
        return redirect()->route('admin.networks.index')->withFlashSuccess('Updated Successfully');                      

    }

    public function deleteNetwork($id)
    {
        $network = WorldWideNetwork::where('id', $id)->delete();
    }


    public function changeStatus ($id, $status) {

        if($status == 0) {
            $value = 'Pending';
        }
        else {
            $value = 'Approved';
        }

        $network = DB::table('world_wide_network')->where('id', request('id'))->update(
            [
                'status' => $value,
                'updated_at' => Carbon::now(),
            ]
        );
    }

}
