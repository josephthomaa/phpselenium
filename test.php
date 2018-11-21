<?php

require_once(__DIR__ . '/vendor/autoload.php');
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\WebDriverBy;
use Facebook\WebDriver\WebDriverNavigation;


$host = 'http://localhost:4444/wd/hub'; // this is the default
$USE_FIREFOX = false; // if false, will use chrome.

if ($USE_FIREFOX)
{
    $driver = Facebook\WebDriver\Remote\RemoteWebDriver::create(
        $host, 
        Facebook\WebDriver\Remote\DesiredCapabilities::firefox()
    );
}
else
{
    $driver = Facebook\WebDriver\Remote\RemoteWebDriver::create(
        $host, 
        Facebook\WebDriver\Remote\DesiredCapabilities::chrome()
    );
}

$elementType="name";
$driver->get("");
$email=array('test1','test@test.com','johnwest@yopmail.com');
for($i=0;$i<=2;$i++){
	
	echo "The current URI is '" . $driver->getCurrentURL() . "'\n";
	sleep(2);
	# enter text into the search field
	$driver->findElement(Facebook\WebDriver\WebDriverBy::$elementType('UserName'))->click();
	$driver->findElement(Facebook\WebDriver\WebDriverBy::$elementType('UserName'))->sendKeys($email[$i]);
	sleep(1);
	$driver->findElement(Facebook\WebDriver\WebDriverBy::name('Password'))->click();
	$driver->findElement(Facebook\WebDriver\WebDriverBy::name('Password'))->sendKeys(array('Password1!'));
	
	$driver->findElement(Facebook\WebDriver\WebDriverBy::id('SignInButton'))->click();
	
	sleep(2);
	//$driver->navigate()->refresh();
	$driver->findElement(Facebook\WebDriver\WebDriverBy::name('UserName'))->clear();
	$driver->findElement(Facebook\WebDriver\WebDriverBy::name('Password'))->clear();
}
echo "The current URI is '" . $driver->getCurrentURL() . "'\n";