<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Resultant</title>

    <link href="/css/app.css" rel="stylesheet">
</head>

<body>

<div id="app">
    <currency-list></currency-list>
</div>

<script src="/js/app.js"></script>

</body>
</html>