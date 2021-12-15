#!/usr/bin/env python3
#-*- coding: utf-8 -*-

# import the MongoClient class
from pymongo import MongoClient, errors
import pandas as pd
import json

# load csv data
my_data = pd.read_csv('25.csv')

# global variables for MongoDB host (default port is 27017)
DOMAIN = '192.168.64.3'
PORT = 27017

# use a try-except indentation to catch MongoClient() errors
try:
    # try to instantiate a client instance
    client = MongoClient(
        host = [ str(DOMAIN) + ":" + str(PORT) ],
        serverSelectionTimeoutMS = 3000, # 3 second timeout
        username = "root",
        password = "example",
    )

    # print the version of MongoDB server if connection successful
    print ("server version:", client.server_info()["version"])

    db = client.fitness_db
    fintness_data = db.fitness_data
    data_id = fintness_data.insert_one(json.loads(my_data.to_json())).inserted_id

    # get the database_names from the MongoClient()
    database_names = client.list_database_names()

except errors.ServerSelectionTimeoutError as err:
    # set the client and DB name list to 'None' and `[]` if exception
    client = None
    database_names = []

    # catch pymongo.errors.ServerSelectionTimeoutError
    print ("pymongo ERROR:", err)

print ("\ndatabases:", database_names)
print (my_data)
