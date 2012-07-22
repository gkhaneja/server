<?php

$json = ' {"name":"Hagrid","age":"36"}';

$obj = json_decode($json);
print $obj->{'name'}; // 12345



$string='{"person":[
			{
				"name":{"first":"John","last":"Adams"},
                "age":"40"
			},
			{
				"name":{"first":"Thomas","last":"Jefferson"},
                "age":"35"
			}
		 ]}';

$json_a=json_decode($string,true);

$json_o=json_decode($string);
// array method
foreach($json_a['person'] as $p)
{
echo '

Name: '.$p['name']['first'].' '.$p['name']['last'].'

Age: '.$p['age'].'

';

}
// object method
foreach($json_o->person as $p)
{
echo '

Name: '.$p->name->first.' '.$p->name->last.'

Age: '.$p->age.'

';
}
?>
