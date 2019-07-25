<!-- code,description,width,depth,height,price -->

<?php
// Data from file 1
$file_data = array();

// Matches that are in both files
$matches = array();

// id,name,width,depth,height,price
$handle = fopen("1.csv", "r");
while (list($name, $quantity) = fgetcsv($handle, 1000))
{
   $key=strtolower(preg_replace('/\s/', '', $name));
   echo "[".$key."]";
   $file_data[$key] = [$name, $quantity];
}
fclose($handle);

// Now check file 2 for matches
$handle = fopen("2.csv", "r");
// id,name,width,depth,height,price
while (list($name, $unused1, $unused2, $sku, $price) = fgetcsv($handle, 1000))
{
   $key=strtolower(preg_replace('/\s/', '', $name));

   echo "[".$key."]";
   if(isset($file_data[$key]))
   {
       $names[] = $file_data[$key][0];
       $skus[] = $file_data[$key][1];
   }
}
fclose($handle);


print_r($skus);
print_r($names);
echo '<br> ************* <br>';

foreach ($skus as $key => $sku) {
  echo $sku . ' / ' . $names[$key] . "\n";
}


// foreach ($prices as $key => $price) {
//   $price = $price + 100;
//   echo strtoupper($ids[$key]) . ' - ' . $price . '<br>';
// }

// foreach ($matches as $key => $match) {
//   echo strtoupper($match) . ' - ' . $prices[$key] . '<br>';
// }

?>
