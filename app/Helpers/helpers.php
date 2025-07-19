<?php 

use Illuminate\Support\Facades\DB;

function get_meta_data()

{

    $url = url()->current();

    $meta_str = "";

    $meta_data = DB::table('metatags')->where(['url'=>$url])->first();

    if(!empty($meta_data) && isset($meta_data->title))

    {

        $meta_str .= "<title>".$meta_data->title."</title>\r\n";

        $meta_str .= "<meta name='keywords' content='".$meta_data->keyword."'>\n";

        $meta_str .= "<meta name='description' content='".$meta_data->description."'>\n";

        $meta_str .= "<meta property='og:title' content='".$meta_data->title."'>\n";

        $meta_str .= "<meta property='og:site_name' content='Elite Edge Legacy'>\n";

        $meta_str .= "<meta property='og:url' content='".$url."'>\n";

        $meta_str .= "<meta property='og:description' content='".$meta_data->description."'>\n";

        $meta_str .= "<meta property='og:type' content='website'>\n";

    }else{

        $meta_str .= "<title>Welcome to elite edge Legacy</title>\n";

        $meta_str .= "<meta name='keywords' content='Elite !'>\n";

        $meta_str .= "<meta name='description' content='EliteEdge Legacy is Gurugram’s leading real estate and investment consultant offering customer-centric services in commercial and residential segment.'>\n";

        $meta_str .= "<meta property='og:site_name' content='Elite Edge Legacy'>\n";

        $meta_str .= "<meta property='og:url' content='".$url."'>\n";

        $meta_str .= "<meta property='og:description' content='EliteEdge Legacy is Gurugram’s leading real estate and investment consultant offering customer-centric services in commercial and residential segment.'>\n";

        $meta_str .= "<meta property='og:type' content='website'>\n";

    }

$meta_str .= "<link rel='canonical' href='".$url."'>";

    return $meta_str;

}



function set_map_iframe($iframe)

{

    $height = '350';

    $width = '100%';

    $iframe = preg_replace('/height="(.*?)"/i', 'height="' . $height .'"', $iframe);

    $iframe = preg_replace('/width="(.*?)"/i', 'width="' . $width .'"', $iframe);

    $iframe = str_replace('}','',$iframe);

    return $iframe;

}



function GetYouTubeId($url)

{

    $parts = parse_url($url);

    if(isset($parts['query'])){

        parse_str($parts['query'], $qs);

        if(isset($qs['v'])){

            return $qs['v'];

        }else if(isset($qs['vi'])){

            return $qs['vi'];

        }

    }

    if(isset($parts['path'])){

        $path = explode('/', trim($parts['path'], '/'));

        return $path[count($path)-1];

    }

    return false;

}



function getYoutubeThumb($link)

{

    return $thumbnail="http://img.youtube.com/vi/".getYoutubeIdFromUrl($link)."/maxresdefault.jpg"; //sddefault.jpg";

}



function getYoutubeIdFromUrl($url) {

    $parts = parse_url($url);

    if(isset($parts['query'])){

        parse_str($parts['query'], $qs);

        if(isset($qs['v'])){

            return $qs['v'];

        }else if(isset($qs['vi'])){

            return $qs['vi'];

        }

    }

    if(isset($parts['path'])){

        $path = explode('/', trim($parts['path'], '/'));

        return $path[count($path)-1];

    }

    return false;

}



?>