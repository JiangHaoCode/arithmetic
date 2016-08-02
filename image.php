<?php
class image{
    session_start();
    //验证码类
    static public function verify($code,$width=75,$height=25,$n=4){
        header("content-type:image/png");
        // 创建画布
        $img=imagecreatetruecolor($width,$height);
        // 设置背景色
        $bgcolor=imagecolorallocate($img,mt_rand(200,255),mt_rand(200,255),rand(200,255));
        // 将背景色填充
        imagefill($img,0,0,$bgcolor);
        // 绘制五条弧线
        for($i=0;$i<5;$i++){
            $arccolor=imagecolorallocate($img,mt_rand(200,255),mt_rand(200,255),rand(200,255));
            imagearc($img,mt_rand(5,($width-5)),mt_rand(5,($height-5)),mt_rand(5,($width-5)),mt_rand(5,($height-5)),mt_rand(0,360),mt_rand(0,360),$arccolor);
        }
        // 绘制一百个点
        for($i=0;$i<100;$i++){
            $pixelcolor=imagecolorallocate($img,mt_rand(200,255),mt_rand(200,255),rand(200,255));
            imagesetpixel($img,mt_rand(1,($width-1)),mt_rand(1,($height-1)),$pixelcolor);
        }
        // 绘制五条线段
        for($i=0;$i<5;$i++){
            $linecolor=imagecolorallocate($img,mt_rand(200,255),mt_rand(200,255),rand(200,255));
            imageline($img,mt_rand(1,($width-1)),mt_rand(1,($height-1)),mt_rand(1,($width-1)),mt_rand(1,($height-1)),$linecolor);
        }
        // 设置边框颜色
        $bdcolor=imagecolorallocate($img,mt_rand(150,200),mt_rand(150,200),rand(150,200));
        // 绘制一个矩形无填充边框
        imagerectangle($img,0,0,($width-1),($height-1),$bdcolor);
        // 设置验证码字符串
        $str='';
        for($i=1;$i<=$n;$i++){
            $str.=substr(str_shuffle($code),0,1);
        }
        $_SESSION['a']=$str;
        //
        for($i=0;$i<$n;$i++){
            $textcolor=imagecolorallocate($img,mt_rand(100,150),mt_rand(100,150),mt_rand(100,150));
            imagettftext($img,1/($n+1)*$width,mt_rand(-20,20),((1-$n/(5+$n))*$width/($n-1)+$i*1/($n+1)*$width),1/2*($height+3/5*$height),$textcolor,'1.ttf',substr($str,$i,1));
        }
        // 打印图像
        imagepng($img);
        // 释放资源
        imagedestroy($img);
        return $str;
    }
    //缩略图类
    /*
    *$source需要缩略的图片
    */
    static public function thumbnail($source,$deletesource=false,$width=180){
        $info=getimagesize($source);
        //getimagesize方法获得图像的详细信息
        $createFun=str_replace('/','createfrom',$info['mime']);
        //将getimagesize中的['mime']中的/替换，变为imagecreatefromjpeg方法
        $src=$createFun($source);
        //创建图像
        $dst_w=$width;
        //缩略图的宽
        $dst_h=$width/$info[0]*$info[1];
        //计算缩略图的高
        $dst=imagecreatetruecolor($dst_w,$dst_h);
        //新建一个真彩色图像
        imagecopyresampled($dst,$src,0,0,0,0,$dst_w,$dst_h,$info['0'],$info['1']);
        //重采样拷贝部分图像并调整大小
        $saveFun=str_replace('/','',$info['mime']);
        //设置保存函数
        $ext=strrchr($source,'.');
        //strrchr查找指定字符在字符串中的最后一次出现，返回包括其自身在内的剩余的字符串
        $thumbnailName=str_replace($ext,'',$source).'_thumbnail'.$ext;
        //设置保存路径
        if(!$deletesource){
            $saveFun($dst,$thumbnailName);
            //保存图像
        }else{
            $saveFun($dst,$thumbnailName);
            unlink($source);
            //删除原图
        }
        imagedestroy($src);
        //销毁资源
        imagedestroy($dst);
        //销毁资源
        return $thumbnailName;
 
    }
    //水印图类
    /*
    *$srcing水印图
    *$dsting原图
    */
    static public function watermark($dstimg,$srcimg){
        $dstinfo=getimagesize($dstimg);
        //getimagesize方法获取该图片的详细信息（该方法返回的是一个详细的数组）
        $srcinfo=getimagesize($srcimg);
        $createdst=str_replace('/','createfrom',$dstinfo['mime']);
        //将getimagesize方法返回的数组中的mime值中的/替换，结果为imagecreatefromjpeg
        $createsrc=str_replace('/','createfrom',$srcinfo['mime']);
        $dst=$createdst($dstimg);
        //替换后为imagecreatefromjpeg函数，创建一个图像
        $dst_w=imagesx($dst);
        //获取大图的宽
        $dst_h=imagesy($dst);
        //获取大图的高
        $src=$createsrc($srcimg);
        //替换后为imagecreatefromjpeg函数，创建一个图像
        $src_w=imagesx($src);
        //获取水印图的宽
        $src_h=imagesy($src);
        //获取水印图的高
        $watermaker=imagecopy($dst,$src,($dst_w-$src_w),($dst_h-$src_h),0,0,$src_w,$src_h);
        //将水印图复制在大图上
        $saveFun=str_replace('/','',$dstinfo['mime']);
        //将getimagesize返回数组中的['mime']中的斜杠替换为空，替换后的值为imagejpeg，即为保存函数
        $ext=strrchr($dstimg,'.');
        //strrchr查找指定字符在字符串中的最后一次出现，返回包括其自身在内的剩余的字符串
        $watermaker=str_replace($ext,'',$dstimg).'_water'.time().$ext;
        //保存名
        $saveFun($dst,$watermaker);
        //保存图片，第一个参数为要保存的图片，第二个参数为保存路径或保存名
        imagedestroy($dst);
        //销毁资源
        imagedestroy($src);
        //销毁资源
        return $watermaker;
 
    }
 
}
?>

