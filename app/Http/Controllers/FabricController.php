<?php

namespace App\Http\Controllers;

use App\Models\Fabric;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FabricController extends Controller
{

    public function __construct()
    {

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!Auth::user()->can('admin'))
        {
            return redirect('/') ;
        }
        $colors = ['alizarin',
            'amaranth',
            'amber',
            'amethyst',
            'apricot',
            'aqua',
            'aquamarine',
            'asparagus',
            'auburn',
            'azure',
            'beige',
            'bistre',
            'black',
            'blue',
            'blue-green',
            'blue-violet',
            'bondi-blue',
            'brass',
            'bronze',
            'brown',
            'buff',
            'burgundy',
            'camouflage-green',
            'caput-mortuum',
            'cardinal',
            'carmine',
            'carrot-orange',
            'celadon',
            'cerise',
            'cerulean',
            'champagne',
            'charcoal',
            'chartreuse',
            'cherry-blossom-pink',
            'chestnut',
            'chocolate',
            'cinnabar',
            'cinnamon',
            'cobalt',
            'copper',
            'coral',
            'corn',
            'cornflower',
            'cream',
            'crimson',
            'cyan',
            'dandelion',
            'denim',
            'ecru',
            'emerald',
            'eggplant',
            'falu-red',
            'fern-green',
            'firebrick',
            'flax',
            'forest-green',
            'french-rose',
            'fuchsia',
            'gamboge',
            'gold',
            'goldenrod',
            'green',
            'grey',
            'han-purple',
            'harlequin',
            'heliotrope',
            'hollywood-cerise',
            'indigo',
            'ivory',
            'jade',
            'kelly-green',
            'khaki',
            'lavender',
            'lawn-green',
            'lemon',
            'lemon-chiffon',
            'lilac',
            'lime',
            'lime-green',
            'linen',
            'magenta',
            'magnolia',
            'malachite',
            'maroon',
            'mauve',
            'midnight-blue',
            'mint-green',
            'misty-rose',
            'moss-green',
            'mustard',
            'myrtle',
            'navajo-white',
            'navy-blue',
            'ochre',
            'office-green',
            'olive',
            'olivine',
            'orange',
            'orchid',
            'papaya-whip',
            'peach',
            'pear',
            'periwinkle',
            'persimmon',
            'pine-green',
            'pink',
            'platinum',
            'plum',
            'powder-blue',
            'puce',
            'prussian-blue',
            'psychedelic-purple',
            'pumpkin',
            'purple',
            'quartz-grey',
            'raw-umber',
            'razzmatazz',
            'red',
            'robin-egg-blue',
            'rose',
            'royal-blue',
            'royal-purple',
            'ruby',
            'russet',
            'rust',
            'safety-orange',
            'saffron',
            'salmon',
            'sandy-brown',
            'sangria',
            'sapphire',
            'scarlet',
            'school-bus-yellow',
            'sea-green',
            'seashell',
            'sepia',
            'shamrock-green',
            'shocking-pink',
            'silver',
            'sky-blue',
            'slate-grey',
            'smalt',
            'spring-bud',
            'spring-green',
            'steel-blue',
            'tan',
            'tangerine',
            'taupe',
            'teal',
            'tenné-(tawny)',
            'terra-cotta',
            'thistle',
            'titanium-white',
            'tomato',
            'turquoise',
            'tyrian-purple',
            'ultramarine',
            'van-dyke-brown',
            'vermilion',
            'violet',
            'viridian',
            'wheat',
            'white',
            'wisteria',
            'yellow',
            'zucchini'];

        $data = Fabric::all();
        return view('fabric.index',compact('colors','data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $path = $request->file('image_file')->store('public');
        $data= $request->all();
        unset($data['image_file']);
        $data['image'] = $path;
        Fabric::create($data);
        return  redirect()->route('fabrics.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fabric  $fabric
     * @return \Illuminate\Http\Response
     */
    public function show(Fabric $fabric)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fabric  $fabric
     * @return \Illuminate\Http\Response
     */
    public function edit(Fabric $fabric)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fabric  $fabric
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fabric $fabric)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fabric  $fabric
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fabric $fabric)
    {
        //
    }
}
