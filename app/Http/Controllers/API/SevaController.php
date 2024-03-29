<?php

namespace App\Http\Controllers\API;
use Illuminate\Http\Request; 
use App\Http\Controllers\Controller; 
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\Commonreturn as CommonreturnResource;
use App\Models\Seva;
use App\Models\Event;
use Doctrine\DBAL\Events;

class SevaController extends Controller
{
    public $succ = 200;
    public $err  = 202;
    public function __construct(){
        // $this->middleware('jwt', ['except' => ['login_signup','login_with_otp']]);
    }
    public function index(Request $request,$id=0){
        $data=array();
        $message='';
        $success=1;
        $userid = login_User_ID();
        if($userid!='' && $userid>0){
            $userid = $userid;
        }else{
            $userid = 0;
        }
        $data = Seva::query();
        if($request->has('is_suggested') && $request->get('is_suggested')==1){
            if($id>0){

            }else{
                if($request->has('event_id')){
                    
                }else{

                }
            }
        }
        $data = $data
        ->with('temple')
        ->with('seva_type')
        ->with('anouncements')
        ->with('seva_faqs')
        ->with('background_image_id')
        ->with('feature_image_id')
        ->with('banner_image_id')
        ->with('seva_updates')
        ->with('seva_prices')
        ->with('seva_prices.seva_price_family_details');
        $data = $data->where('is_active',1);
        $data = $data->withCount(['user_carts' => function ($q) use ($userid) {
            $q->where('user_id',$userid);
        }]);
        $data = $data->with(["seva_prices.user_carts" => function ($q) use ($userid) {
            $q->where('user_id',$userid);
        }]);
        if($request->has('seva_type_id')){
            $data = $data->where('seva_type_id',$request->get('seva_type_id'));
        }
        if($request->has('temple_id')){
            $data = $data->where('temple_id ',$request->get('temple_id'));
        }
        if($request->has('is_featured')){
            $data = $data->where('is_featured',$request->get('is_featured'));
        }
        if($id===0){
            // if($request->has('is_expaired')){
            //     $data = $data->where('is_expaired',$request->get('is_expaired'));
            // }else{
            //     $data = $data->where('is_expaired',0);
            // }
            if($request->has('event_id')){
                $event_id = $request->get('event_id');
                $data = $data->whereHas('events',function ($q) use ($event_id){
                    $q->where('event_id','=',$event_id);
                });
            }else{
                $data = $data->doesntHave('events');
            }
            $data = $data->orderBy('ordering_number', 'ASC');
            $PAGINATELIMIT = PAGINATELIMIT($request);
            $data = $data->paginate($PAGINATELIMIT);
        }else{
            // if(is_string($id)){
            //     $data = $data->where('slug','=',$id)->first();
            // }else{
            //     $data = $data->find($id);
            // }
            try{
                if(Seva::where('slug','=',$id)->exists()){
                    $data = $data->where('slug','=',$id)->first();
                }else{
                    $data = $data->find($id);
                }
            } catch (\Exception $ex) {
                $data = $data->find($id);
            }
        }
        $resp = array('success'=>$success,'message'=>$message,'data'=>$data);
        return new CommonreturnResource($resp);
    }
    public function SevasCron(Request $request){
        $SevasData = Seva::where('is_expaired','=',0)->get();
        if(!is_null($SevasData)){
            foreach($SevasData as $svdata){
                $checkExp = Seva::where('expairy_date','>',date('Y-m-d'))->where('id','=',$svdata->id)->count();
                if($checkExp>1){
                    Seva::where('id','=',$svdata->id)->update(['is_expaired'=>1]);
                }else{
                    $curDAteTime = date('Y-m-d');
                    $dbdate      = YY_MM_DD($svdata->expairy_date);
                    $days        = dateDiff($curDAteTime,$dbdate); 
                    if($days==2){
                        $expairy_label = 'Expires in 2 days. ';
                    }else if($days==1){
                        $expairy_label = 'Expires Tomorrow. ';
                    }else if($days==0){
                        $expairy_label = 'Expires Today. ';
                    }else{
                        $expairy_label = '';
                    }
                    Seva::where('id','=',$svdata->id)->update(['expairy_label'=>$expairy_label]);
                }
            }   
        }
        $EvsData = Event::where('is_expaired','=',0)->get();
        if(!is_null($EvsData)){
            foreach($EvsData as $svdata){
                $checkExp = Event::where('DATE(expairy_date_time)','>',date('Y-m-d'))->where('id','=',$svdata->id)->count();
                if($checkExp>1){
                    Event::where('id','=',$svdata->id)->update(['is_expaired'=>1]);
                }else{
                    $curDAteTime = date('Y-m-d');
                    $dbdate      = YY_MM_DD($svdata->expairy_date_time);
                    $days        = dateDiff($curDAteTime,$dbdate); 
                    if($days==2){
                        $expairy_label = 'Expires in 2 days. ';
                    }else if($days==1){
                        $expairy_label = 'Expires Tomorrow. ';
                    }else if($days==0){
                        $expairy_label = 'Expires Today. ';
                    }else{
                        $expairy_label = '';
                    }
                    Event::where('id','=',$svdata->id)->update(['expairy_label'=>$expairy_label]);
                }
            }   
        }
    }
}
