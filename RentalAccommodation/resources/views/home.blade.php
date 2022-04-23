<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Rental Accommodation</title>
        <script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyAwkX_DWKXLkv1LTOZdfnGkvfre8BY3zww"></script>

        <link rel="stylesheet" src="./sass/app.scss" />
    </head>
    <body>
        <div id="app">
            <app-component></app-component>
        </div>
    </body>
    <script src="../js/app.js" type="application/javascript"></script>        

</html>