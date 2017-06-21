<?php

namespace App;

use Baum\Node;

class Menu extends Node {
	protected $table = 'menu';
	protected $parentColumn = 'parent_id';
	protected $leftColumn = 'lft';
	protected $rightColumn = 'rgt';
	protected $depthColumn = 'depth';
	protected $guarded = ['id', 'parent_id', 'lft', 'rgt', 'depth', 'alias'];
}