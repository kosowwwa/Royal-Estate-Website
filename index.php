<?php
    include_once('process.php');
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Royal Estate - Home</title>

    <link rel="stylesheet" href="assets/css/master.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/froala/design-blocks@master/dist/css/froala_blocks.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i">
    <link rel="stylesheet" href="assets/css/froala_style.css">

</head>
<body>
    <?php
        include_once ('inc/navbar.php');
        include_once('inc/header.php');
        include_once ('inc/cta1.php');
    ?>

    <section class="fdb-block py-0">
        <div class="container bg-r py-5 my-5" style="background-image: url(assets/imgs/shapes/1.svg);background-size: 30%;">
            <div class="row py-5">
                <div class="col-12 col-sm-10 col-md-8 col-lg-6 text-left">
                    <p>
                        Tauchen Sie ein in die Welt von Royal Estate. Wir heissen Sie herzlich Willkommen. Bei uns steht das Wohl des Kunden im Fokus. Eine Immobilie ist nebst Lebensraum auch ein Wertgegenstand, den es zu erhalten gibt. Mit viel Fingerspitzengefühl und Diskretion begleiten wir unsere Kunden von A bis Z beim Kauf oder Verkauf von Liegenschaften. Die Wünsche und Anforderungen unserer Kunden berücksichtigen wir in allen Belangen. Ein Beratungsgespräch ist bei Royal Estate unverbindlich und kostenlos.
                    </p>
                    <p>
                        Wir möchten den Kunden nebst unserer professionellen und unterstützenden Hand auch die optimalen Verkaufsmöglichkeiten aufzeigen. Für den Kunden ein wichtiger Punkt, denn um gemeinsam den Weg Ihrer Liegenschaft zu gehen, braucht es Vertrauen. Fühlen Sie sich bei Royal Estate wie Zuhause. Mit uns an Ihrer Seite beginnt der Kauf oder Verkauf Ihrer Liegenschaft. Lehnen Sie sich entspannt zurück und geniessen Sie die professionelle und engagierte Zusammenarbeit mit Royal Estate.
                    </p>
                </div>
            </div>
        </div>
    </section>


    <?php
        include_once ('inc/featured-index.php');
        include_once ('inc/footer.php');
    ?>
</body>
</html>
