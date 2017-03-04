<?php
/**
 * Get date of post update
 */
function time_of_last_post_update($inputSeconds) {
  $then = new DateTime(date('Y-m-d H:i:s', $inputSeconds));
  $now = new DateTime(date('Y-m-d H:i:s', time()));
  $diff = $then->diff($now);

  $array_time = array('years' => $diff->y, 'months' => $diff->m, 'days' => $diff->d, 'hours' => $diff->h, 'minutes' => $diff->i, 'seconds' => $diff->s);

  $legendYear     = ($array_time['years'] > 1)   ?  __(' anos', 'wac-theme')  :  __(' ano', 'wac-theme');
  $legendMonth    = ($array_time['months'] > 1)  ?  __(' meses', 'wac-theme')  :  __(' mês', 'wac-theme');
  $legendDays     = ($array_time['days'] > 1)    ?  __(' dias', 'wac-theme')  :  __(' dia', 'wac-theme');
  $legendHours    = ($array_time['hours'] > 1)   ?  __(' horas', 'wac-theme')  :  __(' hora', 'wac-theme');
  $legendMinutes  = ($array_time['minutes'] > 1) ?  __(' minutos', 'wac-theme')  :  __(' minuto', 'wac-theme');
  $legendSeconds  = ($array_time['seconds'] > 1) ?  __(' segundos', 'wac-theme')  :  __(' segundo', 'wac-theme');

  if( $array_time['years'] > 0 )       :  return   $array_time['years'] . $legendYear;
  elseif( $array_time['months'] > 0 )  :  return $array_time['months']  . $legendMonth;
  elseif( $array_time['days'] > 0 )    :  return $array_time['days']    . $legendDays;
  elseif( $array_time['hours'] > 0 )   :  return $array_time['hours']   . $legendHours;
  elseif( $array_time['minutes'] > 0 ) :  return $array_time['minutes'] . $legendMinutes;
  elseif( $array_time['seconds'] > 0 ) :  return $array_time['seconds'] . $legendSeconds;
  endif;
}
?>
