<!-- Open Graph -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?=(strlen($info_empresa_meta['lema'])>0)?htmlspecialchars( strtoupper($info_empresa_meta['lema'])) .' | '.strtoupper($info_empresa['empresa']):strtoupper($info_empresa['empresa'])?>">
    <meta name="twitter:description" content="<?php echo  $info_empresa_meta['meta_descripcion']; ?>">
    <meta name="twitter:image" content="">
    <meta name="twitter:url" content="https:<?php echo  $info_empresa['url_direccion']; ?>">
    <meta name="twitter:image:width" content="1200">
    <meta name="twitter:image:height" content="1200">
    <meta name="twitter:image:alt" content="<?=(strlen($info_empresa_meta['lema'])>0)?htmlspecialchars( strtoupper($info_empresa_meta['lema'])) .' | '.strtoupper($info_empresa['empresa']):strtoupper($info_empresa['empresa'])?>">
    <meta property="og:locale" content="es_MX">
    <meta property="og:type" content="website">

    <meta property="og:site_name" content="<?=(strlen($info_empresa_meta['lema'])>0)?htmlspecialchars( strtoupper($info_empresa_meta['lema'])) .' | '.strtoupper($info_empresa['empresa']):strtoupper($info_empresa['empresa'])?>">
    <meta property="og:title" content="<?=(strlen($info_empresa_meta['lema'])>0)?htmlspecialchars( strtoupper($info_empresa_meta['lema'])) .' | '.strtoupper($info_empresa['empresa']):strtoupper($info_empresa['empresa'])?>">
    <meta property="og:description" content="<?php echo  $info_empresa_meta['meta_descripcion']; ?>">
    <meta property="og:image" content="https:<?php echo $info_empresa_meta['meta_imagen']; ?>">
    <meta property="og:image:url" content="https:<?php echo  $info_empresa['url_direccion']; ?>">
    <meta property="og:image:secure_url" content="https:<?php echo  $info_empresa['url_direccion']; ?>">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="1200">
    <meta property="og:image:alt" content="<?=(strlen($info_empresa_meta['lema'])>0)?htmlspecialchars( strtoupper($info_empresa_meta['lema'])) .' | '.strtoupper($info_empresa['empresa']):strtoupper($info_empresa['empresa'])?>">
    
    <meta name="robots" content="index,follow">



  <meta name="theme-color" content="#000">
  <meta name="MobileOptimized" content="width">
  <meta name="HandheldFriendly" content="true">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
  <link rel="shortcut icon" type="image/png" href="https://www.arcsoluciones.com.mx/assets/media/empresa/<?php echo  $info_empresa['logo']; ?>">
  <link rel="apple-touch-icon" href="https://www.arcsoluciones.com.mx/assets/media/empresa/<?php echo  $info_empresa['logo']; ?>">
  <link rel="apple-touch-startup-image" href="https://www.arcsoluciones.com.mx/assets/media/empresa/<?php echo  $info_empresa['logo']; ?>">
  <link rel="manifest" href="./manifest.json">