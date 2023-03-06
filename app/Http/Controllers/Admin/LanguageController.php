<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Language;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class LanguageController extends Controller
{
    public function languages()
    {
        $page = 'languages';
        if (request()->isMethod('post')) {
            $langVar = request('langVar');
            $languageExist = Language::where('variable', $langVar)->first();
            if ($languageExist != null) {
                return redirect()->back()->withErrors(['error' => __('admin.variable_already_exist')]);
            }
            $language = new Language();
            $language->variable = request('langVar');
            $language->en = request('en');
            $language->al = request('al');
            $language->mk = request('mk');
            $language->de = request('de');
            $language->save();
            return redirect('admin/languages');
        }
        $languages = Language::all();

        return view('admin.src.languages.languages', compact('languages', 'page'));

    }

    //Foreach language we create language files in system which are accessed from Laravel language system
    public function generate_languages()
    {
        //Lib::permission('ADMIN_SETTINGS');
        $languages = array('en' => 'en', 'al' => 'al', 'mk' => 'mk', 'de' => 'de');
        $variables = Language::all();
        $response = 0;
        foreach ($languages as $key => $lang) {
            $langstr = "<?php
                return [ \n
            ";
            foreach ($variables as $variable) {
                $langstr .= "'" . $variable->variable . "' => '" . addslashes($variable[$lang]) . "',\n";
            }
            $langstr .= ']; ';
            $write = File::put(base_path() . '/resources/lang/' . $key . '/website.php', $langstr);
            if ($write) {
                $response++;
            }
        }

        return redirect('admin/languages');
    }


    //Changing language variables value serves as API and only values for each language are possible to be changes
    public function change_language_variable()
    {
        $langVar = request('langVar');
        $language = Language::where(DB::raw('BINARY `variable`'), $langVar)->first();
        $language->en = request('en');
        $language->al = request('al');
        $language->mk = request('mk');
        $language->de = request('de');
        $language->save();
        return response()->json($this->responseAPI(true, null, null, null));
    }

    private function responseAPI($status, $message, $val, $error)
    {
        $values = [
            'status' => $status,
            'message' => $message,
            'values' => $val,
            'error' => $error
        ];
        return $values;
    }

    public function languageFillScript()
    {
        $en = File::getRequire(base_path() . '/resources/lang/en/website.php');
        $al = File::getRequire(base_path() . '/resources/lang/al/website.php');
        $mk = File::getRequire(base_path() . '/resources/lang/mk/website.php');
        $de = File::getRequire(base_path() . '/resources/lang/de/website.php');

        $langs = [$en, $al, $mk, $de];

        foreach ($langs as $l) {
            $langString = substr($l, 1, Str::length($l));

            foreach ($l as $key => $lang) {
                $languages = Language::pluck('variable')->toArray();
                if (!in_array($key, $languages))
                    $newLang = new Language();
                else
                    $newLang = Language::where(DB::raw('BINARY `variable`'), $key)->first();

                $newLang->variable = $key;
                $newLang->$langString = $lang;
                $newLang->save();
            }
        }

//        foreach ($en as $key => $lang) {
//            $languages = Language::pluck('variable')->toArray();
//            if (!in_array($key, $languages))
//                $newLang = new Language();
//            else
//                $newLang = Language::where(DB::raw('BINARY `variable`'), $key)->first();
//
//            $newLang->variable = $key;
//            $newLang->en = $lang;
//            $newLang->save();
//        }


    }
}
