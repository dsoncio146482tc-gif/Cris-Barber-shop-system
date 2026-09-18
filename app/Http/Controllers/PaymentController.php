<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;use Illuminate\Support\Facades\DB;
class PaymentController extends Controller {public function verify(Request $r,string $id){abort_unless($r->user()->role==='admin',403);$d=$r->validate(['status'=>['required','in:verified,flagged']]);DB::table('payments')->where('id',$id)->where('payment_method','gcash')->update(['verification_status'=>$d['status'],'updated_at'=>now()]);return back()->with('status','GCash payment '.$d['status'].'.');}}
