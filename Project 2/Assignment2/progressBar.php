    <?php
      set_time_limit(150);
      // Loop through process
      for($i=1; $i<=$t1; $i++) {
          // Calculate the percentation
          $percent = intval($per1);
          
          // Javascript for updating the progress bar and information
          echo '<script language="javascript">
          document.getElementById("progress").innerHTML="<div style=\"width: 100%'.$per1.';background-color:#00FFFF;\">&nbsp;</div>";
          document.getElementById("information").innerHTML="'.$i.' row(s) processed.";
          </script>';
          

      // This is for the buffer achieve the minimum size in order to flush data
          echo str_repeat(' ',1024*64);
          

      // Send output to browser immediately
          flush();
          

      // Sleep one second so we can see the delay
          sleep(1);
      }
      // Tell user that the process is completed
      echo '<script language="javascript">document.getElementById("information").innerHTML="Process completed"</script>';
  ?>