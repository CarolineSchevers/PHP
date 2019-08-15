<?php  
    $pictures = array(
        "https://www.pixelstalk.net/wp-content/uploads/2016/08/HD-PC-Wallpaper-2016.jpg",
        "https://wallpaperaccess.com/full/190815.jpg",
        "https://images7.alphacoders.com/528/528418.jpg",
        "https://wallpaperaccess.com/full/300068.jpg",
        "https://www.hdwallpaper.nu/wp-content/uploads/2016/02/golden-gate_wallpaper_030.jpg"
    );

    $randomNumber = array_rand($pictures);
    $randomImage = $pictures[$randomNumber];

    $strings = array(
        "Kirito",
        "Erza",
        "Akatsuki",
        "Shiro",
        "Leo",
        "Rundel-Haus-Code",
        "Ken Kaneki",
        "Glenn Radars",
        "Momonga-Sama",
    );

    function addRandomColorSpan($char){
        $r = rand(0,255);
        $g = rand(0,255);
        $b = rand(0,255);
        return "<span style='color:rgb($r,$g,$b);'>$char</span>";
    };
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Javascript to PHP</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body class="bg-light">
    <header id="header" style="background: url(<?php echo $randomImage ?>) center center/cover no-repeat">
        <div class="overlay"></div>
        <div class="overlay-content">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <h1>Welcome to the Javascript - PHP exercise</h1>
                        <p>Read the code of this page, understand it, then convert it to the same functionality in PHP!
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <section id="exercises">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div id="loop-while" class="my-4 p-4 bg-white shadow-sm border">
                        <h2>Exercise 1: Loops and stuff</h2>
                            <ul>
                                <?php
                                    $list = "";
                                    $randomStrings;
                                    
                                    while ($list !== []){
                                        $randomStrings[] = $strings[rand(0,count($strings)-1)];
                                        $list = array_diff($strings, $randomStrings);
                                    };
                    
                                    foreach ($randomStrings as $val){ 
                                        echo "<li>", $val. "</li>\n";
                                    };
                                ?>
                            </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div id="username-generator" class="my-4 p-4 bg-white shadow-sm border">
                        <p>
                            <?php
                               createUsername("Rafael Lambelin Selene Nijst");
                            ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>

<?php
    function createUsername($name){
    $splitNames = explode(" ", $name);
    
    foreach ($splitNames as $val){
        $splitLetters = str_split($val);
        
        for ($l = 0 ; $l < count($splitLetters)/2 ; $l++){
            $x = rand(1, count($splitLetters)-1);
            
            $splitLetters[$x] = strtoupper($splitLetters[$x]);
            $splitLetters[$x] = addRandomColorSpan($splitLetters[$x]);
        };
        $splitLetters = implode("",$splitLetters);
        $newCollection[] = $splitLetters;
    };
    echo implode(" - ", $newCollection);
    }; 
?>

