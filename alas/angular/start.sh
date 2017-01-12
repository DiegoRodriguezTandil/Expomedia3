#!/bin/bash
clear
cd expomedia-srv
export PORT=3000
export NODE_ENV=development
nodemon serve.js