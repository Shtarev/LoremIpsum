<?php 
/** Andrey Shtarev
* The function makes the content of a certain length $long - is the length of the content
*/
echo loremipsum(3000);
function loremipsum($long){
	$loremipsum = "lorem ipsum sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium totam rem aperiam eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt neque porro quisquam est qui dolorem ipsum quia dolor sit amet consectetur adipisci velit sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem ut enim ad minima veniam quis nostrum exercitationem ullam corporis suscipit laboriosam nisi ut aliquid ex ea commodi consequatur quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur vel illum qui dolorem eum fugiat quo voluptas nulla pariatur at vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint obcaecati cupiditate non provident similique sunt in culpa qui officia deserunt mollitia animi id est laborum et dolorum fuga et harum quidem rerum facilis est et expedita distinctio nam libero tempore cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus omnis voluptas assumenda est omnis dolor repellendus temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae itaque earum rerum hic tenetur a sapiente delectus ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat";
	$strlen = strlen($loremipsum);
	if($long > $strlen){
		while($long > $strlen){
			$loremipsum = $loremipsum.' '.$loremipsum;
			$strlen = strlen($loremipsum);
		}
	}
	$concat = '';
	$startPos = rand(0, $strlen);
	if($loremipsum[$startPos] == ' '){
		$startPos++;
	}
	$noch = $strlen-$startPos+1-$long;
	if($noch < 0){
		$concat = substr($loremipsum, 0, abs($noch));
	}
	$str = substr($loremipsum, $startPos, $long).' '.$concat;
	$str = trim($str);
	$von = 0;
	$longPruf = 150;
	$min = 50;
	$bis = 0;
	$strNew = '';
	$i = 0;
	$j = 3;
	$br = '';
	if($long > $longPruf){
		while($long > $longPruf+$von) {
			$bis = rand($min, $longPruf);
			$strC = substr($str, $von, $bis);
			if($i == $j) {
				$br = '<br>&#160;&#160;';
				$i = 0;
			}
			else {
				$br = '';
				$i++;
			}
			$strNew .= $br.trim(ucfirst($strC)).'. ';
			$von += $bis;
		}
		if($long - strlen($strNew) > 0) {
			$strC = substr($str, $von);
			$strNew .= trim(ucfirst($strC)).'. ';
		}
	}
	else {
		$strNew .= ucfirst($str).'.';
	}
	return $strNew;
}
