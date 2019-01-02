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
$driver->get('page url here');
$driver->executeScript('document.querySelector("div.privacy-warning.permisive a").click()');
//$driver->findElement(WebDriverBy::classname('c-utility-navigation-SignIn-Btn'))->click();
$driver->findElement(WebDriverBy::linkText("BUY"))->click();
//$driver->get($url);
$driver->executeScript('document.querySelector("div.privacy-warning.permisive a").click()');
// click the link 'About'
sleep(5);
$link = $driver->findElement(
    WebDriverBy::id('UserName')
);
$link2 = $driver->findElement(
    WebDriverBy::id('Password')
);
$link->click();
$link->sendKeys('test@test@yopmail.com');
$link2->click();
$link2->sendKeys('php');
$driver->findElement(WebDriverBy::id('SignInButton'))->click();

echo "The current URI is '" . $driver->getCurrentURL() . "'\n";
// write 'php' in the search box

// wait at most 10 seconds until at least one result is shown

// close the browser
$elementType="name";

//$driver->wait()->until(Facebook\WebDriver\WebDriverExpectedCondition::urlIs($url));
//$driver->executeScript('document.querySelector("div.privacy-warning.permisive a").click()');
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
