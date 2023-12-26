<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notification;
use App\Http\Resources\NotResource;
class NotificationController extends Controller
{
    //get user notifications
    
    // public function notifications(Request $request)
    // {
    //     $pageSize = $request->page_size ?? 20;
    //     $user = auth('api')->user();
    //     $nots = Notification::with('payload:not_id,type,type_id')
    //     ->where('eng_id',$user->id)
    //     ->simplePaginate($pageSize);
    //     return response()->json([
    //         'status_code'=> 200, 
    //         'data' => $nots
    //     ],200);
    // }
    
    public function notifications()
    {
        $user = auth('api')->user();
        if(request('page_size')){
            $page_size = request('page_size');
        }else{
            $page_size = 10;
        }
        $pagination = self::pagination(Notification::with('payload:not_id,type,type_id')
        ->where('eng_id',$user->id)
        ->where('to_admin',0)
        ->get(),$page_size );
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

    private static function pagination($collection, $perPage )
    {
        $page = (int)request('page');

        $start = ($page == 1) ? 0 : ($page - 1) * $perPage;

        $total = $collection->count();

        $pages_count = (int)$total / (int)$perPage;

        $page_counter = is_double($pages_count) ? (int)$pages_count + 1 : $pages_count;

        $data['total'] = $total;

        $data['paginated'] = $page == 0 ? $collection : $collection->splice($start, $perPage);

        $data['currentPage'] = $page == 0 ? 1 : $page;

        $data['perPage'] = $perPage;

        $data['last_page'] = $pages_count >= 1 ? $page_counter : 1;

        return (object)$data;
    }

    
}
