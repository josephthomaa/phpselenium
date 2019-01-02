<?php

namespace Facebook\WebDriver;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
require_once('vendor/autoload.php');
global $url;
global $driver;
// start Chrome with 5 second timeout
$host = 'http://localhost:4444/wd/hub'; // this is the default
$capabilities = DesiredCapabilities::chrome();
$driver = RemoteWebDriver::create($host, $capabilities, 5000);

//include("excelim.php");

// navigate to 'http://www.seleniumhq.org/'
$driver->get('https://www.c-sharpcorner.com/article/getting-started-with-windows-iot-on-raspberrypi/');
$driver->manage()->window()->maximize();
 $filename = __DIR__ . '/myfile.png';
$screenshot = $driver->takeScreenshot();
file_put_contents($filename, $screenshot);
for($i=0;$i<=3;$i++){
	
	$driver->navigate()->refresh();
	
}
