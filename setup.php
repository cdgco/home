<?php if (file_exists( 'includes/config.php' )) {header( 'Location: index.php' );} ?>
<html>
<head>
<link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
<link rel="manifest" href="favicon/manifest.json">
<link rel="mask-icon" href="favicon/safari-pinned-tab.svg" color="#5bbad5">
<link rel="shortcut icon" href="favicon/favicon.ico">
<meta name="msapplication-config" content="favicon/browserconfig.xml">
<meta name="theme-color" content="#f5f5f5">
<title>Config Error</title>
<style>
@import "https://fonts.googleapis.com/css?family=Inconsolata";
html {
  min-height: 100%;
}

body {
  overflow: hidden;
  box-sizing: border-box;
  height: 100%;
  background-color: #000000;
  background-image: -webkit-radial-gradient(#11581e, #041607);
  background-image: radial-gradient(#11581e, #041607);
  font-family: 'Inconsolata', Helvetica, sans-serif;
  font-size: 1.5rem;
  color: rgba(128, 255, 128, 0.8);
  text-shadow: 0 0 1ex #33ff33, 0 0 2px rgba(255, 255, 255, 0.8);
}

.overlay {
  pointer-events: none;
  position: absolute;
  width: 100%;
  height: 100%;
  background: -webkit-repeating-linear-gradient(top, transparent 0, rgba(0, 0, 0, 0.3) 50%, transparent 100%);
  background: repeating-linear-gradient(180deg, transparent 0, rgba(0, 0, 0, 0.3) 50%, transparent 100%);
  background-size: auto 4px;
  z-index: 99;
}

.overlay::before {
  content: "";
  pointer-events: none;
  position: absolute;
  display: block;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  width: 100%;
  height: 100%;
  background-image: -webkit-linear-gradient(bottom, transparent 0%, rgba(32, 128, 32, 0.2) 2%, rgba(32, 128, 32, 0.8) 3%, rgba(32, 128, 32, 0.2) 3%, transparent 100%);
  background-image: linear-gradient(0deg, transparent 0%, rgba(32, 128, 32, 0.2) 2%, rgba(32, 128, 32, 0.8) 3%, rgba(32, 128, 32, 0.2) 3%, transparent 100%);
  background-repeat: no-repeat;
  -webkit-animation: scan 7.5s linear 0s infinite;
          animation: scan 7.5s linear 0s infinite;
}

@-webkit-keyframes scan {
  0% {
    background-position: 0 -100vh;
  }
  35%, 100% {
    background-position: 0 100vh;
  }
}

@keyframes scan {
  0% {
    background-position: 0 -100vh;
  }
  35%, 100% {
    background-position: 0 100vh;
  }
}
.terminal {
  box-sizing: inherit;
  position: absolute;
  height: 100%;
  width: 1000px;
  max-width: 100%;
  padding: 4rem;
  text-transform: uppercase;
}

.output {
  color: rgba(128, 255, 128, 0.8);
  text-shadow: 0 0 1ex #3f3, 0 0 2px rgba(255, 255, 255, 0.8);
}

.output::before {
  content: "> ";
}

.input {
  color: rgba(192, 255, 192, 0.8);
  text-shadow: 0 0 1ex #3f3, 0 0 2px rgba(255, 255, 255, 0.8);
}

.input::before {
  content: "$ ";
}

a {
  color: #fff;
  text-decoration: none;
}

a::before {
  content: "[";
}

a::after {
  content: "]";
}

.errorcode {
  color: white;
}

.copyright {
  font-size: .7rem;
}
</style>
</head>
<body>
<div class="overlay"></div>
<div class="terminal">
  <h1>Config <span class="errorcode">Error</span></h1>
  <p class="output">The cdg home config file does not exist or has not been renamed.<br>
  &nbsp;&nbsp;Please ensure that <span class="errorcode">/includes/config.php</span> exists and has been edited.</p>
  <p class="output">Please correct config or visit the <a href="https://github.com/cdgco/home">Github Repository</a> for help</p>
  <p class="output">Good luck</p>
</div>
</body>
