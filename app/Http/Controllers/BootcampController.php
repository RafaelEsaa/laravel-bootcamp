<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App;

class BootcampController extends Controller
{

    public function menuHeader(){
        $menu = file_get_contents('https://www.4geeksacademy.co/wp-json/menus/v1/menus/blog-header');
        $menu = json_decode($menu);

        function buildTree($items){
            $tree = [];
            $parents = [];
                foreach($items as $item)
                    if(empty($item->menu_item_parent)){
                        $tree[$item->ID] = [];
                        $parents[] = (array) $item;
                    }
                    else{
                        if(!isset($tree[$item->menu_item_parent]))
                            $tree[$item->menu_item_parent] = [];
                            $tree[$item->menu_item_parent][] = (array) $item;
                    }
        
            $parents = array_map(function($parent) use ($tree){
                $parent["childs"] = $tree[$parent["ID"]];
                return $parent;
            }, $parents);
            return $parents; 
        }
        
        $hierarchy = buildTree($menu->items);

        return $hierarchy;
    }

    public function schools(){
        $dataSchools = file_get_contents(env('API_URL').'/schools');
        $schools = json_decode($dataSchools);

        return $schools;
    }

    public function permuteBootcamps(){
        $url = env('API_URL').'/permute/full-stack';
        $dataPermuta = file_get_contents($url);
        $dataBootcamps = json_decode($dataPermuta);

        return $dataBootcamps;
    }

    public function menuFooter(){
        $urlMenuFooter = 'https://www.4geeksacademy.co/wp-json/menus/v1/menus/footer-company';
        $data = file_get_contents($urlMenuFooter);
        $dataMenu = json_decode($data);

        return $dataMenu;
    }

    public function compareSchools($school1, $school2, $school3){
        $url = env('API_URL').'/compare/full-stack?schools='.$school1.','.$school2.','.$school3;
        $dataComparison = file_get_contents($url);
        $comparisonCombinationArray = json_decode($dataComparison);

        return $comparisonCombinationArray;
    }

    public function consultBootcamp($locale = null){
        $lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
        
        if($lang == 'es' || $lang == 'en'){
            Session::put('locale',$lang);
            App::setLocale($lang);
        }

        //Datos del Menu Header
        $dataMenu = self::menuHeader();

        //Escuelas
        $schools = self::schools();

        //Permuta Bootcamps
        $dataBootcamps = self::permuteBootcamps();

        //Menu Footer
        $dataMenuFooter = self::menuFooter();

        return view('home')
        ->with([
            'menu'=>$dataMenu,
            'schools'=>$schools,
            'bootcamps'=>$dataBootcamps,
            'menuFooter'=>$dataMenuFooter ]);
    }

    public function compareBootcamps($school1=null, $school2=null, $school3=null){
        //Datos del Menu Header
        $dataMenu = self::menuHeader();

        //Permuta Bootcamps
        $dataBootcamps = self::permuteBootcamps();

        //Menu Footer
        $dataMenuFooter = self::menuFooter();

        //Query Schools by compare
        $schoolsCompare = self::compareSchools($school1, $school2, $school3);

        //Escuelas
        $schools = self::schools();

        return view('compare')
        ->with([
            'menu'=>$dataMenu,
            'bootcamps'=>$dataBootcamps,
            'dataSchools'=>$schools,
            'menuFooter'=>$dataMenuFooter,
            'comparisonCombinationArray'=>$schoolsCompare,
            'school1'=>$school1,
            'school2'=>$school2,
            'school3'=>$school3
        ]);
    }
    
    public function compareBootcampsIdiom($locale=null, $school1=null, $school2=null, $school3=null){
        Session::put('locale',$locale);
        return redirect("/compare/$school1-vs-$school2-vs-$school3");
    }
}
