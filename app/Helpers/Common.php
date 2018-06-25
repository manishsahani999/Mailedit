<?php

if (!function_exists('generate_otp')) {
    /**
     * Generates a truly random 4 digit number to be used for Sms based OTPs.
     *
     * @return integer
     */
    function generate_otp()
    {
        return substr(hexdec(bin2hex(openssl_random_pseudo_bytes(3))), 0, 4);
    }
}


if (!function_exists('array_compare')) {
    /**
     * Compares two non-associative arrays for equality.
     * Returns true if all values are equal, false otherwise
     *
     * @return boolean
     */
    function array_compare($array1, $array2)
    {
        return empty(array_diff($array1, $array2));
    }
}


if (!function_exists('array_compare_assoc')) {
    /**
     * Compares two associative arrays for equality by specified keys.
     * Returns true if all keys and values are equal, false otherwise
     *
     * @return boolean
     */
    function array_compare_assoc($array1, $array2, $keys)
    {
        return empty(array_diff(
            array_only($array1, $keys),
            array_only($array2, $keys)
        ));
    }
}

if(!function_exists('injectLinkTracker')) {
    
    function injectLinkTracker($html, $uuid, $trackLink)
    {
        $html = preg_replace_callback("/(<a[^>]*href=['\"])([^'\"]*)/",
                function($matches) use($uuid, $trackLink)
                {
                    if(strpos($matches[2], 'mailto:') !== false) {
                        return $matches[0];
                    } else {
                        if (empty($matches[2])) {
                            $url = app()->make('url')->to('/');
                        } else {
                            $url = str_replace('&amp;', '&', $matches[2]);
                        }

                        $temp = config('settings.app.frontend_host_url').route($trackLink,
                        [
                            str_replace("/","$",base64_encode($url)),
                            $uuid
                        ], false); 

                        return $matches[1].$temp;     
                    }
                },
                $html);
    
        return $html;
    }
}

if (!function_exists('array_group_by')) {
    /**
     * Group an array by the given key
     *
     * @return  array
     */
    function array_group_by($array, $key)
    {
        $return = array();
        foreach ($array as $val) {
            $return[$val[$key]][] = $val;
        }

        array_walk($return, function (&$row) use ($key) {
            $row = array_first($row);
            unset($row[$key]);
        });

        return $return;
    }
}



if (!function_exists('array_keys_exists')) {
    /**
     * Check if multiple keys exists in an array
     *
     * @return bool
     */
    function array_keys_exists(array $keys, array $arr)
    {
        return !array_diff_key(array_flip($keys), $arr);
    }
}



if (!function_exists('store_file')) {
    /**
     * Store file in disk depending upon environment
     *
     * @return  bool
     */
    function store_file($file_path, $file_contents, $visibility = 'public')
    {
        return app('env') != 'production'
                ? \Illuminate\Support\Facades\Storage::put(
                        env('ROOT_FOLDER') . DIRECTORY_SEPARATOR . $file_path, $file_contents, $visibility
                    )
                : \Illuminate\Support\Facades\Storage::cloud()->put($file_path, $file_contents, $visibility);
    }
}


if (!function_exists('file_url')) {
    /**
     * Return file urls based on environment
     *
     * @return string
     */
    function file_url($file_path)
    {
        return env('STORAGE_BASE_URL') . env('ROOT_FOLDER') . DIRECTORY_SEPARATOR . $file_path;
    }
}

if (!function_exists('convertFromUTC')) {
    /**
     * @param integer|string $timestamp
     * @param string $timezone
     * @param string $format
     *
     * @return string
     */
    function convertFromUTC($timestamp, $timezone, $format = 'Y-m-d H:i:s')
    {
        $date = new \DateTime($timestamp, new \DateTimeZone('UTC'));
        $date->setTimezone(new \DateTimeZone($timezone));
        return $date->format($format);
    }
}


if (!function_exists('convertToUTC')) {
    /**
     * @param integer|string $timestamp
     * @param string $timezone
     * @param string $format
     *
     * @return string
     */
    function convertToUTC($timestamp, $timezone, $format = 'Y-m-d H:i:s')
    {
        $date = new \DateTime($timestamp, new \DateTimeZone($timezone));
        $date->setTimezone(new \DateTimeZone('UTC'));
        return $date->format($format);
    }
}



if (!function_exists('dispatchJob')) {
    /**
     * Dispatch the automation job to run at given schedule.
     * 
     * @param  string $handler
     * @param  array  $params
     * @param  string $run_at
     * @param  string $timezone
     * @return string
     */
    function dispatchJob($handler, $params, $run_at, $timezone)
    {
        $run_at_utc = \Carbon\Carbon::createFromFormat('H:i:s', $run_at, $timezone)
                                ->timezone('UTC');

        if ($run_at_utc->isPast()) {
            $run_at_utc->addDay();
        }

        $job = (new $handler(...$params))->delay($run_at_utc);

        return dispatch($job);
    }
}


if (!function_exists('generate_display_name_from_slug')) {
    /**
     * Generate Display name from slug
     *
     * @return array
     */
    function generate_display_name_from_slug($slug)
    {
        if($slug)
        {
            $strArr = array_reverse(explode('-', $slug));
            foreach($strArr as &$str)
            {
                $str = ucfirst($str);
            }

            return $result = implode(' ', $strArr);
        }

        return "";
    }
}

if (!function_exists('split_name')) {
    /**
     * Generate Display name from slug
     *
     * @return array
     */
    function split_name($name) {
        $parts = array();
    
        while ( strlen( trim($name)) > 0 ) {
            $name = trim($name);
            $string = preg_replace('#.*\s([\w-]*)$#', '$1', $name);
            $parts[] = $string;
            $name = trim( preg_replace('#'.$string.'#', '', $name ) );
        }
    
        if (empty($parts)) {
            return false;
        }
    
        $parts = array_reverse($parts);
        $name = array();
        $name['first_name'] = $parts[0];
        $name['middle_name'] = (isset($parts[2])) ? $parts[1] : '';
        $name['last_name'] = (isset($parts[2])) ? $parts[2] : ( isset($parts[1]) ? $parts[1] : '');
    
        return $name;
    }
}

if (!function_exists('get_recipients_from_text')) {
    /**
     * Generate array from string subscribers
     *
     * @return array
     */
    function get_recipients_from_text($recipients)
    {
        $result = [];
        if($recipients)
        {
            $text = trim($recipients);
            $textAr = explode("\n", $text);
            
            foreach($textAr as $line)
            {
                $str = trim($line);
                $subArr = explode(',', $str);
                $temp = [];
                
                if (filter_var($subArr[0], FILTER_VALIDATE_EMAIL)) {
                    $temp['email'] = $subArr[0];
                    if($subArr[1])
                    {
                        $nameArr = split_name($subArr[1]);
                        if($nameArr)
                        {
                            $temp['first_name'] = $nameArr['first_name']; 
                            $temp['last_name'] = $nameArr['middle_name'].' '.$nameArr['last_name']; 
                        }
                    }
                    $temp['custom'] = $subArr;
                    array_push($result, $temp);
                }       
            }
        }
        return $result;
    }
}

if (!function_exists('replace_variables_in_string')) {
    /**
     * Generate Display name from slug
     *
     * @return array
     */
    function replace_variables_in_string($str, array $variables)
    {
        return preg_replace_callback('#{(.*?)}#',
        function($match) use ($variables){
            $match[1]=trim($match[1],'$');
            return $variables[$match[1]];
        },
        ' '.$template.' ');
    }
}
