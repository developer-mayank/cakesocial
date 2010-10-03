<?php
echo "<option value=''>please choose</option>";
if(!empty($option)) {
  foreach($option as $k => $v) {
    echo "<option value=$k>$v</option>";
  }
}
if (isset($empty)){echo "<option value=no>not in list</option>";}
?>