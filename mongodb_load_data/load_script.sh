#! /bin/bash

mongoimport --type csv -d test -c products --authenticationDatabase admin --username root --password example  --headerline --drop /data/content/25.csv