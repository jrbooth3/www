#!/bin/bash
for file in *.php
do
echo "updating file " $file
      sed -e "s/opendb.php/opendbnep.php/ig" $file > tempfile1.tmp
      sed -e "s/con,/connep,/ig" tempfile1.tmp >tempfile.tmp 
      mv tempfile.tmp $file
echo $file "done"
done
