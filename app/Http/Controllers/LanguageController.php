<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use App;
use Illuminate\Support\Facades\Redirect;

class LanguageController extends Controller
{
    
    public function index($locale)
    {
        App::setLocale($locale);
        session()->put('locale', $locale);
        return redirect()->back();
    }
}
