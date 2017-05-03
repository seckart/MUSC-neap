<?php
	
	/**
	 *	ReadJSONFile
	 *	Given a path to a file, attempt to read it in
	 *	 and convert it to an array.
	 * @return array - JSON Object
	 */
	function ReadJSONFile($filename) {
		try {
			$json = @file_get_contents($filename);
			if ( $json == false ) {
				return false;
			}
			return json_decode($json, true);
		} catch (Exception $e) {
			return false;
		}
	}

	/**
	 *	IsArray
	 *	Checks if something is of type "array"
	 */
	function IsArray($thing) {
		return (gettype($thing) == "array");
	}

	/**
	 *	IsString
	 *	Checks if something is of type "string"
	 */
	function IsString($thing) {
		return (gettype($thing) == "string");
	}

	/**
	 *	MakeSidebarRecursive
	 *
     * @param string $key -
     * @param String or Array $val -
     * @param int $depth -
     * @param Array $req -
     *
     * @return string - The HTML of the sidebar
	 */
	function MakeSidebarRecursive($key, $val, $depth, $req, $filename) {
		global $WEB;
		$str = "";
		if ( IsString($val) ) {
		    $baseVal = basename($val);
            $linkClass = "";
		    if ( strcmp($baseVal, $filename) == 0 ) {
                $linkClass = " active ";
            }
			$str .= "<li><a class='{$linkClass}' href='{$WEB}{$val}'>{$key}</a></li>";
		} else if ( IsArray($val) ) {
			$str .= "<li>";
				$navopen = "";
				if ( isset($req[$depth]) && 
					 strcmp($req[$depth], $key) == 0  ) {
						$navopen = " open ";
				}
				$str .= "<div class='nav_label js-toggle-sibling'>{$key}</div>";
				$str .= "<ul class='js-toggle-me {$navopen} nested-menu' data-ui-hidden>";
				foreach ($val as $k => $v) {
					$str .= MakeSidebarRecursive($k, $v, $depth+1, $req, $filename);
				}
				$str .= "</ul>";
			$str .= "</li>";
		}
		return $str;
	}

	/**
	 *	FindPathToFile
	 *	Probably should read the comment for: GetSidebar()
	 *	
	 *	Takes an associative array, and searches through 3 levels of it
	 *	to attempt to find a url that matches $_SERVER["REQUEST_URI"]
	 *
	 *	If it finds that url, all of the nested array's KEYS will be
	 *	stored in an array, in the order from outside to inside.
	 *
	 * 	One more time...
	 *	If the array item you're looking for is 3 arrays deep (nested),
	 *	then the keys to the nested arrays, on the path toward the 
	 *	nested cell, will be stored.
	 *
	 */
	function FindPathToFile($json) {
		// Get the current page's requested URL, starting WITH /pages
		$req = $_SERVER["REQUEST_URI"];

		$pagesIndex = stripos($req, '/pages/');
		$req = substr($req, $pagesIndex);
		$pathArr = [];

		foreach ($json as $ok => $ov) {
			if (IsArray($ov)) {
				foreach ($ov as $mk => $mv) {
					if (IsArray($mv)) {
						foreach ($mv as $ik => $iv) {
							if (strcmp($iv, $req)==0) {
								array_push($pathArr, $ok);
								array_push($pathArr, $mk);
								break;
							}
						}
					} else {
						if (strcmp($mv, $req)==0) {
							array_push($pathArr, $ok);
							break;
						}
					}
				}
			}
		}
		return $pathArr;
	}


	/** 
	 *	GetSidebar()
	 *	By far, the most complicated portion of this NEAP template
	 *
	 *	The sidebar structure and links are stored in JSON (sidebar.json)
	 *	GetSidebar() will read in the JSON file, parse it, and generate
	 *	the necessary HTML for the sidebar.
	 *
	 *	This is particularly complicated due to the way the sidebar
	 *	knows what segments to "leave open" when you click a link.
	 *
	 *	Meaning, if you click a linked that is nested, when the page loads,
	 *	the nested navigation should remain open. As convenient as that is,
	 *	it was particularly complicated to build a system that allows this
	 *	functionality, without manually setting any flags ever, to indicate
	 *	what page you are on (in the sidebar).
	 *	
	 *	Meaning, the system figures out what page you're on and opens all
	 *	all of the sidebar containers necessary to get to that page's link. 
	 *	You never set any sidebar links to "active" or anything. 
	 *	It just kinda works.
	 *
	 *	After the JSON is read in, it is converted to an associative array.
	 *	PHP knows the currently requested page's url. It searches through
	 *	the associative JSON array until it finds that url.
	 *	Then, it traverses back upward through the array, and keeps track
	 *	of all the container elements in which it existed.
	 *
	 * 	An array of every container element is stored.
	 *
	 *	Then, during MakeSidebarRecursive(), that function uses it's $depth
	 *	(since it's recursive), to know what container element to read in.
	 *	
	 *	If MakeSidebarRecursive() is 1 level deep, then it must be
	 *	examining elements that exist within exactly one expanded
	 *	sidebar container. If that's true, then the page should have
	 *	exactly one sidebar element "opened up" on page load.
	 *	Therefor, it knows to look at the FIRST container element 
	 *	stored in the array ($req).
	 *	
	 *	Remember, the container array ($req), is an array of all the
	 *	expandable/collapsable sidebar items that were necessary to 
	 *	get to the link for the currently requested page.
	 *
	 * 	Almost done, so MakeSidebarRecursive() will add the class "open"
	 *	to the expandable/collapsable navbar item, if it supposed to be
	 *	open.
	 *
	 *	Graham and Abdou, honestly, you might just want to come get me.
	 *	I wanted a solution where you could move files around the 
	 *	filesystem, and the sidebar would automatically know what to keep open,
	 *	while also separating the structure and links of the sidebar, from the
	 *	HTML.
	 *	
	 */
	function GetSidebar() {
		global $DATADIR;
		$json_file_path = $DATADIR . "/sidebar.json";
		// Read in the JSON File
		$json = ReadJSONFile($json_file_path);
		// If there were no contents...
		if ( $json == false || empty($json) || count($json) < 1 ) {
			return "";
		}
		$req = FindPathToFile($json);
		// What FILE are they requesting
        $filename = $_SERVER['PHP_SELF'];
        if ( !empty($filename)) {
            $filename = basename($filename);
        }
		$sidebar = "";
		foreach ($json as $k => $v) {
			$sidebar .= MakeSidebarRecursive($k, $v, 0, $req, $filename);
		}
		return $sidebar;
	}


	/** 
	 *
	 *
	 */
	function POSTHas($key) {
		if ( $_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST[$key]) ) {
			return true;
		} else {
			return false;
		}
	}


?>