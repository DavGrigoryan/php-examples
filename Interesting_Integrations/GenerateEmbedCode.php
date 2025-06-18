<?php

namespace Traits;

/*
 * This is a simple trait that will generate video embed tags.
 * Only 7 video hosting are supported.
 * We can use this file anywhere.
 */

trait GenerateEmbedCode
{
    function Code($siteURL): string
    {
        $siteURL = str_replace(' ', '', $siteURL);
        $cleanedURL = implode('/', array_slice(explode('/', preg_replace('/https?:\/\/|www./', '', $siteURL)), 0, 1));
        switch ($cleanedURL) {
            case 'vimeo.com':
                $url = $siteURL . '/';
                $pattern = "/vimeo.com\/(.*?)\//";
                preg_match_all($pattern, $url, $matches);
                $embedURL = $matches[1][0];
                $result = "<iframe src=\"//player.vimeo.com/video/" . $embedURL . "\" frameborder=\"0\" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>";
                break;
            case 'youtube.com':
                $url = $siteURL . '/';
                $pattern = "/youtube.com\/watch\?v=(.*?)\//";
                preg_match_all($pattern, $url, $matches);
                $embedURL = $matches[1][0];
                $result = "<iframe src=\"//www.youtube.com/embed/" . $embedURL . "\" frameborder=\"0\" allowfullscreen></iframe>";
                break;
            case 'dailymotion.com':
                $url = $siteURL;
                $pattern = "/dailymotion.com\/video\/(.*?)\_/";
                preg_match_all($pattern, $url, $matches);
                $embedURL = $matches[1][0];
                $result = "<iframe frameborder=\"0\" src=\"//dailymotion.com/embed/video/" . $embedURL . "\" allowfullscreen></iframe>";
                break;
            case 'tune.pk':
                $url = $siteURL;
                $pattern = "/tune.pk\/video\/(.*?)\//";
                preg_match_all($pattern, $url, $matches);
                $embedURL = $matches[1][0];
                $result = "<iframe src=\"https://tune.pk/player/embed_player.php?vid=" . $embedURL . "\" frameborder=\"0\" allowfullscreen scrolling=\"no\"></iframe>";
                break;
            case 'vube.com':
                $url = $siteURL;
                $tokens = explode('/', $url);
                $embedURL = $tokens[sizeof($tokens) - 1];
                $result = "<iframe type=\"text/html\" src=\"//vube.com/embed/video/" . $embedURL . "?autoplay=false&fit=true\" allowfullscreen frameborder=\"0\">";
                break;
            case 'twitch.tv':
                $url = $siteURL;
                $result = "<iframe src=\"" . $url . "/embed\" frameborder=\"0\" scrolling=\"no\"></iframe>";
                break;
            case 'metacafe.com':
                $url = $siteURL;
                $pattern = "/metacafe.com\/watch\/(.*?)\//";
                preg_match_all($pattern, $url, $matches);
                $embedURL = $matches[1][0];
                $result = "<iframe src=\"//www.metacafe.com/embed/" . $embedURL . "/\" allowFullScreen frameborder=0></iframe>";
                break;
            default:
                $result = 'video url not supported.';
        }

        return $result;
    }

}