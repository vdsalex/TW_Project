<?php
if(DB::connection()->getDatabaseName())
{
   echo "Yes! successfully connected to the DB: " . DB::connection()->getDatabaseName();
}
else echo "No! successfully connected to the DB: " . DB::connection()->getDatabaseName();