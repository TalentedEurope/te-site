<?php

namespace App\Http\Middleware;

use Closure;
use Cookie;
use Config;
use App;
use Illuminate\Routing\Redirector;
use Illuminate\Http\Request;
use Illuminate\Foundation\Application;
use Auth;

class Language
{
    public function __construct(Application $app, Redirector $redirector, Request $request)
    {
        $this->app = $app;
        $this->redirector = $redirector;
        $this->request = $request;
    }

    public static function setMailLang($user)
    {
        $locale = env('DEFAULT_LOCALE', 'en');
        if ($user->app_lang != "") {
            $locale = $user->app_lang;
        }
        App::setLocale($locale);
    }

    /**
     *  We handle the web request and setup language.
     *  We go from default setting, and see if we can update it with browser lang,
     *  cookie lang and finally url lang. Note: Default and browser lang are the ones
     *  with less precedence, and url on top.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Convert (examples):
        // en => en
        // en_GB => en
        // en-GB => en
        $urlLang = preg_split('/[-_]/', $request->input('lang'))[0];

        $cookieLang = $request->cookie('locale');
        $browserLang = substr($request->server('HTTP_ACCEPT_LANGUAGE'), 0, 2);
        $locale = Config::get('app.locale');

        if (!empty($browserLang) and in_array($browserLang, Config::get('app.languages'))) {
            $locale = $browserLang;
        }

        if (!empty($cookieLang) and in_array($cookieLang, Config::get('app.languages'))) {
            $locale = $cookieLang;
        }

        if (!empty($urlLang) and in_array($urlLang, Config::get('app.languages'))) {
            $locale = $urlLang;
        }

        App::setLocale($locale);

        if (Auth::User()) {
            $user = Auth::user();
            if ($user->app_lang != $locale) {
                $user->app_lang = $locale;
                $user->save();
            }
        }

        if ($request->hasCookie('locale') && $cookieLang == $locale) {
            return $next($request);
        } else {
            $response = $next($request);

            return $response->withCookie(cookie()->forever('locale', $locale));
        }
    }
}
