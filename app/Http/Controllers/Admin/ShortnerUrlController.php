<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ShortUrlRequest;
use App\Models\ShortUrl;
use App\Repository\ShortnerRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\HtmlString;

class ShortnerUrlController extends Controller
{
    
    private ShortnerRepository $shortNer;

    public function __construct(ShortnerRepository $shortNer)
    {
        $this->shortNer = $shortNer;
    }

    /**
     * @return /AllShortUrl
     */
    public function index()
    {
        $userShortUrls = $this->shortNer->allShortner();

        return view('admin.url.user_short_urls', ['userShortUrls' => $userShortUrls]);
    }

    /**
     * Summary of shortnerForm
     */
    public function create()
    {
        return view('admin.url.create');
    }

     /**
      * Summary of short
      * @param \Illuminate\Http\Request $request
      * @return void
      */

    public function store(ShortUrlRequest $request)
    {
        if($request->original_url){
            $shortUrl = Str::random(8); 
            
            $this->shortNer->create([
                'original_url' => $request->original_url,
                'short_url' => $shortUrl,
            ]);

            $message = new HtmlString('Your short URL: <a href="' . route('shortner.show', ['shortUrl' => $shortUrl]) . '">' . route('shortner.show', ['shortUrl' => $shortUrl]) . '</a>');

            return redirect()->back()->with('message', $message);
        }
        return back();
    }


    /**
     * Summary of shortUrlRedirect
     * @return void
     */
    public function show($shortUrl)
    {
        $shortUrl = $this->shortNer->firstOrFail($shortUrl);

        $shortUrl->increment('click_count');
    
        return redirect($shortUrl->original_url);
    }
}
