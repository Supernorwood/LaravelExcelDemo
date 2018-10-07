<?php

namespace App\libs\FloridaBlue;

interface ImportFile
{
	public function load($filePath);

	public function parse($data);

	public function save($sales);
}