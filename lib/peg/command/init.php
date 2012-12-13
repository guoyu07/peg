<?php
/*
 * @author Jefferson González
 * 
 * @license 
 * This file is part of PEG check the license file for information.
 * 
*/

namespace Peg\Command;

use Peg\CommandLine\Option;
use Peg\CommandLine\OptionType;

/**
 * In charge of initializing a directory to produce an extension.
 */
class Init extends \Peg\CommandLine\Command
{
	public function __construct()
	{
		parent::__construct("init");
		
		$this->description = "Populates a directory with skeleton files in preparation for generating an extension source code.";
		
		$this->RegisterAction(new Action\Init());
		
		$author = new Option(array(
			"long_name"=>"authors",
			"short_name"=>"a",
			"type"=>OptionType::STRING,
			"required"=>true,
			"description"=>"A comma seperated list of main authors going to be working on the extension.\n" .
			"Example: --authors \"Author1, Author2\"",
			"default_value"=>""
		));
		
		$this->AddOption($author);
		
		$contributors = new Option(array(
			"long_name"=>"contributors",
			"short_name"=>"c",
			"type"=>OptionType::STRING,
			"required"=>false,
			"description"=>"A comma seperated list of contributors.\n".
			"Example: --contributors \"Contributor1, Contributor2\"",
			"default_value"=>""
		));
		
		$this->AddOption($contributors);
		
		$name = new Option(array(
			"long_name"=>"name",
			"short_name"=>"n",
			"type"=>OptionType::STRING,
			"required"=>false,
			"description"=>"A name for the extension that overrides current working directory name.",
			"default_value"=>""
		));
		
		$this->AddOption($name);
		
		$version = new Option(array(
			"long_name"=>"initial-version",
			"short_name"=>"i",
			"type"=>OptionType::STRING,
			"required"=>false,
			"description"=>"Set the extension version. Default: 0.1.",
			"default_value"=>"0.1"
		));
		
		$this->AddOption($version);
		
		$force = new Option(array(
			"long_name"=>"force",
			"short_name"=>"f",
			"type"=>OptionType::FLAG,
			"required"=>false,
			"description"=>"Forces the initialization of a directory by overriding all it's content. Use with caution.",
			"default_value"=>""
		));
		
		$this->AddOption($force);
	}
}

?>