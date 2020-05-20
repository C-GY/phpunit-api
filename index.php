<?php
    exec("phpunit tests\UserTest.php",$out);
    $msgArray = [
        'res'=>$out[count($out)-1],
        'errNumber'=>0,
        'errMsg'=>[],
    ];

    foreach($out as $key=>$value) {
        if (empty($value)) {
            continue;
        }
        //错误个数
        if (strpos($value,'There were')!==false) {
            $arr = explode(' ', $value);
            $msgArray['errNumber'] = $arr[2];
        }
        if ($value=='FAILURES!') {
            break;
        }

        if (strpos($value,') ')!==false) {
            $msgMsg = [];
            $arr = explode(') ', $value);
            if (is_numeric($arr[0])){
                $msgMsg['functionName'] = $arr[1];
                foreach ($out as $k=>$v) {
                    if ($k <= $key) {
                        continue;
                    }
                    if (empty($v)) {
                        continue;
                    }
                    if (strpos($v,') ')!==false || $v=='FAILURES!') {
                        break;
                    }
                    if (strpos($v,':')!==false) {
                        $a = explode(':', $v);
                        if (is_numeric($a[count($a)-1])) {
                            $msgMsg['path'] = $v;
                            continue;
                        }
                    }
                    if (is_string($v)) {
                        $msgMsg['msg'][] = $v;
                    }
                }
            }
            $msgArray['errMsg'][] = $msgMsg;
        }

    }

    echo json_encode($msgArray);
//    echo json_encode($out);