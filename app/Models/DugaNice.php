<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DugaNice extends Model
{
    use HasFactory, SerializeDate;

    protected $table = "duga_nices";
    protected $casts = [
        'updated_at' => 'datetime:Y年m月d日 H:i:s',
    ];

    protected $fillable = [
        'user_id',
        'duga_id',
        'productid',
        're_productid'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function duga()
    {
        return $this->belongsTo(Duga::class, 'productid');
    }

    public static function nice($productid, $duga_id){

        $re_productid = str_replace("-", "/", $productid);

        DugaNice::create([
            'user_id' => Auth::id(),
            'duga_id' => $duga_id,
            'productid' => $productid,
            're_productid' => $re_productid
        ]);

        return back()
        ->with([
            'nicemessage' => '気になる動画に登録しました。',
            'status'  => 'nice'
        ]);
    }

    public static function unNice($productid){
        
        $nice=DugaNice::whereProductid($productid)->first();
        $nice->delete();

        return back()
        ->with([
            'nicemessage' => '気になる動画から削除しました。',
            'status'  => 'unnice'
        ]);
    }

    public static function dugaNice($productid){
        $nice = DugaNice::where([['productid', $productid], ['user_id', Auth::id()]])->first();

        return $nice;
    }

    public static function dugaNiceCount($productid){
        $nicecount = DugaNice::whereProductid($productid)->count();

        return $nicecount;
    }

    public static function myNices(){
        // 詳細ページのユーザーの気になる動画
        $mynices = DugaNice::with('duga')->whereUser_id(Auth::id())->latest('updated_at')->get()->unique('productid')->take(20);

        return $mynices;
    }

    public static function niceList($column)
    {
        $nicelists = DB::table('duga_nices')
            ->select('duga_nices.productid', 're_productid', 'title', 'jacketimage', $column,DB::raw('count(*) as total'))
            ->groupBy('productid', 're_productid', 'title', 'jacketimage', $column)->latest('total')
            ->leftJoin('dugas', 'duga_nices.productid', '=', 'dugas.productid')
            ->get()->unique($column)->take(100);

        return $nicelists;
    }

    public static function niceVideoLists($sort, $hits)
    {
        // マイページ
        if ($sort === 'oldest') {
            $nice_video_lists = DugaNice::with('duga:productid,title,jacketimage')->whereUser_id(Auth::id())->oldest('updated_at')->paginate($hits);
        }

        if ($sort === 'latest') {
            $nice_video_lists = DugaNice::with('duga:productid,title,jacketimage')->whereUser_id(Auth::id())->latest('updated_at')->paginate($hits);

        }

        return $nice_video_lists;
    }

}
