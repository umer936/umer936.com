<? 
if((((($now - $lastonline)/60)/60)/24) > 1) {$lastonline = round(((($now - $lastonline)/60)/60)/24); $Chronology = "Days";}
elseif(((($now - $lastonline)/60)/60) > 1) {$lastonline = round((($now - $lastonline)/60)/60); $Chronology = "Hours";}
elseif((($now - $lastonline)/60) > 1) {$lastonline = round(($now - $lastonline)/60); $Chronology = "Minutes";}
else {$lastonline = (($now - $lastonline)); $Chronology = "Seconds";}