<?php

$handle = fopen("april.csv", "r");

while (list($name, $quantity, $sku) = fgetcsv($handle, 1000))
{
  $file_1_name[] = $name;
  $file_1_sku[] = $sku;
  $file_1_sku_striped[] = strtolower(preg_replace('/\s/', '', $sku));
  $file_1_quantity[] = $quantity;
  $array1 = [
    $file_1_name,
    $file_1_sku,
    $file_1_quantity
  ];
}
fclose($handle);


$handle = fopen("catalog.csv", "r");
while (list($sku, $name, $mg) = fgetcsv($handle, 1000))
{
  // if(in_array(strtolower(preg_replace('/\s/', '', $sku)), $file_1_sku_striped))
  if(in_array($sku, $file_1_sku))
  {
    $file_2_sku[] = $sku;
    $file_2_name[] = $name;
    $file_2_mg[] = $mg;
  }
}
fclose($handle);

$file = fopen("report.csv", "w") or die("Unable to open file!");

$main_key =  count($file_2_sku) + 1;



foreach ($file_2_sku as $key => $value) {
  $data[] =  html_entity_decode($file_2_name[$key] . '/-' . $file_2_mg[$key] . '/-' . $file_2_sku[$key]);
}

print_r($data);

foreach ( $data as $line ) {
    $val = explode("/-", $line);
    fputcsv($file, $val);
}

fclose($file);

?>
