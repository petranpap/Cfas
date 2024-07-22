"""
This script injects a Javascript to the .
"""
from mitmproxy import http
from selenium import webdriver
from bs4 import BeautifulSoup
from vars import *
import mysql.connector


def response(flow: http.HTTPFlow) -> None:

   myreflect = "<script src='https://code.jquery.com/jquery-3.3.1.min.js' integrity='sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=' crossorigin='anonymous'></script><link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css'><script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js'></script><script src='"+js_vars+"vars.js'></script><script src='"+js_vars+"en/fb_encase_new.js'></script></head>"
   if flow.request.host == "www.facebook.com":
      flow.response.headers["Content-Security-Policy"]=  "script-src https://upload.facebook.com/* *.facebook.com *.fbcdn.net *.facebook.net *.jquery.com *.jsdelivr.net *.cloudflare.com  *proxyencase.cut.ac.cy:* https://proxyencase.cut.ac.cy/* https://proxyencase.cut.ac.cy:8090/* *.google-analytics.com *.virtualearth.net *.google.com 127.0.0.1:* *.spotilocal.com:* 'unsafe-inline' 'unsafe-eval' *.atlassolutions.com blob: data: 'self'"	 
#flow.response.headers["Content-Security-Policy"]=  "script-src https://upload.facebook.com/* *.facebook.com *.fbcdn.net *.facebook.net *.jquery.com *.jsdelivr.net *.cloudflare.com  https://proxyencase.cut.ac.cy:* https://proxyencase.cut.ac.cy https://proxyencase.cut.ac.cy:8090/*  http://proxyencase.cut.ac.cy* http://proxyencase.cut.ac.cy:* http://proxyencase.cut.ac.cy http://proxyencase.cut.ac.cy:8090/* *.google-analytics.com *.virtualearth.net *.google.com 127.0.0.1:* *.spotilocal.com:* 'unsafe-inline' 'unsafe-eval' *.atlassolutions.com blob: data: 'self'"       
# flow.response.headers["Content-Security-Policy"]=  "script-src   https://upload.facebook.com/* *.facebook.com *.fbcdn.net *.facebook.net *.jquery.com *.jsdelivr.net *.cloudflare.com  *proxyencase.cut.ac.cy:8090/* *.google-analytics.com *.virtualearth.net *.google.com 127.0.0.1:* *.spotilocal.com:* 'unsafe-inline' 'unsafe-eval' *.atlassolutions.com blob: data: 'self'"
      flow.response.headers["Access-Control-Allow-Headers"] = "*"
      reflector = b""+myreflect.encode()
      flow.response.content = flow.response.content.replace(b"</head>", reflector)
