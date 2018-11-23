<?php

require_once(__DIR__ . '/vendor/autoload.php');
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\WebDriverBy;
use Facebook\WebDriver\WebDriverNavigation;
global $driver;

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
$driver->get('chrome://settings/clearBrowserData');
button('id','clearBrowsingDataConfirm');
//sleep(3);
$driver->get("");

function input($identifier,$idvalue,$val){
		global $driver;
		try{
			$driver->findElement(Facebook\WebDriver\WebDriverBy::$identifier($idvalue))->click();
			$driver->findElement(Facebook\WebDriver\WebDriverBy::$identifier($idvalue))->sendKeys($val);
			}
		catch(Exception $e){
			echo $e;
		}
	}
	
function button($identifier,$idvalue){
		global $driver;
		try{
			$driver->findElement(Facebook\WebDriver\WebDriverBy::$identifier($idvalue))->click();
			
		}
		catch(Exception $e){
			echo $e;
		}
	}	
function href($identifier,$idvalue){
		global $driver;
		try{
			$driver->findElement(WebDriverBy::$identifier("//a[@href='".$idvalue."]"))->click();
			
		}
		catch(Exception $e){
			echo $e;
		}
	}
function js($idvalue){
		global $driver;
		try{
			$driver->executeScript('document.querySelector("'.$idvalue.'").click()');
			
		}
		catch(Exception $e){
			echo $e;
		}
	}	
include("excelim.php");

//$driver->get('');
//$driver->executeScript('document.querySelector("div.privacy-warning.permisive a").click()');
//$driver->findElement(WebDriverBy::classname('c-utility-navigation-SignIn-Btn'))->click();


echo "The current URI is '" . $driver->getCurrentURL() . "'\n";