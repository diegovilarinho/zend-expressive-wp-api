<?php
function month_by_number($num) {
  switch ($num) {
    case '01':
      $newMonth = 'jan';
      break;
    case '02':
      $newMonth = 'fev';
      break;
    case '03':
      $newMonth = 'mar';
      break;
    case '04':
      $newMonth = 'abr';
      break;
    case '05':
      $newMonth = 'mai';
      break;
    case '06':
      $newMonth = 'jun';
      break;
    case '07':
      $newMonth = 'jul';
      break;
    case '08':
      $newMonth = 'ago';
      break;
    case '09':
      $newMonth = 'set';
      break;
    case '10':
      $newMonth = 'out';
      break;
    case '11':
      $newMonth = 'nov';
      break;
    case '12':
      $newMonth = 'dez';
      break;
    default:
      break;
  }
  return $newMonth;
}
?>
