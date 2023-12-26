<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EngMessage;
use App\Models\ManagementMessage;
use App\Models\PrivacyTerm;

class ManagementController extends Controller
{
    // get management messages 
    public function messages(){
        // $msgs = ManagementMessage::with('replies')->get();
        // return response()->json([
        //     'status_code'=> 200, 
        //     'data' => ['messages' => $msgs]
        // ],200);
        if(request('page_size')){
            $page_size = request('page_size');
        }else{
            $page_size = 10;
        }
        $pagination = self::pagination(ManagementMessage::with('replies')->get(),$page_size );
        return response()->json([
            'status_code'=> 200, 
            'data' => [
                'nots' => $pagination->paginated,
                'total' => $pagination->total,
                'currentPage' => $pagination->currentPage,
                'last_page' => $pagination->last_page,
                'perPage' => $pagination->perPage,
            ]
        ],200);
    }
    // message Details by ID
    public function messageDetails($id)
    {
        $mesasge = ManagementMessage::with('replies')->find($id);
        return response()->json([
            'status_code'=> 200, 
            'data' => $mesasge
        ],200);
        
    }
    // replay to management message
    public function replay(Request $request)
    {
        $user = auth('api')->user();
        $data = [
            'eng_id' => $user->id,
            'msg_id' => $request->msg_id,
            'status' => $request->status,
            'reason' => $request->reason
        ];
        $response = EngMessage::create($data);
        return response()->json([
            'status_code'=> 200, 
            'data' => $response
        ],200);
    }

    // get privacy 
    public function privacy()
    {
        $privacy = PrivacyTerm::first();
        // dd($_SERVER['SERVER_NAME']);
        $domin = $_SERVER['SERVER_NAME'];
        return response()->json([
            'status_code'=> 200, 
            'data' => "$domin/$privacy->file"
        ],200);
    }

    private static function pagination($collection, $perPage )
    {
        $page = (int)request('page');

        $start = ($page == 1) ? 0 : ($page - 1) * $perPage;

        $total = $collection->count();

        $pages_count = (int)$total / (int)$perPage;

        $page_counter = is_double($pages_count) ? (int)$pages_count + 1 : $pages_count;

        $data['total'] = $total;

        $data['paginated'] = $page == 0 ? $collection : $collection->slice($start, $perPage);

        $data['currentPage'] = $page == 0 ? 1 : $page;

        $data['perPage'] = $perPage;

        $data['last_page'] = $pages_count >= 1 ? $page_counter : 1;

        return (object)$data;
    }
}
