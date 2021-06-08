<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>HIMFEST</title>
  <meta name="title" content="HIMFEST">
  <meta name="description"
    content="Kompetisi UI/UX untuk pelajar SMA dan App Development untuk Mahasiswa yang diadakan oleh HIMFO Binus Malang. ">

  <!-- Open Graph / Facebook -->
  <meta property="og:type" content="website">
  <meta property="og:url" content="https://metatags.io/">
  <meta property="og:title" content="HIMFEST">
  <meta property="og:description"
    content="Kompetisi UI/UX untuk pelajar SMA dan App Development untuk Mahasiswa yang diadakan oleh HIMFO Binus Malang. ">
  <meta property="og:image" content="{{ asset('images/himfest.png') }}">

  <!-- Twitter -->
  <meta property="twitter:card" content="summary_large_image">
  <meta property="twitter:url" content="https://metatags.io/">
  <meta property="twitter:title" content="HIMFEST">
  <meta property="twitter:description"
    content="Kompetisi UI/UX untuk pelajar SMA dan App Development untuk Mahasiswa yang diadakan oleh HIMFO Binus Malang. ">
  <meta property="twitter:image" content="{{ asset('images/himfest.png') }}">

  <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
  <link rel="manifest" href="/site.webmanifest">

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link
    href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&family=Open+Sans:wght@300;400;700&display=swap"
    rel="stylesheet">

  <!-- Styles -->
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <style>
    .gradient {
      background: linear-gradient(90deg, #1488CC 0%, #2B32B2 100%);
    }
  </style>

  <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body class="font-body leading-normal tracking-normal text-white gradient">
  {{ $slot }}
</body>

</html>