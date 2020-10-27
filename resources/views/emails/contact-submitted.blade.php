<!doctype html>

<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scaleable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>

    <body>
        <h1>Contact form submitted: </h1>
        <ul>
            <li>Name: {!! $submission->name !!}</li>
            <li>Email: {!! $submission->email_address !!}</li>
            <li>Submitted at: {!! $submission->created_at !!}</li>
        </ul>
        <p>The message: <br> {!! nl2br($submission->message) !!}</p>
    </body>

</html>

