<?php

namespace DRO\SeoAnalyzer\Http\Controllers;

use DRO\SeoAnalyzer\Seo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DRO\SeoAnalyzer\Models\Analyzer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use DRO\SeoAnalyzer\Mail\AnalyzerMailable;

class DroSeoAnalyzerController extends Controller
{


    public function __construct()
    {
        $this->user = Auth::user();
        $this->seoInfo = '';

    }

  public function index(Request $request)
  {

     $validator = Validator::make($request->all(), [
            'website' => 'required|url',
          ]);


      $seo = new Seo();
      $this->seoInfo = $seo->analyze($request->website);
      $this->searchResults($this->seoInfo);
      $this->sendEmail($request->email);

    return view('dro::dro-seo-analyzer',[
        'seoInfo' => $this->seoInfo
    ]);

  }


public function searchResults (Array $data)
{


                 if($this->user){
                       $analyzed = Analyzer::where('website', $data['domainname'])
                                            ->where('user_id', $this->user->id)
                                            ->first();

                      if($analyzed){
                                $analyzed->website  =  $data['domainname'];
                                $analyzed->seo_info = json_encode($data);
                                $analyzed->analyze_id = $data['analyze_id'];
                                $analyzed->score = $data['points']['allPoints'];
                                $analyzed->save();
                        }else{
                         $analyzed =  Analyzer::create([
                        'user_id'       => $this->user->id,
                        'session_id'    => 'user',
                        'analyze_id'    => $data['analyze_id'],
                        'website'       => $data['domainUrl'],
                        'seo_info'      => json_encode($data),
                        'score'         => $data['points']['allPoints'],
                       ]);
                    }

                 }else{

                        $analyzed = Analyzer::where('website', $data['domainUrl'])
                                           ->where('session_id', session()->getId())
                                           ->first();

                        if($analyzed){
                                $analyzed->website = $data['domainUrl'];
                                $analyzed->seo_info = json_encode($data);
                                $analyzed->analyze_id = $data['analyze_id'];
                                $analyzed->score = $data['points']['allPoints'];
                                $analyzed->save();
                        }else{
                                $analyzed =  Analyzer::create([
                                'user_id'       => 'guest',
                                'session_id'    => session()->getId(),
                                'analyze_id'    => $data['analyze_id'],
                                'website'       => $data['domainUrl'],
                                'seo_info'      => json_encode($data),
                                'score'         => $data['points']['allPoints'],
                       ]);
                    }

                 }



    return response()->json($analyzed);
}


 public function getAllAnalyzations ($paginate = 15)
 {
       return Analyzer::orderBy('updated_at','DESC')->paginate($paginate);
 }


    public function sendEmail($email,$seoInfo = null)
  {

     $seoInfo = $seoInfo ? $seoInfo : $this->seoInfo;
     $email = $email ? $email : 'ogur@dijitalreklam.org';
     $cc = config('seo-analyzer.cc') ? config('seo-analyzer.cc') : 'ogur@dijitalreklam.org';

     Mail::to($email)
            ->cc($cc)
            ->send(new AnalyzerMailable($seoInfo));


  }

    public function fetchAnalyze(Request $request, $id)
  {

    $data = Analyzer::where('analyze_id',$id)->first();
        if(!$data) abort(404);
            return view('dro::dro-seo-analyzer',[
                'seoInfo' => json_decode($data->seo_info,true),
            ]);


  }



}
