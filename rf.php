<!DOCTYPE html>
<html>

<head>

</head>

<body>


    <div style="position:absolute;">


        <?php
        $img = scandir("img");
        $layers = count($img);
        $unique = "";
        $link = "";
        $h;
        $w;
        for ($i = 2; $i < $layers; $i++) {

            $imglay = scandir("img/" . $img[$i]);
            $count = count($imglay);
            $img_no = rand(2, $count - 1);
            $unique = $unique . $img_no;
            $imgsize = getimagesize("img/" . $img[$i] . "/" . $imglay[$img_no]);
            if ($link == "") {
                $link = 'url("img/' . $img[$i] . "/" . $imglay[$img_no] . '")';
            } else {
                $link = $link . ',url("img/' . $img[$i] . "/" . $imglay[$img_no] . '")';
            }
        ?>
            <!-- <img src="<?php echo "img/" . $img[$i] . "/" . $imglay[$img_no] ?>" style="width:<?php echo $imgsize[0] . "px" ?>;height:<?php echo $imgsize[1] . "px" ?>;position: relative;position: absolute;z-index:<?php echo $i ?>;" /> -->

        <?php
            $h = $imgsize[0] . "px";
            $w = $imgsize[1] . "px";
        }
        ?>


        <div id="nft" style='width:<?php echo $w ?>;height:<?php echo $h ?>;background-position: center;background-repeat: no-repeat;background-size: cover;background-image:<?php echo $link ?>'>

        </div>
        <?php
        $file2 = fopen("save.txt", "rb");
        if (filesize("save.txt") == 0) {
            $saved = [];
        } else {
            $saved = explode(",", fread($file2, filesize("save.txt")));
        }

        fclose($file2);



        if (in_array($unique, $saved)) {
        ?>
            <script>
                document.getElementById("nft").style.display = "none";
            </script>
        <?php

        } else {


        ?>
            <script>
                document.getElementById("nft").style.display = "block";
            </script>
        <?php

            $file = fopen("save.txt", "a");

            if (filesize("save.txt") == 0) {
                fwrite($file, $unique);
            } else {
                fwrite($file, "," . $unique);
            }

            fclose($file);
        }





        ?>









    </div>

    <div id="t"></div>

    <script src="htmltocanvas.js"></script>
    <script>
        saveimg();
    </script>
























</body>

</html>