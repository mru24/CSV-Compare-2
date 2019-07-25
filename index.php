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
  $file_1_names[] = $name;
  $file_1_names_striped[] = strtolower(preg_replace('/\s/', '', $name));
  $quantity_data[] = $quantity;
}
fclose($handle);


// strtolower(preg_replace('/\s/', '',

$handle = fopen("2.csv", "r");
while (list($name, $unused1, $unused2, $sku, $price) = fgetcsv($handle, 1000))
{
  $file_2_names[] = $name;
  $file_2_names_striped[] = strtolower(preg_replace('/\s/', '', $name));
  $sku_data[] = $sku;

  if(in_array(strtolower(preg_replace('/\s/', '', $name)), $file_1_names_striped))
  {
    $names[] = $name;
    $skus[] = $sku;
  }
}
fclose($handle);


foreach ($names as $key => $value) {
  echo $skus[$key] . ' / ' . $value . ' / ' . $key . ' / ' . $quantity_data[$key] . "\n";
}

// print_r($skus);
// print_r($names);
// print_r($quantities);
// echo '<br> ************* <br>';

// foreach ($skus as $key => $sku) {
//   echo $sku . ' / ' . $names[$key] . ' / ' . "\n";
// }


// foreach ($prices as $key => $price) {
//   $price = $price + 100;
//   echo strtoupper($ids[$key]) . ' - ' . $price . '<br>';
// }

// foreach ($matches as $key => $match) {
//   echo strtoupper($match) . ' - ' . $prices[$key] . '<br>';
// }

?>
