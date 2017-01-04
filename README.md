# CogentPHP
A Socket Driven Framework for PHP Developers, and also a great starting point for beginners in PHP as the ADS has a small footprint and Docs of Third Party Packages included have a small Learning Point

Sample Apps built on top of CogentPHP

https://github.com/wilforlan/Automobile-Dianostic.git

https://github.com/wilforlan/CogentBlog.git


## How to Install
You should have composer installed.

	if($this->composerInstalled == null){
		$this->load('http://getcomposer.org/');
	}
	elseif(isset($this->composerInstalled)){
		$cmd->runCommand('Composer Install');	
	}
	echo 'Installation Complete';
		$cmd->runCommand('php -S localhost:3000');

Funny right ?
 Run Composer Install while you cd to where you cloned this repo to
 then run php -S localhost:3000

## Why should I contribute ?
Never seen a PHP Framework that supports asynchronous because the Parent only supports synchronous, as the need for real-time data feed on the web is ever increasing, I think we should at least give back to our community by creating things that are really helpful for beginners because most of then get turn on by the possibilities of other languages.

## How is it aimed to be Developed ?

	Using the Console Component, will ease the stress of Creating Routes, APIs, Form Helpers, Database Migration, Controllers and Method Calls, View Rendering without writing any single line of code.

	The Console is to work in way similar to how npm init does. Yeah, just exactly like a form were the only thing you need to do is just to give answers to question that you are being asked by the Console **LOL**

	It will be achieved by having Elegant Syntax Like

		- php cogent Create:Routes

		- php cogent Create:API

		- php cogent Create:migration


	That's just an example of what I have in mind. I hope there are developers out there willing to contribute to this simple project.

## To DO
Add Socket Functionality and Optimize database queries to get data asynchronously
Add Support For File Storage System and Cloud Storage APis, e.g Google Cloud and Amazon AWS
Add Support for Authentication and
