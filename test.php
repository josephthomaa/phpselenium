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
$driver->get("page url here");
$driver->manage()->window()->maximize();
$driver->executeScript('document.querySelector("div.privacy-warning.permisive a").click()');
function waitLoader(){
		global $driver;
		try{
			echo "<br>*** wait loader ***<br>";
			$driver->wait(40, 1000)->until(Facebook\WebDriver\WebDriverExpectedCondition::invisibilityOfElementLocated(Facebook\WebDriver\WebDriverBy::classname('west-loader-container')));
			}
		catch(Exception $e){
			echo "<br> ".$e;
		}
	}
function getmail(){
		global $driver;
		try{
			$iframe = $session->findElement(WebDriverBy::id('ifmail'));

			//Get the iframe id
			//$frameId = $iframe->getAttribute('id');

			//Switch the driver to the iframe
			$session->switchTo()->frame('ifmail');
			echo "<br>*** get mail ***<br>";
			$driver->executeScript('el=document.querySelectorAll("#mailmillieu p a");el[0].click();');
			

			//Go back to the main document
			$session->switchTo()->defaultContent(); 
			
			
			}
		catch(Exception $e){
			echo "<br> ".$e;
		}
	}	
include("excelim.php");

function wait($identifier,$idvalue){
		global $driver;
		try{
			sleep(10);
			echo "<br>wait- ".$idvalue;
			$driver->wait(40, 5)->until(Facebook\WebDriver\WebDriverExpectedCondition::elementToBeClickable(Facebook\WebDriver\WebDriverBy::$identifier($idvalue)));
			}
		catch(Exception $e){
			echo "<br> ".$e;
		}
	}
function input($identifier,$idvalue,$val){
		global $driver;
		try{
			sleep(2);
			$driver->findElement(Facebook\WebDriver\WebDriverBy::$identifier($idvalue))->click();
			$driver->findElement(Facebook\WebDriver\WebDriverBy::$identifier($idvalue))->sendKeys($val);
			}
		catch(Exception $e){
			echo "<br> ".$e;
		}
	}
	
function button($identifier,$idvalue){
		global $driver;
		try{
			
			$driver->findElement(Facebook\WebDriver\WebDriverBy::$identifier($idvalue))->click();
			
		}
		catch(Exception $e){
			echo "<br> ".$e;
		}
	}	
function href($identifier,$idvalue){
		global $driver;
		try{
			$driver->findElement(WebDriverBy::$identifier("//a[@href='".$idvalue."]"))->click();
			
		}
		catch(Exception $e){
			echo "<br> ".$e;
		}
	}
function js($identifier,$idvalue){
	
		global $driver;
		try{
			if($identifier=='id'){
				$driver->executeScript('document.getElementById("'.$idvalue.'").click()');	
				sleep(10);
			}
			else{
				$driver->executeScript('document.querySelector("'.$idvalue.'").click()');
			}
		}
		catch(Exception $e){
			echo "<br> ".$e;
		}
	}
function inputjs($idvalue,$val){
	
		global $driver;
		try{
			sleep(5);
			$driver->executeScript('document.querySelector("'.$idvalue.'").value='.$val.'');
			$driver->executeScript('document.querySelector("'.$idvalue.'").dispatchEvent(new Event("change"))');
		}
		catch(Exception $e){
			echo "<br> ".$e;
		}
	}
function selectjs($idvalue,$val){
	
		global $driver;
		try{
			sleep(5);
			$driver->executeScript('el=document.querySelectorAll("select");
			el['.$idvalue.'].value='.$val.';');
			$driver->executeScript('el['.$idvalue.'].value='.$val.'');
			$driver->executeScript('el['.$idvalue.'].dispatchEvent(new Event("change"))');
		}
		catch(Exception $e){
			echo "<br> ".$e;
		}
	}		
function checkstatus($url,$passedUrl){
		global $driver;
		try{
			if($url!=$passedUrl){
				echo "failed";
				$driver->quit();
			}
			
		}
		catch(Exception $e){
			echo "<br> ".$e;
		}
	}	
//$driver->get('page url here');
//$driver->executeScript('document.querySelector("div.privacy-warning.permisive a").click()');
//$driver->findElement(WebDriverBy::classname('c-utility-navigation-SignIn-Btn'))->click();


echo "The current URI is '" . $driver->getCurrentURL() . "'\n";