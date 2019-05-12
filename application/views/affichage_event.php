
<!DOCTYPE html>
<html lang="en">
    <head>

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>chatte</title>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">

    </head>

    <body>

        <div class="container">
            <div class="card">
                <div class="container-fliud">
                    <div class="wrapper row">
                        <div class="preview col-md-6">

                                <div><img width="50%" src="http://localhost/projetWeb/index.php/../assets/image/Event/<?php echo $event[0]->imageEvent; ?>" /></div>
                        </div>
                        <div class="details col-md-6">
                            <h3><?php echo $event[0]->nomEvent; ?></h3>
                            <p><?php echo $event[0]->description; ?></p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
