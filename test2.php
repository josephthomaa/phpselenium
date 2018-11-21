<?php

namespace Facebook\WebDriver;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
require_once('vendor/autoload.php');
// start Chrome with 5 second timeout
$host = 'http://localhost:4444/wd/hub'; // this is the default
$capabilities = DesiredCapabilities::chrome();
$driver = RemoteWebDriver::create($host, $capabilities, 5000);
// navigate to 'http://www.seleniumhq.org/'
$driver->get('');
// adding cookie
$driver->manage()->deleteAllCookies();
$cookie = new Cookie('privacy-notification', 1,365);
$driver->manage()->addCookie($cookie);
$cookies = $driver->manage()->getCookies();
print_r($cookies);

$driver.manage().window().maximize();
// click the link 'About'
$link = $driver->findElement(
    WebDriverBy::id('UserName')
);
$link2 = $driver->findElement(
    WebDriverBy::id('Password')
);
$link->click();
$link->sendKeys('php');
$link2->click();
$link->sendKeys('php');
$driver->findElement(WebDriverBy::className('SignInButton'))->click();

echo "The current URI is '" . $driver->getCurrentURL() . "'\n";
// write 'php' in the search box

// wait at most 10 seconds until at least one result is shown

// close the browser
